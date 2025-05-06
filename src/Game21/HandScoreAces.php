<?php

/**
 * HandScoreAces class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/**
 * Calculate hand scores for pure combinations of aces.
 */
class HandScoreAces extends GameFoundation
{
    /**
     * Calculate all possible values of combinations of aces.
     *
     * @return int[]
     */
    public function getAceSums(int $aces): array
    {
        /**
        * Pick powers of 2 (minus 1) of 0 to number of aces, convert to binary strings and then arrays,
        * and finally distribute 1 or 14 over the result in order to get all possible sums.
        * Example: 2 aces => [2^0 - 1, 2^1 - 1, 2^2 - 1] = [0, 1, 3] => ['00', '01', '11']
        * => [ [0, 0], [0, 1], [1, 1] ] => [ [1, 1], [1, 14], [14, 14] ] => [2, 15, 28].
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
}
