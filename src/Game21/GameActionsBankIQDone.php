<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Action methods for bank done criteria.
 * */
class GameActionsBankIQDone extends Game
{
    /**
     * Actions for intelligent bank.
     */
    public function bankIntelligentDone(int $id, GameActions &$gameActions): bool
    {
        $percentage = 70;
        if (is_array($gameActions->__get('cardStats'))) {
            $percentage = $gameActions->__get('cardStats')[1];
        }

        /**
         * Recurse until bank is done. Then return.
         */
        if (count($gameActions->players[$id]->hand->handValues()) === 1
                || $percentage < BANK_MAX_PERCENTAGE_INTELLIGENCE) {
            $gameActions->playerDraws($id);
            return true;
        }

        return false;
    }
}
