<?php

namespace App\Cards;

use App\Cards;

class Deck
{
    public const DECK = Card::CLUBS . Card::DIAMONDS . Card::HEARTS . Card::SPADES;

    public array $deck = [];
    public array $utf = [];

    public function __construct()
    {
        $this->utf = mb_str_split(static::DECK);
    }

    public function resetDeck(): void
    {
        $this->deck = [];
        foreach ($this->utf as $k => $_) {
            $this->deck[] = new Card($k);
        }
    }

    public function shuffleDeck(): void
    {
        $this->resetDeck();
        shuffle($this->deck);
    }

    public function drawCard(): int
    {
        return array_splice($this->deck, array_rand($this->deck), 1)[0]->getValue();
    }

    public function deckValues(): array
    {
        $deckValues = [];
        foreach ($this->deck as $k => $card) {
            $deckValues[] = $this->utf[$card->getValue()];
        }
        return $deckValues;
    }

    public function handValues(array $hand): array
    {
        $handValues = [];
        foreach ($hand as $k => $card) {
            $handValues[] = $this->utf[$card];
        }
        return $handValues;
    }

    public function cards(): int
    {
        return count($this->deck);
    }
}
