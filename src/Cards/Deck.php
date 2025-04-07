<?php

namespace App\Cards;

class Deck
{
    protected const UTF_SUITE_CLUBS = '🃑🃒🃓🃔🃕🃖🃗🃘🃙🃚🃛🃝🃞';
    protected const UTF_SUITE_DIAMONDS = '🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎';
    protected const UTF_SUITE_HEARTS = '🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮';
    protected const UTF_SUITE_SPADES = '🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾';

    protected const UTF_DECK = self::UTF_SUITE_CLUBS . self::UTF_SUITE_DIAMONDS .
        self::UTF_SUITE_HEARTS . self::UTF_SUITE_SPADES;

    public $deck = null;

    public function __construct()
    {
        $this->resetDeck();
    }

    public function resetDeck(): void
    {
        $this->deck = range(0, mb_strlen(self::UTF_DECK) - 1);
    }

    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }

    public function drawCard(): int
    {
        return array_slice($this->deck, array_rand($this->deck), 1)[0];
    }
}
