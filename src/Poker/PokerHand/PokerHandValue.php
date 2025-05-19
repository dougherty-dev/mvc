<?php

/**
 * PokerHandValue class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker\PokerHand;

use App\Poker\Hand;

/**
 * PokerHandValue class.
 */
class PokerHandValue extends PokerHandSequence
{
    /**
     * Deconstruct hand using array values, match pattern.
     */
    public function checkHand(Hand $hand): string
    {
        $this->hand = $hand;
        $this->faceValues = $this->hand->handFaceValues();

        $mults = array_count_values($this->faceValues);
        arsort($mults);

        $handString = implode("", $mults);

        $multsKeys = array_keys($mults);
        $multsValues = array_values($mults);
        array_multisort($multsValues, SORT_DESC, $multsKeys, SORT_DESC);

        $this->mults = array_map(fn ($keys, $values): array =>
            [$keys, $values], $multsKeys, $multsValues);

        return match ($handString) {
            PokerHands::FourOfAKind->string()   => $this->fourOfAKind(),
            PokerHands::FullHouse->string()     => $this->fullHouse(),
            PokerHands::ThreeOfAKind->string()  => $this->threeOfAKind(),
            PokerHands::TwoPairs->string()      => $this->twoPairs(),
            PokerHands::Pair->string()          => $this->pair(),
            PokerHands::HighCard->string()      => $this->sequence(),
            default                             => "",
        };
    }
}
