<?php

declare(strict_types=1);

namespace App\Game21;

use App\Game21;
use App\Cards\CardGraphic;
use App\Cards\Deck;
use App\Cards\Hand;

class Game
{
    public const STATES = [
        'player_initiates' => 'Spelare initierar',
        'player_bets' => 'Spelare satsar',
        'player_draws' => 'Spelare drar',
        'player_busted' => 'Spelare tjock',
        'bank_draws' => 'Bank drar',
        'bank_busted' => 'Bank tjock',
        'player_wins' => 'Spelare vinner',
        'bank_wins' => 'Bank vinner',
        'game_over' => 'Slut',
    ];

    public Deck $deck;
    /** @var Player[] */
    public array $players = [];

    public function __construct(private string $state = self::STATES['player_initiates'])
    {
        $this->players = [new Player(), new Player()];
        $this->deck = new Deck();
        $this->deck->resetDeck();
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

    public function reassembleDeck(): void
    {
        $deck = new Deck();
        $deck->resetDeck();

        $cards = [];
        foreach ($this->players as $player) {
            $cards = array_merge($cards, $player->hand->intValues());
        }
        $cards = array_diff($deck->intValues(), $cards);

        $this->deck = new Deck();
        $this->deck->addToDeck($cards);
        $this->deck->shuffleDeck();
    }

    public function playerDraws(int $id): void
    {
        $this->deck->remainingCards() or $this->reassembleDeck();

        $this->players[$id]->hand->addCard($this->deck->drawCard());
        $this->players[$id]->__set('score', $this->players[$id]->handScore->calculate($this->players[$id]->hand));

        if ($id === 0 && count($this->players[$id]->hand->handValues()) === 1) {
            $this->__set('state', self::STATES['player_bets']);
        }

        if ($this->players[$id]->__get('score') > TWENTY_ONE) {
            $this->playerBusted($id);
        }
    }

    public function playerBets(int $bet): void
    {
        foreach ($this->players as $player) {
            $player->__set('bet', $bet);
            $player->__set('balance', $player->__get('balance') - $bet);
        }
        $this->__set('state', self::STATES['player_draws']);
    }

    public function playerStays(int $id): void
    {
        match ($id) {
            1 => $this->determineWinner(),
            default => $this->__set('state', self::STATES['bank_draws'])
        };
    }

    public function playerBusted(int $id): void
    {
        $nextID = ($id + 1) % 2;
        $this->players[$nextID]->__set('balance', $this->players[$nextID]->__get('balance') + 2 * $this->players[$nextID]->__get('bet'));

        match ($id) {
            0 => $this->__set('state', self::STATES['player_busted']),
            default => $this->__set('state', self::STATES['bank_busted'])
        };

        $this->resetBets();
    }

    public function continue(): void
    {
        foreach ($this->players as $player) {
            $player->hand = new Hand();
        }
        $this->__set('state', self::STATES['player_initiates']);
        $this->resetBets();
    }

    private function determineWinner(): void
    {
        if ($this->players[0]->__get('score') >= $this->players[1]->__get('score')) {
            $this->players[0]->__set('balance', $this->players[0]->__get('balance') + 2 * $this->players[1]->__get('bet'));
            $this->__set('state', self::STATES['player_wins']);
        }

        if ($this->players[0]->__get('score') < $this->players[1]->__get('score')) {
            $this->players[1]->__set('balance', $this->players[1]->__get('balance') + 2 * $this->players[1]->__get('bet'));
            $this->__set('state', self::STATES['bank_wins']);
        }

        $this->resetBets();
    }

    private function resetBets(): void
    {
        foreach ($this->players as $player) {
            $player->__set('bet', 0);
        }
    }
}
