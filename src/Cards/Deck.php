<?php

namespace nido24\Deck;

class Deck
{
    protected const UTF_SUITE_CLUBS = '🃑🃒🃓🃔🃕🃖🃗🃘🃙🃚🃛🃝🃞';
    protected const UTF_SUITE_DIAMONDS = '🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎';
    protected const UTF_SUITE_HEARTS = '🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮';
    protected const UTF_SUITE_SPADES = '🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾';
    protected const UTF_JOKERS = '🃟🃟';

    protected const UTF_DECK = UTF_SUITE_CLUBS . UTF_SUITE_DIAMONDS .
        UTF_SUITE_HEARTS . UTF_SUITE_SPADES . UTF_JOKERS;

    protected $deck = null;

    public function __construct()
    {
        $this->shuffleDeck();
    }

    public function resetDeck()
    {
        $this->deck = range(0, mb_strlen(UTF_DECK));
    }

    public function shuffleDeck()
    {
        $this->resetDeck();
        shuffle($this->deck);
    }
}
