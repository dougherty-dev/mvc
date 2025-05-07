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
class DeckFoundation
{
    /**
     * @var array<int, CardGraphic> $deck
     */
    protected array $deck = [];

    /**
     * Zero the deck.
     */
    public function emptyDeck(): void
    {
        $this->deck = [];
    }

    /**
     * Access the deck.
     *
     * @return array<int, CardGraphic>
     */
    public function getDeck(): array
    {
        return $this->deck;
    }
}
