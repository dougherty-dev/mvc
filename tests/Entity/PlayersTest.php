<?php

/**
 * Players test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use RangeException;
use App\Entity\Players;

/** Test cases for class Players. */
class PlayersTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $players = new Players();
        $this->assertInstanceOf("\App\Entity\Players", $players);

        $getId = $players->getId();
        $this->assertEquals(null, $getId);

        $handle = rand(0, 10);
        $players->setHandle($handle);
        $getHandle = $players->getHandle();
        $this->assertEquals($handle, $getHandle);

        $hand = array_fill(0, 5, rand(0, 50));
        $players->setHand($hand);
        $getHand = $players->getHand();
        $this->assertEquals($hand, $getHand);

        $cash = rand(0, 10);
        $players->setCash($cash);
        $getCash = $players->getCash();
        $this->assertEquals($cash, $getCash);

        $bet = rand(0, 10);
        $players->setBet($bet);
        $getBet = $players->getBet();
        $this->assertEquals($bet, $getBet);

        $latestAction = rand(0, 10);
        $players->setLatestAction($latestAction);
        $getLatestAction = $players->getLatestAction();
        $this->assertEquals($latestAction, $getLatestAction);

        $dealer = (bool) rand(0, 1);
        $players->setDealer($dealer);
        $isDealer = $players->isDealer();
        $this->assertEquals($dealer, $isDealer);

        $smallBlind = (bool) rand(0, 1);
        $players->setSmallBlind($smallBlind);
        $isSmallBlind = $players->isSmallBlind();
        $this->assertEquals($smallBlind, $isSmallBlind);

        $bigBlind = (bool) rand(0, 1);
        $players->setBigBlind($bigBlind);
        $isBigBlind = $players->isBigBlind();
        $this->assertEquals($bigBlind, $isBigBlind);
    }
}
