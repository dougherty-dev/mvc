<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/** Game action method for making a bet. */
class GameActionsBet extends Game
{
    /** Handle bets. */
    public function playerBets(int $bet, GameActions &$gameActions): void
    {
        foreach ($gameActions->players as $player) {
            $bet = min($bet, $player->__get('balance'));
            $bet = max(0, $bet);

            $player->__set('bet', $bet);
            $player->__set('balance', $player->__get('balance') - $bet);
        }

        $gameActions->__set('state', self::STATES['player_draws']);
    }
}
