<?php

/**
 * Deck class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker;

/**
 * Define methods for a deck of cards of class Card.
 */
class DeckMethods extends DeckFoundation
{
    /**
     * New full deck, in order.
     */
    public function resetDeck(): void
    {
        $this->empty();
        $this->deck = array_map(fn ($key): Card =>
            new Card($key), array_keys(FaceMethods::UNICODE_FACE_ARRAY));
    }

    /**
     * Add cards to deck by serial value 0–51.
     *
     * @param int[] $values
     */
    public function addToDeck(array $values): void
    {
        $this->empty();
        $this->deck = array_map(fn ($key): Card => new Card($key), $values);
    }

    /**
     * Shuffle the deck.
     */
    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }
}
