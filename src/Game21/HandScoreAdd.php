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
class HandScoreAdd
{
    /**
     * Handling conditions for total score.
     */
    public function addScores(int $value, int $face, int &$score): void
    {
        $score += $face === WILD_MIN || $value > DECK_MAX ? 0 : $face;
    }
}
