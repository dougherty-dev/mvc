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
        return array_map(fn ($card): int => $card->getValue(), $this->getHand());
    }

    /**
     * Return Unicode symbol values of cards in hand.
     *
     * @return string[]
     */
    public function handValues(): array
    {
        return array_map(fn ($card): string => $card->getStringValue(), $this->getHand());
    }

    /**
     * Return string representations of cards in hand.
     *
     * @return string[]
     */
    public function handTextValues(): array
    {
        return array_map(fn ($card): string => $card->getTextValue(), $this->getHand());
    }
}
