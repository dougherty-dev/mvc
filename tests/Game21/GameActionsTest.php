<?php

/**
 * Game actions test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Game21;

use PHPUnit\Framework\TestCase;
use RangeException;
use App\Cards\Deck;
use App\Cards\CardGraphic;
use App\Cards\Hand;
use App\Game21\GameActions;
use App\Game21\GameActionsStats;
use App\Game21\GameActionsWinner;
use App\Game21\GameActionsBet;
use App\Game21\GameActionsDeck;
use App\Game21\GameActionsContinue;

/** Test cases for class Card. */
class GameActionsTest extends TestCase
{
    /** Construct object and check player draw methods. */
    public function testPlayerDraws(): void
    {
        $gameActions = new GameActions();
        $this->assertInstanceOf("\App\Game21\GameActions", $gameActions);

        /** Player draws 10 cards from deck. */
        for ($i = 0; $i < 10; $i++) {
            $gameActions->playerDraws(0);
        }

        $this->assertCount(44, $gameActions->deck->getDeck());

        $this->assertInstanceOf("\App\Game21\GameActionsStats", new GameActionsStats());
        $this->assertInstanceOf("\App\Game21\GameActionsWinner", new GameActionsWinner());
        $this->assertInstanceOf("\App\Game21\GameActionsBet", new GameActionsBet());
        $this->assertInstanceOf("\App\Game21\GameActionsDeck", new GameActionsDeck());
        $this->assertInstanceOf("\App\Game21\GameActionsContinue", new GameActionsContinue());
    }

    /** Test deck reassembly. */
    public function testDeckReassembly(): void
    {
        $gameActions = new GameActions();
        $gameActions->gaContinue = new GameActionsContinue();

        for ($i = 0; $i < 52; $i++) {
            $gameActions->playerDraws(0);
        }
        $gameActions->gaContinue->continueGame($gameActions);

        /** Deck contains 2 cards. Player draws 2 cards. Reassembled deck should have 52 cards. */
        $this->assertCount(2, $gameActions->deck->getDeck());
        $gameActions->playerDraws(0);
        $gameActions->playerDraws(0);
        $this->assertCount(52, $gameActions->deck->getDeck());
    }

    /** Test correct bet. */
    public function testCorrectBet(): void
    {
        $gameActions = new GameActions();
        $gameActions->gaContinue = new GameActionsContinue();
        $gameActions->gaBet = new GameActionsBet();
        $gameActions->gaBet->playerBets(50, $gameActions);
        $this->assertEquals(
            $gameActions->players[0]->__get('balance'),
            $gameActions->players[1]->__get('balance')
        );
        $this->assertEquals($gameActions->players[0]->__get('balance'), 50);
        $this->assertEquals(
            $gameActions->players[0]->__get('bet'),
            $gameActions->players[1]->__get('bet')
        );
        $this->assertEquals($gameActions->players[0]->__get('bet'), 50);
    }

    /** Test winning states with intelligence. */
    public function testWinningHandWithIntelligence(): void
    {
        /** With intelligence. */
        $gameActions = new GameActions(bankIntelligence: ' checked');
        $gameActions->gaContinue = new GameActionsContinue();
        $player = $gameActions->players[0];
        $banker = $gameActions->players[1];

        /** Player 21, bank 22. */
        $player->hand->addCard(new CardGraphic(0));
        $player->hand->addCard(new CardGraphic(7));
        $player->__set('score', 21);
        $banker->hand->addCard(new CardGraphic(12));
        $banker->hand->addCard(new CardGraphic(8));
        $gameActions->playerDraws(1);
        $this->assertEquals($gameActions::STATES['bank_busted'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);
        $this->assertEquals($gameActions::STATES['player_initiates'], $gameActions->__get('state'));

        /** Player 21, bank 22. */
        $player->hand->addCard(new CardGraphic(12));
        $player->hand->addCard(new CardGraphic(9));
        $player->__set('score', 21);
        $gameActions->playerDraws(0);
        $this->assertEquals($gameActions::STATES['player_busted'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);

        /** Player max 13, bank 21. */
        $player->hand->addCard(new CardGraphic(1));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(53));
        $banker->hand->addCard(new CardGraphic(52));
        $gameActions->playerDraws(1);
        $this->assertEquals($gameActions::STATES['bank_wins'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);

        /** Player 21, bank 20. */
        $player->hand->addCard(new CardGraphic(52));
        $player->hand->addCard(new CardGraphic(53));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(12));
        $banker->hand->addCard(new CardGraphic(5));
        $gameActions->deck->emptyDeck();
        $gameActions->deck->addToDeck([0, 10, 11, 12]); // 0 % after ace is drawn, bank stays
        $gameActions->playerDraws(1); // Ace
        $this->assertEquals($gameActions::STATES['player_wins'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);

        /** Bank has only one card of low value, check percentage branch */
        $player->hand->addCard(new CardGraphic(52));
        $player->hand->addCard(new CardGraphic(53));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(5));
        $gameActions->deck->emptyDeck();
        $gameActions->deck->addToDeck([2, 3, 4, 5]);
        $gameActions->playerDraws(1);
        $this->assertEquals($gameActions::STATES['player_wins'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);
    }

    /** Test winning states with intelligence. */
    public function testWinningHandWithoutIntelligence(): void
    {
        /** Without intelligence. */
        $gameActions = new GameActions();
        $gameActions->gaContinue = new GameActionsContinue();
        $player = $gameActions->players[0];
        $banker = $gameActions->players[1];

        /** Player 21, bank 18. No intelligence. */
        $player->hand->addCard(new CardGraphic(52));
        $player->hand->addCard(new CardGraphic(53));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(9));
        $banker->hand->addCard(new CardGraphic(21));
        $gameActions->deck->emptyDeck();
        $gameActions->deck->addToDeck([0]); // bank will stay at 18
        $gameActions->playerDraws(1);
        $this->assertEquals($gameActions::STATES['player_wins'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);

        /** Player max 13, bank 21. No intelligence. */
        $player->hand->addCard(new CardGraphic(1));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(53));
        $gameActions->playerDraws(1);
        $this->assertEquals($gameActions::STATES['bank_wins'], $gameActions->__get('state'));
        $gameActions->gaContinue->continueGame($gameActions);

        /** Test game over */
        $gameActions = new GameActions();
        $gameActions->gaContinue = new GameActionsContinue();
        $gameActions->gaBet = new GameActionsBet();
        $gameActions->gaBet->playerBets(100, $gameActions);
        $player = $gameActions->players[0];
        $banker = $gameActions->players[1];

        $player->hand->addCard(new CardGraphic(1));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(53));
        $banker->hand->addCard(new CardGraphic(52));
        $gameActions->playerDraws(1);
        $gameActions->gaContinue->continueGame($gameActions);
        $this->assertEquals($gameActions::STATES['game_over'], $gameActions->__get('state'));
    }

    /** Test game over. */
    public function testGameOver(): void
    {
        $gameActions = new GameActions();
        $gameActions->gaContinue = new GameActionsContinue();
        $gameActions->gaBet = new GameActionsBet();
        $gameActions->gaBet->playerBets(100, $gameActions);
        $player = $gameActions->players[0];
        $banker = $gameActions->players[1];

        $player->hand->addCard(new CardGraphic(1));
        $gameActions->playerDraws(0);
        $banker->hand->addCard(new CardGraphic(53));
        $banker->hand->addCard(new CardGraphic(52));
        $gameActions->playerDraws(1);
        $gameActions->gaContinue->continueGame($gameActions);
        $this->assertEquals($gameActions::STATES['game_over'], $gameActions->__get('state'));
    }
}
