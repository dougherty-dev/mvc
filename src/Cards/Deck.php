<?php

/**
 * Deck class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

/**
 * Define the Deck class.
 */
class Deck extends DeckMethods
{
    /**
     * Draw $number cards from deck, while removing from deck.
     */
    public function drawCards(int $number = 1): Hand
    {
        $hand = new Hand();
        $remaining = $this->remainingCards();
        $deck = array_splice($this->deck, 0, min($number, $remaining));
        array_map(fn ($card): null => $hand->addCard($card), $deck);
        return $hand;
    }

    /**
     * Draw single card
     */
    public function drawCard(): CardGraphic
    {
        $hand = $this->drawCards();
        return $hand->getHand()[0];
    }

    /**
     * Count cards in deck.
     */
    public function remainingCards(): int
    {
        return count($this->deck);
    }
}
