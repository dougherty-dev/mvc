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

        $dealerPlayer = $players[$dealer];
        $smallBlindPlayer = $players[$smallBlind];
        $bigBlindPlayer = $players[$bigBlind];

        $outStates = (int) array_sum(array_map(fn ($player): int => $player->getState() === PlayerStates::Out ? 1 : 0, $players));

        return match (true) {
            $outStates != 0 => [
                $dealer,
                ($dealer + 1) % 3,
                ($dealer + 2) % 3
            ],

            $dealerPlayer->getState() === PlayerStates::Out => [
                ($dealer + 1) % 3,
                $dealer,
                ($dealer + 2) % 3
            ],

            $smallBlindPlayer->getState() === PlayerStates::Out => [
                $dealer,
                $dealer,
                ($dealer + 2) % 3
            ],

            $bigBlindPlayer->getState() === PlayerStates::Out => [
                $dealer,
                $dealer,
                ($dealer + 1) % 3
            ],

            default => [$dealer, $smallBlind, $bigBlind]
        };
    }
}
