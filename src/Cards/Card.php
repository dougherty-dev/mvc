<?php

declare(strict_types=1);

namespace App\Cards;

use RangeException;

class Card
{
    private const MIN = 0;
    private const MAX = 53;

    public function __construct(private int $value)
    {
        if ($this->value < self::MIN || $this->value > self::MAX) {
            throw new RangeException('Kortvalör utanför tillåten vidd');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
