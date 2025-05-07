<?php

/**
 * HandScoreAdd class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Add to subtotals in HandScore.
 */
class HandScoreAddJokers
{
    /**
     * Handling conditions for jokers and aces.
     */
    public function addJokerScores(int $value, int &$jokers): void
    {
        $jokers += $value > DECK_MAX ? 1 : 0;
    }
}
