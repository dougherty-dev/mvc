<?php

/**
 * FindAllHands class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Card;
use App\Poker\Hand;
use App\Poker\PokerHand\PokerHandValue;
use App\Poker\PokerHand\PokerHandCombinations;

/**
 * The FindAllHands class.
 */
class FindAllHands
{
    /**
     * Find all possible hands given a hand and five community cards.
     * @param int[] $playerValues
     * @param int[] $tableValues
     * @return mixed[]
     */
    public function findHands(array $playerValues, array $tableValues): array
    {
        $hand = new Hand();
        $hand->addToHand([...$tableValues, ...$playerValues]);

        $permutations = (new PokerHandCombinations())->permuteHand();
        $pokerHand = new PokerHandValue();

        $handValues = $hand->handIntValues();
        $hands = [];
        $bestHand = [];
        $bestHex = "";

        foreach ($permutations as $permutation) {
            $temphand = new Hand();
            array_map(fn ($card): null => $temphand->addCard(new Card($handValues[$card])), $permutation);

            $hex = $pokerHand->checkHand($temphand);
            if ($hex > $bestHex) {
                $bestHex = $hex;
                $bestHand = $temphand->handSymbolValues();
            }
            $hands[] = $temphand->handSymbolValues();
        }

        return [
            "originalCards" => $hand->handSymbolValues(),
            "bestHex" => $bestHex,
            "bestHand" => $bestHand,
            "hands" => $hands
        ];
    }
}
