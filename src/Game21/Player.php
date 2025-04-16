<?php

declare(strict_types=1);

namespace App\Game21;

use App\Game21;
use App\Cards\Hand;

define('CARDSUIT', 13);
define('TWENTY_ONE', 21);
define('WILD_MIN', 1);
define('WILD_MAX', 14);
define('DECK_MAX', 51);
define('BALANCE_DEFAULT', 100);

class Player
{
    public Hand $hand;
    public HandScore $handScore;

    public function __construct(
        private int $score = 0,
        private int $balance = 0,
        private int $bet = 0
    ) {
        $this->hand = new Hand();
        $this->handScore = new HandScore();

        $this->__set('balance', BALANCE_DEFAULT);
        $this->__set('bet', 0);
    }

    public function __get(string $key): int
    {
        return $this->$key;
    }

    public function __isset(string $key): bool
    {
        return isset($this->$key);
    }

    public function __set(string $key, int $value)
    {
        $this->$key = $value;
    }
}
