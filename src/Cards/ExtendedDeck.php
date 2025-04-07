<?php

namespace App\Cards\ExtendedDeck;

class ExtendedDeck extends Deck
{
    protected const UTF_JOKERS = '🃟🃟';
    protected const UTF_DECK = UTF_SUITE_CLUBS . UTF_SUITE_DIAMONDS .
        UTF_SUITE_HEARTS . UTF_SUITE_SPADES . UTF_JOKERS;

    public function __construct()
    {
        parent::__construct();
    }
}
