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
class SetNewDealer extends NewDealerFuncs
{
    /**
     * Determine next dealer from either 2 or 3 players after round completed.
     * @param Player[] $players
     * @return int[] $players
     */
    public function set(array $players): array
    {
        $this->dealer = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isDealer(), $players));

        $outStates = (int) array_sum(array_map(fn ($player): int => $player->getState() === PlayerStates::Out ? 1 : 0, $players));

        match (true) {
            $outStates >= 2                                                     => [-1, -1, -1],
            $outStates === 0                                                    => $this->threePlayersLeft(),
            $players[$this->dealer]->getState() === PlayerStates::Out           => $this->newDealerOut(),
            $players[($this->dealer + 1) % 3]->getState() === PlayerStates::Out => $this->newDealerPlusOneOut(),
            $players[($this->dealer + 2) % 3]->getState() === PlayerStates::Out => $this->newDealerPlusTwoOut(),
            default                                                             => [-1, -1, -1]
        };

        return [$this->dealer, $this->smallBlind, $this->bigBlind];
    }
}
