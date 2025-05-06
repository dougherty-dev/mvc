<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Deck;

/**
 * Game action method for reassembling the deck.
 */
class GameActionsDeck
{
    /**
     * Build a new shuffled deck of cards, excluding cards in players’ hands.
     */
    private function reassembleDeck(GameActions &$gameActions): void
    {
        $newDeck = new Deck();
        $newDeck->resetDeck();

        $cards = [];
        foreach ($gameActions->players as $player) {
            $cards = array_merge($cards, $player->hand->intValues());
        }
        $cards = array_diff($newDeck->intValues(), $cards);

        $gameActions->deck = new Deck();
        $gameActions->deck->addToDeck($cards);
        $gameActions->deck->shuffleDeck();
    }

    /**
     * Make sure deck has cards.
     */
    public function checkDeck(GameActions &$gameActions): void
    {
        $gameActions->deck->remainingCards() or $this->reassembleDeck($gameActions);
    }
}
