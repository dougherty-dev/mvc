<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Hand;

/**
 * Action methods for the game.
 */
class GameActionsContinue extends Game
{
    /**
     * Continue game after button confirmation.
     */
    public function continueGame(GameActions &$gameActions): void
    {
        $gameActions->__set('state', self::STATES['player_initiates']);
        $gameActions->__set('cardStats', [0, 0]);

        foreach ($gameActions->players as $player) {
            $player->hand = new Hand();
            $player->__set('bet', 0);
            $player->__set('score', 0);
            if ($player->__get('balance') === 0) {
                $gameActions->__set('state', self::STATES['game_over']);
            }
        }
    }
}
