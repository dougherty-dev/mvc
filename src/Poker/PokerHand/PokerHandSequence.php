<?php

/**
 * PokerHandSequence class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker\PokerHand;

use App\Poker\Hand;

/**
 * PokerHandSequence class.
 */
class PokerHandSequence extends PokerHandSeries
{
    /**
     * Single high card, straight, flush, or straight flush.
     */
    protected function sequence(): string
    {
        $issers = new PokerHandIssers();
        $isSequence = $issers->isSequence($this->faceValues);
        $isSuite = $issers->isSuite($this->hand);
        return match (true) {
            $isSequence && $isSuite     => $this->straightFlush(),
            !$isSequence && $isSuite    => $this->flush(),
            $isSequence && !$isSuite    => $this->straight(),
            default                     => $this->highCard()
        };
    }
}
