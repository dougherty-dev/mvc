<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Game action method for deciding winner.
 */
class GameActionsWinner extends Game
{
    /**
     * Decide who wins based on score, and settle balances.
     */
    public function determineWinner(GameActions &$gameActions): void
    {
        if ($gameActions->players[0]->__get('score') > $gameActions->players[1]->__get('score')) {
            $gameActions->players[0]->__set(
                'balance',
                $gameActions->players[0]->__get('balance') + 2 * $gameActions->players[1]->__get('bet')
            );
            $gameActions->__set('state', self::STATES['player_wins']);
        }

        if ($gameActions->players[1]->__get('score') >= $gameActions->players[0]->__get('score')) {
            $gameActions->players[1]->__set(
                'balance',
                $gameActions->players[1]->__get('balance') + 2 * $gameActions->players[1]->__get('bet')
            );
            $gameActions->__set('state', self::STATES['bank_wins']);
        }
    }
}
