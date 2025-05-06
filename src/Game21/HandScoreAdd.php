<?php

/**
 * HandScoreAdd class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/** Add to subtotals. */
class HandScoreAdd
{
    /** Handling conditions for jokers and aces. */
    public function addScores(int $value, int $face, int &$jokers, int &$aces, int &$score): void
    {
        $jokers += $value > DECK_MAX ? 1 : 0;
        $aces += $face === WILD_MIN && $value <= DECK_MAX ? 1 : 0;
        $score += $face === WILD_MIN || $value > DECK_MAX ? 0 : $face;
    }
}
