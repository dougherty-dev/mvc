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
class CardDeck
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
     * New full deck, in order.
     */
    public function resetDeck(): void
    {
        $this->emptyDeck();
        foreach (array_keys(CardGraphic::DECK_ARRAY) as $k) {
            $this->deck[] = new CardGraphic($k);
        }
    }

    /**
     * Add cards to deck by serial value 0–53.
     *
     * @param int[] $values
     */
    public function addToDeck(array $values): void
    {
        $this->emptyDeck();
        foreach ($values as $k) {
            $this->deck[] = new CardGraphic($k);
        }
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

    /**
     * Shuffle the deck.
     */
    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }

    /**
     * Return serial card values 0–53 of cards in deck.
     *
     * @return int[]
     */
    public function intValues(): array
    {
        $deckValues = [];
        foreach ($this->deck as $card) {
            $deckValues[] = $card->getValue();
        }
        return $deckValues;
    }

    /**
     * Return Unicode symbol values of cards in deck.
     *
     * @return string[]
     */
    public function deckValues(): array
    {
        $deckValues = [];
        foreach ($this->deck as $card) {
            $deckValues[] = $card->getStringValue();
        }
        return $deckValues;
    }

    /**
     * Return string representations of cards in deck.
     *
     * @return string[]
     */
    public function deckTextValues(): array
    {
        $deckTextValues = [];
        foreach ($this->deck as $card) {
            $deckTextValues[] = $card->getTextValue();
        }
        return $deckTextValues;
    }
}
