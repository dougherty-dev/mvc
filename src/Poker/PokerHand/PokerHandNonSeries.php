<?php

/**
 * PokerHandBase class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker\PokerHand;

/**
 * PokerHandBase class.
 * Functions for determining poker hand value.
 */
class PokerHandNonSeries extends PokerHandBase
{
    /**
     * Four of a kind, one high card, no kickers.
     */
    protected function fourOfAKind(): string
    {
        $value = PokerHands::FourOfAKind->value;
        $highCards = [$this->mults[0][0], 0];
        return $this->glueHex($value, $highCards);
    }

    /**
     * Full house, one high card, no kickers.
     */
    protected function fullHouse(): string
    {
        $value = PokerHands::FullHouse->value;
        $highCards = [$this->mults[0][0], 0];
        return $this->glueHex($value, $highCards);
    }

    /**
     * Three of a kind, one high card, no kickers.
     */
    protected function threeOfAKind(): string
    {
        $value = PokerHands::ThreeOfAKind->value;
        $highCards = [$this->mults[0][0], 0];
        return $this->glueHex($value, $highCards);
    }

    /**
     * Two pairs, two high cards, one kicker.
     */
    protected function twoPairs(): string
    {
        $value = PokerHands::TwoPairs->value;
        $highCards = [$this->mults[0][0], $this->mults[1][0]];
        $kickers = [$this->mults[2][0], 0, 0, 0];
        return $this->glueHex($value, $highCards, $kickers);
    }

    /**
     * Pair, one high card, three kickers.
     */
    protected function pair(): string
    {
        $value = PokerHands::Pair->value;
        $highCards = [$this->mults[0][0], 0];
        $kickers = [$this->mults[1][0], $this->mults[2][0], $this->mults[3][0], 0];
        return $this->glueHex($value, $highCards, $kickers);
    }
}
