<?php

declare(strict_types=1);

namespace App\Game21;

use PHPUnit\Framework\TestCase;
use RangeException;

/** Test cases for class Card. */
class GameTest extends TestCase
{
    /** Construct object with argument and verify that the object has the expected properties. */
    public function testCreateObject(): void
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Game21\Game", $game);
        $this->assertTrue($game->__isset('state'));
        $this->assertTrue($game->__isset('bankIntelligence'));
        $this->assertTrue($game->__isset('showDeck'));
        $this->assertTrue($game->__isset('cardStats'));
    }

    /** Construct object with invalid argument. */
    public function testCreateObjectWithTooLargeArgument(): void
    {
        $this->expectException(RangeException::class);
        new Game(cardStats: [201, 0]);
    }

    /** Construct object with invalid argument. */
    public function testCreateObjectWithTooSmallArgument(): void
    {
        $this->expectException(RangeException::class);
        new Game(cardStats: [-1, 0]);
    }

    /** Test getter and setter */
    public function testGetterAndSetter(): void
    {
        $game = new Game();
        $cardStats = $game->__get('cardStats');
        $game->__set('cardStats', [20, 180]);
        $this->assertNotEquals($cardStats, $game->__get('cardStats'));
    }
}
