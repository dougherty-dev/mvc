<?php

/**
 * SetNewDealer class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The SetNewDealer class.
 * @SuppressWarnings("StaticAccess")
 */
class SetNewDealer
{
    /**
     * Determine next dealer from either 2 or 3 players after round completed.
     * @param Player[] $players
     * @return int[] $players
     */
    public function set(array $players): array
    {
        $dealer = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isDealer(), $players));

        $dealer = ($dealer + 1) % 3;
        if (count($players) === 3) {
            $smallBlind = ($dealer + 1) % 3;
            $bigBlind = ($dealer + 2) % 3;
            return [$dealer, $smallBlind, $bigBlind];
        }

        /** new dealer is out */
        if ($players[$dealer]->getState() === PlayerStates::Out) {
            $dealer = ($dealer + 1) % 3;
            $smallBlind = $dealer;
            $bigBlind = ($dealer + 2) % 3;
            return [$dealer, $smallBlind, $bigBlind];
        }

        /** new dealer is still in */
        $smallBlind = $dealer;
        $bigBlind = ($dealer + 1) % 3;

        if ($players[$bigBlind]->getState() === PlayerStates::Out) {
            $bigBlind = ($dealer + 2) % 3;
        }

        return [$dealer, $smallBlind, $bigBlind];
    }
}
