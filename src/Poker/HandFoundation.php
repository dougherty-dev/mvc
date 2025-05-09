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
    public function get(): array
    {
        return $this->hand;
    }

    /**
     * Add a card to hand.
     */
    public function addCard(Card $card): void
    {
        $this->hand[] = $card;
    }
}
