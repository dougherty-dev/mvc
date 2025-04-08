<?php

namespace App\Cards;

class Card
{
    public const CLUBS = '🃑🃒🃓🃔🃕🃖🃗🃙🃘🃚🃛🃝🃞';
    public const DIAMONDS = '🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎';
    public const HEARTS = '🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮';
    public const SPADES = '🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾';
    public const DECK = self::CLUBS . self::DIAMONDS . self::HEARTS . self::SPADES;

    public $value = null;
    public array $utf = [];

    public function __construct(int $value)
    {
        $this->value = $value;
        $this->utf = mb_str_split(static::DECK);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
