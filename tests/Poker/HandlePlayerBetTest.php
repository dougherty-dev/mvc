<?php

/**
 * HandlePlayerBetTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\HandlePlayerBet;
use App\Poker\Helpers\HandleComputerBet;
use App\Poker\Player;
use App\Poker\Community;

/**
 * Test cases for class HandlePlayerBet.
 */
class HandlePlayerBetTest extends TestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHelpers(): void
    {
        $cls = new HandlePlayerBet();
        $this->assertInstanceOf("\App\Poker\Helpers\HandlePlayerBet", $cls);

        $cls = new HandleComputerBet();
        $this->assertInstanceOf("\App\Poker\Helpers\HandleComputerBet", $cls);

        $entityManager = $this->createMock(ObjectManager::class);
        $cls = new UpdatePlayer($entityManager);
        $this->assertInstanceOf("\App\Poker\Helpers\UpdatePlayer", $cls);

        $cls = new UpdateCommunity($entityManager);
        $this->assertInstanceOf("\App\Poker\Helpers\UpdateCommunity", $cls);
    }
}
