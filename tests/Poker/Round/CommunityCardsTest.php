<?php

/**
 * CommunityCardsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Poker\Round\CommunityCards;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * CommunityCardsTest class.
 * @SuppressWarnings("StaticAccess")
 */
class CommunityCardsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCommunityCards(): void
    {
        $communityCards = new CommunityCards();
        $this->assertInstanceOf("\App\Poker\Round\CommunityCards", $communityCards);

        self::bootKernel();
        $container = static::getContainer();
        $registry = $container->get(ManagerRegistry::class);
        /** @phpstan-ignore-next-line */
        $entityManager = $registry->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);
        $updateCommunity = new UpdateCommunity($entityManager);

        $communityCards->prepareCommunityCards($entityManager, $players, $community, $updatePlayer, $updateCommunity);

        $updatePlayer->saveState($players[0]->getId(), PlayerStates::Waits->value);
        $players[0]->setState(PlayerStates::Waits);
        $communityCards->prepareCommunityCards($entityManager, $players, $community, $updatePlayer, $updateCommunity);

        Request::create(
            "/proj/poker/reset",
            "POST"
        );
    }
}
