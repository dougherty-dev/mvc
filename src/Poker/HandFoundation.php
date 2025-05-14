<?php

/**
 * Hand class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker;

/**
 * Define methods for the Hand class.
 */
class HandFoundation
{
    /**
     * @var array<int, Card> $hand
     */
    private array $hand = [];

    /**
     * @return array<int, Card>
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * Zero the hand.
     */
    public function emptyHand(): void
    {
        $this->hand = [];
    }

    /**
     * Add cards to hand by serial value 0–51.
     *
     * @param int[] $values
     */
    public function addToHand(array $values): void
    {
        $this->hand = array_map(fn ($key): Card => new Card($key), $values);
    }

    /**
     * Add a card to hand.
     */
    public function addCard(Card $card): void
    {
        $this->hand[] = $card;
    }

    /**
     * Draw and remove card from hand.
     */
    public function drawCard(): Card
    {
        $card = array_splice($this->hand, 0, min(1, $this->remainingCards()));
        return new Card($card[0]->getValue());
    }

    /**
     * Count cards in deck.
     */
    public function remainingCards(): int
    {
        return count($this->hand);
    }
}
