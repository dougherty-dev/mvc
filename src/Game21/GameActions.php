<?php

declare(strict_types=1);

namespace App\Game21;

use App\Cards\Deck;
use App\Cards\Hand;

class GameActions extends Game
{
    private function reassembleDeck(): void
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
        $this->players[$id]->__set('score', $this->players[$id]->handScore->bestScore($this->players[$id]->hand));

        $this->cardStats($id);

        if ($id === 0) {
            if (count($this->players[$id]->hand->handValues()) === 1) {
                $this->__set('state', self::STATES['player_bets']);
            }

            if ($this->players[$id]->__get('score') > TWENTY_ONE) {
                $this->playerBusted($id);
            }
        }

        if ($id === 1) {
            $this->bankMoves($id);
        }

        $this->deck->remainingCards() or $this->reassembleDeck();
        $this->cardStats($id);
    }

    private function bankMoves(int $id): void
    {
        if ($this->players[$id]->__get('score') > TWENTY_ONE) {
            $this->playerBusted($id);
            return;
        }

        if ($this->__get('bankIntelligence') != '') {
            $percentage = 70;
            if (is_array($this->__get('cardStats'))) {
                $percentage = $this->__get('cardStats')[1];
            }

            if (count($this->players[$id]->hand->handValues()) === 1 || $percentage < 60) {
                $this->playerDraws($id);
                return;
            }
        }

        if ($this->__get('bankIntelligence') == '') {
            if ($this->players[$id]->__get('score') < BANK_MAX) {
                $this->playerDraws($id);
                return;
            }
        }

        $this->determineWinner();
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
        $this->__set('cardStats', [0, 0]);

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

    private function cardStats(int $id): void
    {
        $handValue = $this->players[$id]->handScore->lowestScore($this->players[$id]->hand);
        $values = array_fill(1, WILD_MAX, 0);
        $deckValues = $this->deck->intValues();
        $cards = max(1, count($deckValues));

        foreach ($deckValues as $card) {
            $face = $card % CARDSUIT + 1;
            match (true) {
                $card > DECK_MAX => $values[1]++, // keep jokers = 1
                default => $values[$face]++ // keep aces = 1
            };
        }

        $upTo21 = 0;
        $over21 = 0;
        foreach ($values as $key => $val) {
            if ($val && $handValue + $key <= TWENTY_ONE) {
                $upTo21 += $val;
            }
            if ($val && $handValue + $key > TWENTY_ONE) {
                $over21 += $val;
            }
        }

        $this->__set('cardStats', [
            round(100 * $upTo21 / $cards, 0),
            round(100 * $over21 / $cards, 0)
        ]);
    }
}
