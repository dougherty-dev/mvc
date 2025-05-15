<?php

/**
 * Poker GameFoundation test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\GameFoundation;
use App\Poker\GameStates;

/**
 * Test cases for class GameFoundation.
 * @SuppressWarnings("StaticAccess")
 */
class GameFoundationTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $gameFoundation = new GameFoundation();
        $this->assertInstanceOf("\App\Poker\GameFoundation", $gameFoundation);

        foreach (GameStates::cases() as $state) {
            $this->assertNotEquals($state->stateText(), uniqid());
            $this->assertNotEquals($state->betCost(), rand(9, 100));
        }
    }
}
