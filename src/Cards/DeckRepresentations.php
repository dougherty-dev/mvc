<?php

/**
 * Deck class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

/**
 * Define representations for a deck of cards of class CardGraphic.
 */
class DeckRepresentations extends DeckFoundation
{
    /**
     * Return serial card values 0–53 of cards in deck.
     *
     * @return int[]
     */
    public function intValues(): array
    {
        return array_map(fn ($card): int => $card->getValue(), $this->deck);
    }

    /**
     * Return Unicode symbol values of cards in deck.
     *
     * @return string[]
     */
    public function deckValues(): array
    {
        return array_map(fn ($card): string => $card->getStringValue(), $this->deck);
    }

    /**
     * Return string representations of cards in deck.
     *
     * @return string[]
     */
    public function deckTextValues(): array
    {
        return array_map(fn ($card): string => $card->getTextValue(), $this->deck);
    }
}
