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
    public ScoreCalc $scoreCalc;
    private int $score = 0;
    private float $balance = 0;
    private float $bet = 0;

    public function __construct()
    {
        $this->hand = new Hand();
        $this->scoreCalc = new ScoreCalc();
        $this->setBalance();
        $this->setBet();
        $this->setScore();
    }

    public function setScore(): void
    {
        $this->score = $this->scoreCalc->calculateScore($this->hand);
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $balance = BALANCE_DEFAULT): void
    {
        $this->balance = $balance;
    }

    public function getBet(): float
    {
        return $this->bet;
    }

    public function setBet(float $bet = 0): void
    {
        $this->bet = $bet;
    }
}
