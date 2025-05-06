<?php

/**
 * Player test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Game21;

use PHPUnit\Framework\TestCase;
use App\Game21\Player;

/**
 * Test cases for class Card.
 */
class PlayerTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Game21\Player", $player);
        $this->assertTrue($player->__isset('bet'));
        $this->assertTrue($player->__isset('balance'));
    }

    /**
     * Test getter and setter
     */
    public function testGetterAndSetter(): void
    {
        $player = new Player();
        $bet = $player->__get('bet');
        $player->__set('bet', 50);
        $this->assertNotEquals($bet, $player->__get('bet'));
    }
}
