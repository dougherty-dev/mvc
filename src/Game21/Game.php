<?php

declare(strict_types=1);

namespace App\Game21;

use App\Game21;
use App\Cards\Deck;

// use App\Cards\Hand;

class Game
{
    public Deck $deck;
    public Player $player;

    public function __construct()
    {
        $this->player = new Player();
        $this->deck = new Deck();
        $this->deck->resetDeck();
        $this->deck->shuffleDeck();
    }
}
