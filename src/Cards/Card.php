<?php

declare(strict_types=1);

namespace App\Cards;

class Card
{
    public function __construct(private int $value)
    {
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
