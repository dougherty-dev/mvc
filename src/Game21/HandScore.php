<?php

/**
 * HandScore class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Hand;
use App\Game21\HandScoreBest;
use App\Game21\HandScoreCalculate;

/**
 * Calculate best and lowest hand scores based on given cards.
 */
class HandScore extends GameFoundation
{
    public function __construct(
        private HandScoreBest $handScoreBest = new HandScoreBest(),
        private HandScoreCalculate $handScoreCalculate = new HandScoreCalculate()
    ) {
    }

    /**
     * Find highest score ≤ 21.
     */
    public function bestScore(Hand $hand): int
    {
        $scores = $this->handScoreCalculate->calculate($hand);
        return $this->handScoreBest->findBestScore($scores);
    }

    /**
     * Find lowest score possible, for calculating probabilities.
     */
    public function lowestScore(Hand $hand): int
    {
        $scores = $this->handScoreCalculate->calculate($hand);
        $scores = ($scores) ? min($scores) : 0;
        return $scores;
    }
}
