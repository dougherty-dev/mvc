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
class PokerHandBase
{
    /** @var array<int, array<int, int>> $mults */
    protected array $mults = [];
    /** @var int[] $kickers */
    protected array $kickers = [];

    /**
     * Determine high card if ace part of straight.
     */
    protected function aceHiLo(): int
    {
        $mults = array_map(fn ($arr): int => $arr[0], $this->mults);
        return match ($mults) {
            [14, 5, 4, 3, 2] => 5,
            [14, 13, 12, 11, 10] => 14,
            default => $this->mults[0][0]
        };
    }

    /**
     * Construct a padded hex string from hand properties.
     * H7E0000 is four of a kind (7) with ace-high (E).
     * H2J8300 is two pairs of jacks and eights, with kicker 3.
     * These strings are fully comparable h1 < h2.
     * @param int[] $highCards
     * @param int[] $kickers
     */
    protected function glueHex(
        int $handValue,
        array $highCards,
        array $kickers = [0, 0, 0, 0]
    ): string {
        return "H{$handValue}" .
            implode("", array_map(fn ($card): string => dechex($card), $highCards)) .
            implode("", array_map(fn ($kicker): string => dechex($kicker), $kickers));
    }
}
