<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Deck;

/**
 * Action methods for the game.
 */
class GameActionsStats extends GameFoundation
{
    /**
     * Calculate probabilities for getting under/over 21 based on remaining cards in deck.
     *
     * @param Player[] $players
     * @return int[]
     */
    public function cardStats(int $id, array $players, Deck $deck): array
    {
        $handValue = $players[$id]->handScore->lowestScore($players[$id]->hand);
        $values = array_fill(1, WILD_MAX, 0);
        $deckValues = $deck->intValues();
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
            match (true) {
                $handValue + $key <= TWENTY_ONE => $upTo21 += $val,
                default => $over21 += $val
            };
        }

        return [
            (int) round(100 * $upTo21 / $cards, 0),
            (int) round(100 * $over21 / $cards, 0)
        ];
    }
}
