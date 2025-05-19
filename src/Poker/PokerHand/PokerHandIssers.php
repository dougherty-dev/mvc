<?php

/**
 * PokerHandIssers class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker\PokerHand;

use App\Poker\Hand;

/**
 * PokerHandIssers class.
 */
class PokerHandIssers
{
    /**
     * Determine if hand is in a single suite.
     */
    public function isSuite(Hand $hand): bool
    {
        $suiteSequence = array_map(fn ($card): int => $card - $card % 13, $hand->handIntValues());
        return count(array_count_values($suiteSequence)) === 1;
    }

    /**
     * Determine if hand is a sequence of cards, considering ace high and low.
     * @param int[] $faceValues
     */
    public function isSequence(array $faceValues): bool
    {
        sort($faceValues);

        $sequence = range($faceValues[0], $faceValues[count($faceValues) - 1]);
        if ($faceValues === $sequence) {
            return true; // with high ace
        }

        $faceValues = array_map(fn ($card): int => $card === 14 ? 1 : $card, $faceValues);
        sort($faceValues);
        $sequence = range($faceValues[0], $faceValues[count($faceValues) - 1]);
        return $faceValues === $sequence; // with low ace
    }
}
