<?php

declare(strict_types=1);

namespace App\Cards;

use App\Cards;

class Hand
{
    /** @var array<int, CardGraphic|null> $hand */
    public array $hand = [];

    public function addCard(?CardGraphic $card): void
    {
        $this->hand[] = $card;
    }

    /** @return string[] */
    public function handValues(): array
    {
        $handValues = [];
        foreach ($this->hand as $card) {
            if ($card) {
                $handValues[] = $card->getStringValue();
            }
        }
        return $handValues;
    }

    /** @return string[] */
    public function handTextValues(): array
    {
        $handTextValues = [];
        foreach ($this->hand as $card) {
            if ($card) {
                $handTextValues[] = $card->getTextValue();
            }
        }
        return $handTextValues;
    }
}
