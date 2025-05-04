<?php

/**
 * Game card stats trait.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/** Stats methods for the game. */
trait GameCardStats
{
    /** Calculate probabilities for getting under/over 21 based on remaining cards in deck */
    public function cardStats(int $id): void
    {
        $handValue = $this->players[$id]->handScore->lowestScore($this->players[$id]->hand);
        $values = array_fill(1, WILD_MAX, 0);
        $deckValues = $this->deck->intValues();
        $cards = max(1, count($deckValues));

        foreach ($deckValues as $card) {
            $face = $card % CARDSUIT + 1;
            match (true) {
                $card > DECK_MAX => $values[1]++, // keep jokers = 1
                default => $values[$face]++ // keep aces = 1
            };
        }

        $upTo21 = 0;
        $over21 = 0;
        foreach ($values as $key => $val) {
            if ($val && $handValue + $key <= TWENTY_ONE) {
                $upTo21 += $val;
            }
            if ($val && $handValue + $key > TWENTY_ONE) {
                $over21 += $val;
            }
        }

        $this->__set('cardStats', [
            round(100 * $upTo21 / $cards, 0),
            round(100 * $over21 / $cards, 0)
        ]);
    }
}
