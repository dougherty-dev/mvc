<?php

/**
 * Deck class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

/**
 * Define methods for a deck of cards of class CardGraphic.
 */
class DeckMethods extends DeckRepresentations
{
    /**
     * New full deck, in order.
     */
    public function resetDeck(): void
    {
        $this->emptyDeck();
        $this->deck = array_map(fn ($key): CardGraphic =>
            new CardGraphic($key), array_keys(CardGraphic::DECK_ARRAY));
    }

    /**
     * Add cards to deck by serial value 0–53.
     *
     * @param int[] $values
     */
    public function addToDeck(array $values): void
    {
        $this->emptyDeck();
        $this->deck = array_map(fn ($key): CardGraphic => new CardGraphic($key), $values);
    }

    /**
     * Shuffle the deck.
     */
    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }
}
