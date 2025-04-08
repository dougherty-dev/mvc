<?php

namespace App\Cards;

use App\Cards;

class Hand
{
    public array $hand = [];
    public CardGraphic $card;

    public function __construct()
    {
        $this->card = new CardGraphic(0);
    }

    public function handValues(array $hand): array
    {
        $handValues = [];
        foreach ($hand as $k => $card) {
            $handValues[] = $card->value;
        }
        return $handValues;
    }

    public function handValuesUTF(array $hand): array
    {
        $handValuesUTF = [];
        foreach ($hand as $k => $card) {
            $handValuesUTF[] = $this->card->utf[$card->value];
        }
        return $handValuesUTF;
    }
}
