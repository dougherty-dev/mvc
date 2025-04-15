<?php

declare(strict_types=1);

namespace App\Cards;

use App\Cards;

class Hand
{
    /** @var array<int, CardGraphic> $hand */
    private array $hand = [];

    /** @return array<int, CardGraphic> */
    public function getHand(): array
    {
        return $this->hand;
    }

    public function addCard(CardGraphic $card): void
    {
        $this->hand[] = $card;
    }

    /** @return string[] */
    public function handValues(): array
    {
        $handValues = [];
        foreach ($this->getHand() as $card) {
            $handValues[] = $card->getStringValue();
        }
        return $handValues;
    }

    /** @return string[] */
    public function handTextValues(): array
    {
        $handTextValues = [];
        foreach ($this->getHand() as $card) {
            $handTextValues[] = $card->getTextValue();
        }
        return $handTextValues;
    }
}
