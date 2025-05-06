<?php

/**
 * Hand class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

/**
 * Define methods for the Hand class.
 */
class Hand
{
    /**
     * @var array<int, CardGraphic> $hand
     */
    private array $hand = [];

    /**
     * @return array<int, CardGraphic>
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * Add a card to hand.
     */
    public function addCard(CardGraphic $card): void
    {
        $this->hand[] = $card;
    }

    /**
     * Return serial card values 0–53 of cards in hand.
     *
     * @return int[]
     */
    public function intValues(): array
    {
        $handValues = [];
        foreach ($this->getHand() as $card) {
            $handValues[] = $card->getValue();
        }
        return $handValues;
    }

    /**
     * Return Unicode symbol values of cards in hand.
     *
     * @return string[]
     */
    public function handValues(): array
    {
        $handValues = [];
        foreach ($this->getHand() as $card) {
            $handValues[] = $card->getStringValue();
        }
        return $handValues;
    }

    /**
     * Return string representations of cards in hand.
     *
     * @return string[]
     */
    public function handTextValues(): array
    {
        $handTextValues = [];
        foreach ($this->getHand() as $card) {
            $handTextValues[] = $card->getTextValue();
        }
        return $handTextValues;
    }
}
