<?php

/**
 * Player class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Hand;

/**
 * Properties and methods for the Player class.
 */
class Player
{
    private bool $dealer;
    private bool $smallBlind;
    private bool $bigBlind;
    public Hand $hand;

    public function __construct(
        private int $handle = 0,
        private int $cash = 0,
        private int $bet = 0,
        private int $latestAction = 0,
    ) {
        $this->hand = new Hand();
        $this->dealer = false;
        $this->smallBlind = false;
        $this->bigBlind = false;
    }

    /**
     * Magic get, for Twig.
     */
    public function __get(string $key): mixed
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
    public function __set(string $key, mixed $value)
    {
        $this->$key = $value;
    }
}
