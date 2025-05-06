<?php

/**
 * HandScoreJokers class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Calculate hand scores for pure combinations of jokers.
 */
class HandScoreJokers extends GameFoundation
{
    /**
     * Calculate all possible values of combinations of jokers.
     *
     * @param int[] $scores
     * @return int[]
     */
    public function getJokerSums(int $jokers, array $scores): array
    {
        if ($jokers === 0) {
            return $scores;
        }

        $finalScores = [];
        $jokerRange = min(TWENTY_ONE, $jokers * WILD_MAX);

        for ($i = $jokers; $i <= $jokerRange; $i++) {
            foreach ($scores as $scr) {
                $finalScores[] = $scr + $i;
            }
        }

        $finalScores = array_unique($finalScores);
        sort($finalScores);

        return $finalScores;
    }
}
