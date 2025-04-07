<?php

namespace App\Cards;

class Deck
{
    protected const SUITE_CLUBS = '🃑🃒🃓🃔🃕🃖🃗🃘🃙🃚🃛🃝🃞';
    protected const SUITE_DIAMONDS = '🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎';
    protected const SUITE_HEARTS = '🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮';
    protected const SUITE_SPADES = '🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾';

    protected const DECK = self::SUITE_CLUBS . self::SUITE_DIAMONDS .
        self::SUITE_HEARTS . self::SUITE_SPADES;

    public $deck = null;

    public function __construct()
    {
        $this->resetDeck();
    }

    public function resetDeck(): void
    {
        foreach (mb_str_split(static::DECK) as $k => $_) {
            $this->deck[] = new \App\Cards\Card($k);
        }
    }

    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }

    public function drawCard(): int
    {
        return array_slice($this->deck, array_rand($this->deck), 1)[0];
    }

    public function deckValues(): array
    {
        $deckValues = [];
        foreach ($this->deck as $k => $card) {
            $deckValues[] = $card->card;
        }
        return $deckValues;
    }
}
