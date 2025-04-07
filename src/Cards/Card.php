<?php

namespace App\Cards;

class Card
{
    public $card = null;

    public function __construct($value)
    {
        $this->card = $value;
    }

    public function getValue(): int
    {
        return $this->card;
    }
}
