<?php

/**
 * PokerHandCombinations class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker\PokerHand;

use App\Poker\Hand;

/**
 * PokerHandCombinations class.
 */
class PokerHandCombinations
{
    /**
     * All permutations n choose k of an array.
     * @param int[] $cards
     * @return array<int[]>
     */
    public function permute(array $cards): array
    {
        $permutations = [[]];

        foreach ($cards as $card) {
            $copy = $permutations;
            foreach (array_keys($copy) as $key) {
                array_push($copy[$key], $card);
            }
            array_push($permutations, ...$copy);
        }

        return $permutations;
    }

    /**
     * Specifically 7 choose 5 = 21 hands.
     * @return array<int[]>
     */
    public function permuteHand(): array
    {
        $cards = range(0, 6);

        $hands = array_filter($this->permute($cards), fn ($hand): bool => count($hand) === 5);
        return array_values($hands);
    }
}
