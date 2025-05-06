<?php

/**
 * Game actions test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Game21;

use PHPUnit\Framework\TestCase;
use App\Game21\GameActionsBusted;
use App\Game21\GameActionsBankMoves;
use App\Game21\GameActionsPlayerMoves;
use App\Game21\GameActionsBankDone;
use App\Game21\GameActionsBankIQDone;
use App\Game21\GameActionsPlayerDraws;

/** Test cases for class Card. */
class GameActionsBankMovesTest extends TestCase
{
    /** Construct object and check player draw methods. */
    public function testPlayerDraws(): void
    {
        $this->assertInstanceOf("\App\Game21\GameActionsBusted", new GameActionsBusted());
        $this->assertInstanceOf("\App\Game21\GameActionsBankMoves", new GameActionsBankMoves());
        $this->assertInstanceOf("\App\Game21\GameActionsPlayerMoves", new GameActionsPlayerMoves());
        $this->assertInstanceOf("\App\Game21\GameActionsBankDone", new GameActionsBankDone());
        $this->assertInstanceOf("\App\Game21\GameActionsBankIQDone", new GameActionsBankIQDone());
        $this->assertInstanceOf("\App\Game21\GameActionsPlayerDraws", new GameActionsPlayerDraws());
    }
}
