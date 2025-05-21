<?php

/**
 * PermuteHandsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Player;
use App\Poker\Hand;
use App\Poker\Round\PermuteHands;

/**
 * PermuteHandsTest class.
 */
class PermuteHandsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPermuteHands(): void
    {
        $permuteHands = new PermuteHands();
        $this->assertInstanceOf("\App\Poker\Round\PermuteHands", $permuteHands);

        self::bootKernel();
        $container = static::getContainer();
        $registry = $container->get(ManagerRegistry::class);
        /** @phpstan-ignore-next-line */
        $entityManager = $registry->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);

        $hand = new Hand();
        $hand->addToHand([12, 34, 2, 22, 18]);
        $community->setHand($hand);

        foreach ([[1, 45], [51, 0], [4, 33]] as $key => $arr) {
            $hand = new Hand();
            $hand->addToHand($arr);
            $players[$key]->setHand($hand);
        }

        $permuteHands->permute($community, $players[0], $updatePlayer, []);

    }
}
