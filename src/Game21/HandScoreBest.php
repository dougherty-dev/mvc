<?php

/**
 * HandScoreBest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Calculate best hand score.
 */
class HandScoreBest extends GameFoundation
{
    /**
     * Calculation of score ≤ 21.
     *
     * @param int[] $finalScores
     */
    public function findBestScore(array $finalScores): int
    {
        $playerScore = ($finalScores) ? min($finalScores) : 0;

        return match (true) {
            $playerScore === 0 => 0,
            $playerScore > TWENTY_ONE => $playerScore,
            default => max([0, ...array_filter($finalScores, fn ($score) => $score <= TWENTY_ONE)])
        };
    }
}
