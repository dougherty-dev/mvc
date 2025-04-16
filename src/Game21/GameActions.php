<?php

declare(strict_types=1);

namespace App\Game21;

use App\Game21;
use App\Cards\Deck;
use App\Cards\Hand;

define('CARDSUIT', 13);
define('TWENTY_ONE', 21);
define('WILD_MIN', 1);
define('WILD_MAX', 14);
define('BANK_MAX', 17);
define('DECK_MAX', 51);
define('BALANCE_DEFAULT', 100);

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

        $this->cardStats($this->players[$id]->__get('score'));

        if ($id === 0) {
            if (count($this->players[$id]->hand->handValues()) === 1) {
                $this->__set('state', self::STATES['player_bets']);
            }

            if ($this->players[$id]->__get('score') > TWENTY_ONE) {
                $this->playerBusted($id);
            }
        }

        if ($id === 1) { // automate bank moves
            if ($this->players[$id]->__get('score') < BANK_MAX) {
                $this->playerDraws($id);
                return;
            }

            if ($this->players[$id]->__get('score') > TWENTY_ONE) {
                $this->playerBusted($id);
                return;
            }

            $this->determineWinner();
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

    public function cardStats(int $handValue): void
    {
        $values = array_fill(1, 14, 0);
        $deckValues = $this->deck->intValues();

        foreach ($deckValues as $card) {
            $face = $card % 13 + 1;
            match (true) {
                $card > 51 => $values = array_map(fn (int $val): int => $val + 1, $values),
                $face === 1 => [$values[1]++, $values[14]++],
                default => $values[$face]++
            };
        }

        $upTo21 = 0;
        $over21 = 0;
        foreach (array_keys($values) as $key) {
            if ($handValue + $key <= TWENTY_ONE) {
                $upTo21++;
            }
            if ($handValue + $key > TWENTY_ONE) {
                $over21++;
            }
        }

        $cards = count($values);
        $this->__set('cardStats', [
            number_format(100 * $upTo21 / $cards, 0) . ' %',
            number_format(100 * $over21 / $cards, 0) . ' %',
        ]);
    }
}
