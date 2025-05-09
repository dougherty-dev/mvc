<?php

/**
 * Player class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Hand;

/**
 * Methods for the Player class.
 */
class Player
{
    public function __construct(
        public Hand $hand = new Hand(),
        public HandScore $handScore = new HandScore(),
        private int $score = 0,
        private int $balance = 0,
        private int $bet = 0
    ) {
        $this->__set('balance', BALANCE_DEFAULT);
        $this->__set('bet', 0);
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
