<?php

/**
 * PokerHandSeries class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker\PokerHand;

use App\Poker\Hand;

/**
 * PokerHandSeries class.
 */
class PokerHandSeries extends PokerHandNonSeries
{
    protected Hand $hand;
    /** @var int[] $faceValues */
    protected array $faceValues = [];

    /**
     * Straight flush, one high card, no kickers.
     */
    protected function straightFlush(): string
    {
        $value = PokerHands::StraightFlush->value;

        $highCards = [$this->aceHiLo(), 0];
        return $this->glueHex($value, $highCards);
    }

    /**
     * Flush, one high card, no kickers.
     */
    protected function flush(): string
    {
        $value = PokerHands::Flush->value;
        $highCards = [$this->mults[0][0], 0];
        return $this->glueHex($value, $highCards);
    }

    /**
     * Straight, one high card, no kickers.
     */
    protected function straight(): string
    {
        $value = PokerHands::Straight->value;
        $highCards = [$this->aceHiLo(), 0];
        return $this->glueHex($value, $highCards);
    }

    /**
     * Nothing, one high card, four kickers.
     */
    protected function highCard(): string
    {
        $value = PokerHands::HighCard->value;
        $highCards = [$this->mults[0][0], 0];
        $kickers = [$this->mults[1][0], $this->mults[2][0], $this->mults[3][0], $this->mults[4][0]];
        return $this->glueHex($value, $highCards, $kickers);
    }
}
