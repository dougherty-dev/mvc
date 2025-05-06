<?php

/**
 * HandScoreCalculate class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Hand;
use App\Game21\HandScoreAces;
use App\Game21\HandScoreJokers;
use App\Game21\HandScoreAdd;

/**
 * Calculate best hand score.
 */
class HandScoreCalculate extends GameFoundation
{
    public function __construct(
        private HandScoreAces $handScoreAces = new HandScoreAces(),
        private HandScoreJokers $handScoreJokers = new HandScoreJokers(),
        private HandScoreAdd $handScoreAdd = new HandScoreAdd()
    ) {
    }

    /**
     * The actual calculation of the hand value.
     *
     * @return int[]
     */
    public function calculate(Hand $hand): array
    {
        $score = 0;
        $jokers = 0;
        $aces = 0;

        foreach ($hand->getHand() as $card) {
            $value = $card->getValue();
            $face = $value % CARDSUIT + 1;
            $this->handScoreAdd->addScores($value, $face, $jokers, $aces, $score);
        }

        $scores = [];
        foreach ($this->handScoreAces->getAceSums($aces) as $sum) {
            $scores[] = $score + $sum;
        }

        return $this->handScoreJokers->getJokerSums($jokers, $scores);
    }
}
