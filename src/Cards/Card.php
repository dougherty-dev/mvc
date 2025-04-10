<?php

namespace App\Cards;

class Card
{
    private const CLUBS = '🃑🃒🃓🃔🃕🃖🃗🃘🃙🃚🃛🃝🃞';
    private const DIAMONDS = '🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎';
    private const HEARTS = '🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮';
    private const SPADES = '🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾';
    protected const DECK = self::CLUBS . self::DIAMONDS . self::HEARTS . self::SPADES;

    public $value = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getCards(): string
    {
        return static::DECK;
    }

    public function getCardsArray(): array
    {
        return mb_str_split(static::DECK);
    }
}
