<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Game21\GameActionsPlayerDraws;
use App\Game21\GameActionsBet;
use App\Game21\GameActionsBusted;

/**
 * Action methods for the game.
 */
class GameActions extends Game
{
    protected GameActionsBankMoves $gaBankMoves;
    protected GameActionsPlayerMoves $gaPlayerMoves;
    protected GameActionsPlayerDraws $gaPlayerDraws;
    public GameActionsBet $gaBet;
    public GameActionsBusted $gaBusted;
    public GameActionsContinue $gaContinue;

    /**
     * Define events when a player draws a card.
     */
    public function playerDraws(int $id): void
    {
        $this->gaBusted = new GameActionsBusted();
        $this->gaPlayerDraws = new GameActionsPlayerDraws();
        $this->gaBusted = new GameActionsBusted();

        $this->gaPlayerDraws->playerDrawsBefore($id, $this);

        if ($id === 0) {
            $this->gaPlayerMoves = new GameActionsPlayerMoves();
            $this->gaPlayerMoves->playerMoves($id, $this);
        }

        if ($id === 1) {
            $this->gaBankMoves = new GameActionsBankMoves();
            $this->gaBankMoves->bankMoves($id, $this);
        }

        $this->gaPlayerDraws->playerDrawsAfter($id, $this);
    }
}
