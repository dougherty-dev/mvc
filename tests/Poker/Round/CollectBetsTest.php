<?php

/**
 * CollectBetsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use App\Poker\Round\CollectBets;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Player;

/**
 * CollectBetsTest class.
 */
class CollectBetsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCollectBets(): void
    {
        $collectBets = new CollectBets();
        $this->assertInstanceOf("\App\Poker\Round\CollectBets", $collectBets);

        self::bootKernel();
        $container = static::getContainer();
        $registry = $container->get(ManagerRegistry::class);
        /** @phpstan-ignore-next-line */
        $entityManager = $registry->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);
        $updateCommunity = new UpdateCommunity($entityManager);

        $collectBets->save($players, $community, $updatePlayer, $updateCommunity, $players[0]);
    }
}
