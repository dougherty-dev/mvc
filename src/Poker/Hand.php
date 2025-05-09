<?php

/**
 * Hand class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker;

use App\Poker\Faces;
use App\Poker\FaceMethods;

/**
 * Define methods for the Hand class.
 * @SuppressWarnings("StaticAccess")
 */
class Hand extends HandFoundation
{
    /**
     * Return serial card values 0–51 of cards in hand.
     *
     * @return int[]
     */
    public function handIntValues(): array
    {
        return array_map(fn ($card): int => $card->get(), $this->getHand());
    }

    /**
     * Return face values of cards in deck: 2, 4, 14
     *
     * @return int[]
     */
    public function handFaceValues(): array
    {
        return array_map(fn ($card): int => FaceMethods::deckFaceValues()[$card->get()], $this->getHand());
    }

    /**
     * Return Unicode symbol values of cards in deck: 🃑, 🃕, 🂤
     *
     * @return string[]
     */
    public function handUnicodeValues(): array
    {
        return array_map(fn ($card): string => FaceMethods::UNICODE_FACE_ARRAY[$card->get()], $this->getHand());
    }

    /**
     * Return symbol values: ♣️2, ♥️A
     *
     * @return string[]
     */
    public function handSymbolValues(): array
    {
        return array_map(fn ($card): string => FaceMethods::deckSymbolValues()[$card->get()], $this->getHand());
    }

    /**
     * Return text values: klöver 2, hjärter ess
     *
     * @return string[]
     */
    public function handTextValues(): array
    {
        return array_map(fn ($card): string => FaceMethods::deckTextValues()[$card->get()], $this->getHand());
    }
}
