<?php

/**
 * FindBestHandTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Poker\Helpers\FindBestHand;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\Hand;

/**
 * FindBestHandTest class.
 */
class FindBestHandTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testFindBestHand(): void
    {
        $findBestHand = new FindBestHand();
        $this->assertInstanceOf("\App\Poker\Helpers\FindBestHand", $findBestHand);

        self::bootKernel();
        $container = static::getContainer();
        $registry = $container->get(ManagerRegistry::class);
        /** @phpstan-ignore-next-line */
        $entityManager = $registry->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);

        $hand = new Hand();
        $hand->addToHand([12, 34, 2, 22, 18]);
        $community->setHand($hand);

        $players[0]->setState(PlayerStates::Folds);
        foreach ([[1, 45], [51, 0], [4, 33]] as $key => $arr) {
            $hand = new Hand();
            $hand->addToHand($arr);
            $players[$key]->setHand($hand);
        }

        $bestHand = $findBestHand->find($players, $community);
        $this->assertEquals($bestHand["hand"], [
            "♣️K",
            "♥️9",
            "♦️10",
            "♠️K",
            "♣️A",
        ]);
        $this->assertEquals($bestHand["hex"], "H1d0ea90");
        $this->assertEquals($bestHand["value"], "par");
        $this->assertEquals($bestHand["handle"], "1");
    }
}
