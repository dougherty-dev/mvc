<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Action methods for the game.
 */
class GameActionsBusted extends GameFoundation
{
    /**
     * Define events when a player is over 21.
     */
    public function playerBusted(int $id, GameActions &$gameActions): void
    {
        $nextID = ($id + 1) % 2;
        $gameActions->players[$nextID]->__set('balance', $gameActions->players[$nextID]->__get('balance') + 2 * $gameActions->players[$nextID]->__get('bet'));

        $state = match ($id) {
            0 => 'player_busted',
            default => 'bank_busted'
        };

        $gameActions->__set('state', self::STATES[$state]);
    }
}
