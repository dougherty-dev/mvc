<?php

/**
 * Face methods.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Suits;
use App\Poker\Faces;

/**
 * Methods for Faces enumeration.
 * @SuppressWarnings("StaticAccess")
 */
readonly class FaceMethods
{
    /**
     * Return face values of cards in deck: 2, 4, 14
     *
     * @return int[]
     */
    public static function deckFaceValues(): array
    {
        return array_merge(
            ...array_map(
                fn (): array =>
                array_map(fn ($face): int => $face->faceValue(), Faces::cases()),
                Suits::cases()
            )
        );
    }

    /**
     * Return Unicode symbol values of cards in deck: 🃑, 🃕, 🂤
     *
     * @return string[]
     */
    public static function deckUnicodeValues(): array
    {
        return Faces::UNICODE_FACE_ARRAY;
    }

    /**
     * Return symbol values: ♣️2, ♥️A
     *
     * @return string[]
     */
    public static function deckSymbolValues(): array
    {
        return array_merge(
            ...array_map(
                fn ($case): array =>
                array_map(fn ($face): string => $case->suitSymbol() . $face->value, Faces::cases()),
                Suits::cases()
            )
        );
    }

    /**
     * Return text values: klöver 2, hjärter ess
     * @SuppressWarnings("StaticAccess")
     *
     * @return string[]
     */
    public static function deckTextValues(): array
    {
        return array_merge(
            ...array_map(
                fn ($case): array =>
                array_map(fn ($face): string => $case->suitText() . $face->faceText(), Faces::cases()),
                Suits::cases()
            )
        );
    }
}
