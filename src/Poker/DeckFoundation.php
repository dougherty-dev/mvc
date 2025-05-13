<?php

/**
 * Deck class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker;

use App\Poker\Card;

/**
 * Define methods for a deck of cards of class Card.
 */
class DeckFoundation
{
    /**
     * @var array<int, Card> $deck
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
     * @return array<int, Card>
     */
    public function getDeck(): array
    {
        return $this->deck;
    }
}
