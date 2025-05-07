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
class HandScoreAddAces
{
    /**
     * Handling conditions for jokers and aces.
     */
    public function addAceScores(int $value, int $face, int &$aces): void
    {
        $aces += $face === WILD_MIN && $value <= DECK_MAX ? 1 : 0;
    }
}
