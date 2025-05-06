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
    public GameActionsContinue $gaContinue;
    public GameActionsBankMoves $gaBankMoves;
    public GameActionsPlayerMoves $gaPlayerMoves;
    public GameActionsBet $gaBet;
    public GameActionsBusted $gaBusted;
    private GameActionsPlayerDraws $gaPlayerDraws;

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
