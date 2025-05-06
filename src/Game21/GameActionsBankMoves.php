<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Game21\GameActionsBankDone;

/**
 * Action methods for bank moves.
 */
class GameActionsBankMoves extends Game
{
    private GameActionsWinner $gaWinner;
    private GameActionsBankDone $gaBankDone;
    private GameActionsBankIQDone $gaBankIQDone;

    /**
     * Define events when bank draws a card.
     */
    public function bankMoves(int $id, GameActions &$gameActions): void
    {
        $this->gaBankDone = new GameActionsBankDone();
        $this->gaBankIQDone = new GameActionsBankIQDone();

        if ($gameActions->players[$id]->__get('score') > TWENTY_ONE) {
            $gameActions->gaBusted->playerBusted($id, $gameActions);
            return;
        }

        $bankDone = match ($gameActions->__get('bankIntelligence')) {
            '' => $this->gaBankDone->bankNotIntelligentDone($id, $gameActions),
            default => $this->gaBankIQDone->bankIntelligentDone($id, $gameActions)
        };

        if ($bankDone) {
            return;
        }

        $this->gaWinner = new GameActionsWinner();
        $this->gaWinner->determineWinner($gameActions);
    }
}
