<?php

/**
 * PokerGameBeginDetermineBadges helper class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Begin;

use App\Poker\Hand;

/**
 * The PokerGameBeginDetermineBadges helper class.
 */
class PokerGameBeginDetermineBadges
{
    /**
     * Collect face values (2–14), integer values (0–51) and sort.
     * Dealer is highest ranked, small blind next, big blind next.
     * @return int[]
     */
    public function determineBadges(Hand $hand): array
    {
        $handValues = $hand->getHand();
        $handFaceValues = $hand->handFaceValues();
        $handRanks = array_map(
            fn ($key): array =>
            [$handFaceValues[$key], $handValues[$key]->getCard(), $key],
            array_keys($handValues)
        );

        array_multisort($handRanks, \SORT_DESC);
        $dealer = $handRanks[0][2];
        $smallBlind = ($dealer + 1) % 3;
        $bigBlind = ($dealer + 2) % 3;

        return [$dealer, $smallBlind, $bigBlind];
    }
}
