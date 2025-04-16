<?php

declare(strict_types=1);

namespace App\Game21;

use App\Game21;
use App\Cards\Deck;
use App\Cards\Hand;

class GameActions extends Game
{
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
    }

    public function continueGame(): void
    {
        foreach ($this->players as $player) {
            $player->hand = new Hand();
        }
        $this->__set('state', self::STATES['player_initiates']);
        foreach ($this->players as $player) {
            $player->__set('bet', 0);
            $player->__set('score', 0);
            if ($player->__get('balance') === 0) {
                $this->__set('state', self::STATES['game_over']);
            }
        }
    }

    public function restart(): void
    {
        $this->__set('state', self::STATES['player_initiates']);
        $this->players = [new Player(), new Player()];
        $this->deck = new Deck();
        $this->deck->resetDeck();
    }

    private function determineWinner(): void
    {
        if ($this->players[0]->__get('score') > $this->players[1]->__get('score')) {
            $this->players[0]->__set('balance', $this->players[0]->__get('balance') + 2 * $this->players[1]->__get('bet'));
            $this->__set('state', self::STATES['player_wins']);
        }

        if ($this->players[1]->__get('score') >= $this->players[0]->__get('score')) {
            $this->players[1]->__set('balance', $this->players[1]->__get('balance') + 2 * $this->players[1]->__get('bet'));
            $this->__set('state', self::STATES['bank_wins']);
        }
    }
}
