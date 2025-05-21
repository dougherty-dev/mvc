<?php

/**
 * HexDecode class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Faces;
use App\Poker\PokerHand\PokerHands;
use App\Poker\PokerHand\PokerHandValue;

/**
 * The HexDecode class.
 * @SuppressWarnings("StaticAccess")
 */
class HexDecode
{
    /**
     * Decode hex string.
     * @return mixed[]
     */
    public function hexDecode(string $hex): array
    {
        $hand = PokerHands::tryFrom((int) $hex[1]) ?? "";
        $hand = ($hand) ? $hand->text() : "";
        $highCards = array_map(fn ($char): string => $this->decode($char), [$hex[2], $hex[3]]);
        $kickers = array_map(fn ($char): string => $this->decode($char), [$hex[4], $hex[5], $hex[6], $hex[7]]);

        return [
            "hex" => $hex,
            "hand" => $hand,
            "highCards" => $highCards,
            "kickers" => $kickers
        ];
    }

    /**
     * Find facetext.
     */
    private function decode(string $hexchar): string
    {
        $card = (string) hexdec($hexchar);
        $card = match ($card) {
            "14" => "A",
            "13" => "K",
            "12" => "Q",
            "11" => "J",
            default => $card
        };
        $hand = Faces::tryFrom($card) ?? "";
        return $hand ? $hand->faceText() : "";
    }
}
