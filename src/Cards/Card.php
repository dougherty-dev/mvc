<?php

namespace App\Cards;

class Card
{
    public const CLUBS = '🃑🃒🃓🃔🃕🃖🃗🃙🃘🃚🃛🃝🃞';
    public const DIAMONDS = '🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎';
    public const HEARTS = '🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮';
    public const SPADES = '🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾';
    public const JOKERS = '🃟🃟';

    protected $card = null;

    public function __construct($value)
    {
        $this->card = $value;
    }

    public function getValue(): int
    {
        return $this->card;
    }
}
