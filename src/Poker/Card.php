<?php

/**
 * Poker CardFoundation class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Poker;

/**
 * Card class just holds a serial value.
*/
class Card
{
    protected const MIN = 0;
    protected const MAX = 51;

    public function __construct(private int $value)
    {
    }

    /**
     * Define a getter for the private value.
    */
    public function getCard(): int
    {
        return $this->value;
    }

    /**
     * Define a getter for the private value.
    */
    public function getValue(): int
    {
        return $this->value;
    }
}
