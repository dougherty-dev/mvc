<?php

/**
 * HandScore class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Hand;

/** Calculate best and lowest hand scores based on given cards. */
class HandScore
{
    /** Find highest score ≤ 21. */
    public function bestScore(Hand $hand): int
    {
        $scores = $this->calculate($hand);
        return $this->findBestScore($scores);
    }

    /** Find lowest score possible, for calculating probabilities. */
    public function lowestScore(Hand $hand): int
    {
        $scores = $this->calculate($hand);
        return $this->findLowestScore($scores);
    }

    /**
     * The actual calculation of the hand value.
     *
     * @return int[]
     */
    private function calculate(Hand $hand): array
    {
        $score = 0;
        $jokers = 0;
        $aces = 0;

        foreach ($hand->getHand() as $card) {
            $value = $card->getValue();
            $face = $value % CARDSUIT + 1;

            $jokers += $value > DECK_MAX ? 1 : 0;
            $aces += $face === WILD_MIN && $value <= DECK_MAX ? 1 : 0;
            $score += $face === WILD_MIN || $value > DECK_MAX ? 0 : $face;
        }

        $scores = [];
        foreach ($this->getAceSums($aces) as $sum) {
            $scores[] = $score + $sum;
        }

        return $this->getJokerSums($jokers, $scores);
    }

    /**
     * Calculate all possible values of combinations of aces.
     *
     * @return int[]
     */
    private function getAceSums(int $aces): array
    {
        /*
        Pick powers of 2 (minus 1) of 0 to number of aces, convert to binary strings and then arrays,
        and finally distribute 1 or 14 over the result in order to get all possible sums.
        Example: 2 aces => [2^0 - 1, 2^1 - 1, 2^2 - 1] = [0, 1, 3] => ['00', '01', '11']
        => [ [0, 0], [0, 1], [1, 1] ] => [ [1, 1], [1, 14], [14, 14] ] => [2, 15, 28].
        */
        if ($aces === 0) {
            return [0];
        }
        $aceSums = [];
        $powers = array_map(fn (int $num): int => 2 ** $num - 1, range(0, $aces));
        foreach ($powers as $power) {
            $binaryString = sprintf("%0{$aces}d", decbin($power));
            $binaryArray = (array) str_split($binaryString);
            $distribution = array_map(fn (string $num): int => $num === '0' ?
                WILD_MIN : intval($num) * WILD_MAX, $binaryArray);
            $aceSums[] = array_sum($distribution);
        }
        return $aceSums;
    }

    /**
     * Calculate all possible values of combinations of jokers.
     *
     * @param int[] $scores
     * @return int[]
     */
    private function getJokerSums(int $jokers, array $scores): array
    {
        // Add possible joker values to all scores, get rid of duplicates.
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

    /**
     * Calculation of score ≤ 21.
     *
     * @param int[] $finalScores
     */
    private function findBestScore(array $finalScores): int
    {
        $playerScore = ($finalScores) ? min($finalScores) : 0;
        if ($playerScore === 0 || $playerScore > TWENTY_ONE) {
            return $playerScore;
        }

        foreach ($finalScores as $score) {
            if ($score > TWENTY_ONE) {
                break;
            }
            $playerScore = $score;
        }

        return $playerScore;
    }

    /**
     * Calculation of lowest score.
     *
     * @param int[] $finalScores
     */
    private function findLowestScore(array $finalScores): int
    {
        $playerScore = ($finalScores) ? min($finalScores) : 0;
        return $playerScore;
    }
}
