<?php

namespace App\Cards;

use App\Cards;

class Deck
{
    public array $deck = [];
    public Hand $hand;

    public function __construct()
    {
        $this->hand = new Hand();
    }

    public function resetDeck(): void
    {
        $this->deck = [];
        foreach ($this->hand->card->getCardsArray() as $k => $_) {
            $this->deck[] = new CardGraphic($k);
        }
    }

    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }

    public function drawCard(): CardGraphic
    {
        return array_splice($this->deck, array_rand($this->deck), 1)[0];
    }

    public function deckValues(): array
    {
        return $this->hand->handValuesUTF($this->deck);
    }

    public function deckTextValues(): array
    {
        $deckTextValues = [];
        foreach ($this->deck as $k => $card) {
            $deckTextValues[] = $this->hand->card->getTextValue($card->value);
        }
        return $deckTextValues;
    }

    public function cards(): int
    {
        return count($this->deck);
    }
}
