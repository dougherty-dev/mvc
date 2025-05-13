<?php

/**
 * Poker player test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\PlayerButtons;
use App\Poker\PlayerVars;
use App\Poker\Player;
use App\Poker\Hand;
use App\Poker\PlayerStates;

/**
 * Test cases for class Player.
 * @SuppressWarnings("StaticAccess")
 */
class PlayerTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $buttons = new PlayerButtons();
        $this->assertInstanceOf("\App\Poker\PlayerButtons", $buttons);
        $this->assertFalse($buttons->isDealer());
        $this->assertFalse($buttons->isBigBlind());
        $this->assertFalse($buttons->isSmallBlind());

        foreach (PlayerStates::cases() as $state) {
            $this->assertNotEquals($state->stateText(), uniqid());
        }

        $vars = new PlayerVars();
        $this->assertInstanceOf("\App\Poker\PlayerVars", $vars);
        $this->assertEquals($vars->getHandle(), 0);
        $this->assertEquals($vars->getLatestAction(), 0);
        $this->assertEquals($vars->getCash(), 0);
        $this->assertEquals($vars->getBet(), 0);

        $player = new Player();
        $this->assertInstanceOf("\App\Poker\Player", $player);

        $hand = new Hand();
        $player->sethand($hand);
        $this->assertEquals($player->gethand(), new Hand());
    }
}
