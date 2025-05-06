<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Action methods for player moves.
 */
class GameActionsPlayerMoves extends Game
{
    /**
     * Define events when player draws a card.
     */
    public function playerMoves(int $id, GameActions &$gameActions): void
    {
        if (count($gameActions->players[$id]->hand->handValues()) === 1) {
            $gameActions->__set('state', self::STATES['player_bets']);
        }

        if ($gameActions->players[$id]->__get('score') > TWENTY_ONE) {
            $gameActions->gaBusted->playerBusted($id, $gameActions);
        }
    }
}
