<?php

/**
 * DealOrder class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Player;

/**
 * The DealOrder helper class.
 */
class DealOrder
{
    /**
     * Determine deal order. In this setup, there are always three players when deciding on
     * dealer and when dealing hole cards. No additional cards are ever dealt to players.
     * @param Player[] $players
     * @return int[]
     */
    public function dealOrder(array $players): array
    {
        /** Find player with dealer badge */
        $dealer = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isDealer(), $players));

        return array_map(fn ($key): int => ($dealer + $key) % 3, [1, 2, 3]);
    }
}
