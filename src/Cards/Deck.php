<?php

namespace App\Cards;

use App\Cards;

class Deck
{
    public const DECK = Card::CLUBS . Card::DIAMONDS . Card::HEARTS . Card::SPADES;

    public $deck = [];

    public function __construct()
    {
    }

    public function resetDeck(): void
    {
        $this->deck = [];
        foreach (mb_str_split(static::DECK) as $k => $_) {
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
            $deckValues[] = $card->getValue();
        }
        return $deckValues;
    }

    public function cards(): int
    {
        return count($this->deck);
    }
}
