<?php

namespace App\Cards;

class ExtendedDeck extends Deck
{
    protected const JOKERS = '🃟🃟';
    public const DECK = parent::SUITE_CLUBS . parent::SUITE_DIAMONDS .
        parent::SUITE_HEARTS . parent::SUITE_SPADES . self::JOKERS;

    public function __construct()
    {
        parent::__construct();
    }

}
