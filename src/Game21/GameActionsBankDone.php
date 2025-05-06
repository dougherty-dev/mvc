<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/** Action methods for bank done criteria. */
class GameActionsBankDone extends Game
{
    /** Actions for non-intelligent bank. */
    public function bankNotIntelligentDone(int $id, GameActions &$gameActions): bool
    {
        if ($gameActions->players[$id]->__get('score') < BANK_MAX) {
            $gameActions->playerDraws($id);
            return true;
        }

        return false;
    }
}
