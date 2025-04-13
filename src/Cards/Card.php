<?php

declare(strict_types=1);

namespace App\Cards;

class Card
{
    public function __construct(public ?int $value = null)
    {
    }

    public function getValue(): ?int
    {
        return $this->value;
    }
}
