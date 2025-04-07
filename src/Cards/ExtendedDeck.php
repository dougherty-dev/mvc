<?php

namespace App\Cards;

class ExtendedDeck extends Deck
{
    public const DECK = Card::CLUBS . Card::DIAMONDS . Card::HEARTS . Card::SPADES . Card::JOKERS;

    public function __construct()
    {
        parent::__construct();
    }
}
