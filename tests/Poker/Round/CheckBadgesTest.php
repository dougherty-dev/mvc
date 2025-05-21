<?php

/**
 * CheckBadgesTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use App\Poker\Round\CheckBadges;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * CheckBadgesTest class.
 */
class CheckBadgesTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCheckBadges(): void
    {
        $checkBadges = new CheckBadges();
        $this->assertInstanceOf("\App\Poker\Round\CheckBadges", $checkBadges);

        self::bootKernel();
        $container = static::getContainer();
        $registry = $container->get(ManagerRegistry::class);
        /** @phpstan-ignore-next-line */
        $entityManager = $registry->getManager();

        $players = (new FetchPlayers())->fetchPlayers($entityManager);
        $retPlayers = $checkBadges->check($players);
        $this->assertEquals($retPlayers, [0, 0, 0]);

        $players[0]->setDealer(true);
        $players[1]->setSmallBlind(true);
        $players[2]->setBigBlind(true);
        $retPlayers = $checkBadges->check($players);
        $this->assertEquals($retPlayers, [0, 1, 2]);

    }
}
