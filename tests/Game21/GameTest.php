<?php

/**
 * Game test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Game21;

use PHPUnit\Framework\TestCase;
use App\Game21\Game;
use App\Game21\GameFoundation;

/**
 * Test cases for class Game.
 */
class GameTest extends TestCase
{
    /**
     * Instantiate classes.
     */
    public function testCreateInstance(): void
    {
        $this->assertInstanceOf("\App\Game21\Game", new Game());
        $this->assertInstanceOf("\App\Game21\GameFoundation", new GameFoundation());
    }

    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Game21\Game", $game);
        $this->assertTrue($game->__isset('state'));
        $this->assertTrue($game->__isset('bankIntelligence'));
        $this->assertTrue($game->__isset('showDeck'));
        $this->assertTrue($game->__isset('cardStats'));
    }

    /**
     * Test getter and setter
     */
    public function testGetterAndSetter(): void
    {
        $game = new Game();
        $cardStats = $game->__get('cardStats');
        $game->__set('cardStats', [20, 180]);
        $this->assertNotEquals($cardStats, $game->__get('cardStats'));
    }
}
