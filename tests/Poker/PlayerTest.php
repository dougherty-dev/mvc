<?php

/**
 * Poker player test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\Hand;
use App\Poker\Player;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Poker\Player", $player);
        $this->assertTrue($player->__isset('dealer'));
        $this->assertTrue($player->__isset('smallBlind'));
        $this->assertTrue($player->__isset('bigBlind'));
        $this->assertTrue($player->__isset('hand'));
        $this->assertTrue($player->__isset('handle'));
        $this->assertTrue($player->__isset('cash'));
        $this->assertTrue($player->__isset('bet'));
        $this->assertTrue($player->__isset('latestAction'));
    }

    /**
     * Test getter and setter
     */
    public function testGetterAndSetter(): void
    {
        $player = new Player();
        $dealer = $player->__get('dealer');
        $player->__set('dealer', true);
        $this->assertNotEquals($dealer, $player->__get('dealer'));

        $smallBlind = $player->__get('smallBlind');
        $player->__set('smallBlind', true);
        $this->assertNotEquals($smallBlind, $player->__get('smallBlind'));

        $bigBlind = $player->__get('bigBlind');
        $player->__set('bigBlind', true);
        $this->assertNotEquals($bigBlind, $player->__get('bigBlind'));

        $handle = $player->__get('handle');
        $player->__set('handle', 50);
        $this->assertNotEquals($handle, $player->__get('handle'));

        $bet = $player->__get('bet');
        $player->__set('bet', 50);
        $this->assertNotEquals($bet, $player->__get('bet'));

        $latestAction = $player->__get('latestAction');
        $player->__set('latestAction', 50);
        $this->assertNotEquals($latestAction, $player->__get('latestAction'));
    }
}
