<?php

/**
 * Community class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Hand;
use App\Poker\Deck;

/**
 * Properties and methods for the Community class.
 */
class Community
{
    public function __construct(
        public int $status = 0,
        public Deck $deck = new Deck(),
        public Deck $discarded = new Deck(),
        public Hand $hand = new Hand(),
        private int $pot = 0,
        private int $raises = 0,
    ) {
    }

    /**
     * Magic get, for Twig.
     */
    public function __get(string $key): int
    {
        return $this->$key;
    }

    /**
     * Magic isset.
     */
    public function __isset(string $key): bool
    {
        return isset($this->$key);
    }

    /**
     * Magic set, for Twig.
     */
    public function __set(string $key, int $value)
    {
        $this->$key = $value;
    }
}
