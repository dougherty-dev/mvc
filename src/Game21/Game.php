<?php

declare(strict_types=1);

namespace App\Game21;

use App\Game21;
use App\Cards\Deck;

class Game
{
    public const STATES = [
        'player_initiates' => '⇦ Spelare inleder',
        'player_bets' => '⇦ Spelare satsar',
        'player_draws' => '⇦ Spelare drar',
        'player_busted' => 'Spelare tjock',
        'bank_busted' => 'Bank tjock',
        'player_wins' => 'Spelare vinner',
        'bank_wins' => 'Bank vinner',
        'game_over' => 'Spel slut'
    ];

    public Deck $deck;
    /** @var Player[] */
    public array $players = [];
    /** @var string[] */
    private array $cardStats = ['0 %', '0 %'];

    public function __construct(private string $state = self::STATES['player_initiates'])
    {
        $this->restart();
    }

    public function __get(string $key): mixed
    {
        return $this->$key;
    }

    public function __isset(string $key): bool
    {
        return isset($this->$key);
    }

    public function __set(string $key, mixed $value)
    {
        $this->$key = $value;
    }

    public function restart(): void
    {
        $this->__set('state', self::STATES['player_initiates']);
        $this->players = [new Player(), new Player()];
        $this->deck = new Deck();
        $this->deck->resetDeck();
        $this->deck->shuffleDeck();
        $this->cardStats = ['0 %', '0 %'];
    }
}
