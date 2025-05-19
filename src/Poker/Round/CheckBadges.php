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

        [$dealer, $smallBlind, $bigBlind] = match (true) {
            count($players) === 3 => [
                $dealer,
                $smallBlind = ($dealer + 1) % 3,
                $bigBlind = ($dealer + 2) % 3
            ],

            $dealerPlayer->getState() === PlayerStates::Out => [
                $dealer = ($dealer + 1) % 3,
                $smallBlind = $dealer,
                $bigBlind = ($dealer + 2) % 3
            ],

            $smallBlindPlayer->getState() === PlayerStates::Out => [
                $dealer,
                $smallBlind = $dealer,
                $bigBlind = ($dealer + 2) % 3
            ],

            $bigBlindPlayer->getState() === PlayerStates::Out => [
                $dealer,
                $smallBlind = $dealer,
                $bigBlind = ($dealer + 1) % 3
            ],

            default => [$dealer, $smallBlind, $bigBlind]
        };

        return [$dealer, $smallBlind, $bigBlind];
    }
}
