<?php

/**
 * CheckBadges class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The CheckBadges class.
 * @SuppressWarnings("StaticAccess")
 */
class CheckBadges
{
    /**
     * Make sure badges belong to active players.
     * @param Player[] $players
     * @return int[] $players
     */
    public function check(array $players): array
    {
        $dealer = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isDealer(), $players));
        $smallBlind = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isSmallBlind(), $players));
        $bigBlind = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isBigBlind(), $players));

        if (count($players) === 3) {
            $smallBlind = ($dealer + 1) % 3;
            $bigBlind = ($dealer + 2) % 3;
        }

        /** dealer is out */
        if ($players[$dealer]->getState() === PlayerStates::Out) {
            $dealer = ($dealer + 1) % 3;
            $smallBlind = $dealer;
            $bigBlind = ($dealer + 2) % 3;
        }

        /** small blind is out */
        if ($players[$smallBlind]->getState() === PlayerStates::Out) {
            $smallBlind = $dealer;
            $bigBlind = ($dealer + 2) % 3;
        }

        /** big blind is out */
        if ($players[$bigBlind]->getState() === PlayerStates::Out) {
            $smallBlind = $dealer;
            $bigBlind = ($dealer + 1) % 3;
        }

        return [$dealer, $smallBlind, $bigBlind];
    }
}
