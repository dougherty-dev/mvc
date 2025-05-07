<?php

/**
 * Basic card class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

use RangeException;

/**
 * Instantiate class within tolerable card values.
*/
class Card
{
    private const MIN = 0;
    private const MAX = 53;

    public function __construct(private int $value)
    {
        if ($this->value < self::MIN || $this->value > self::MAX) {
            throw new RangeException('Kortvalör utanför tillåten vidd.');
        }
    }

    /**
     * Define a getter for the private value.
    */
    public function getValue(): int
    {
        return $this->value;
    }
}
