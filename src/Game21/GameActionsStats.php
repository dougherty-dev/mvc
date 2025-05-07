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
     * @var int[] $values
     */
    private array $values;

    /**
     * Calculate probabilities for getting under/over 21 based on remaining cards in deck.
     *
     * @param Player[] $players
     * @return int[]
     */
    public function cardStats(int $id, array $players, Deck $deck): array
    {
        $handValue = $players[$id]->handScore->lowestScore($players[$id]->hand);
        $this->values = array_fill(1, WILD_MAX, 0);
        $deckValues = $deck->intValues();
        $cards = max(1, count($deckValues));

        array_map(fn ($card): null => $this->keepWildsSmall($card), $deckValues);

        [$upTo21, $over21] = $this->count21($handValue);

        return [
            (int) round(100 * $upTo21 / $cards, 0),
            (int) round(100 * $over21 / $cards, 0)
        ];
    }

    /**
     * Count aces and jokers as 1.
     */
    private function keepWildsSmall(int $card): void
    {
        $face = $card % CARDSUIT + 1;
        match (true) {
            $card > DECK_MAX => $this->values[1]++,
            default => $this->values[$face]++
        };
    }

    /**
     * Count distribution under and over 21.
     *
     * @return int[]
     */
    private function count21(int $handValue): array
    {
        $upTo21 = 0;
        $over21 = 0;
        foreach ($this->values as $key => $val) {
            match (true) {
                $handValue + $key <= TWENTY_ONE => $upTo21 += $val,
                default => $over21 += $val
            };
        }

        return [$upTo21, $over21];
    }
}
