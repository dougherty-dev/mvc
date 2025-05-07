<?php

/**
 * Deck test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Cards;

use PHPUnit\Framework\TestCase;
use App\Cards\DeckFoundation;
use App\Cards\DeckRepresentations;
use App\Cards\DeckMethods;
use App\Cards\Deck;

/**
 * Test cases for class Deck.
 */
class DeckTest extends TestCase
{
    /**
     * Construct deck and verify its size.
     */
    public function testCreateDeck(): void
    {
        /**
         * Deck is empty on instantiation?
         */
        $deck = new Deck();
        $this->assertInstanceOf("\App\Cards\Deck", $deck);
        $this->assertCount(0, $deck->getDeck());

        /**
         * Deck has right count on reset?
         */
        $deck->resetDeck();
        $this->assertCount(54, $deck->getDeck());

        $this->assertInstanceOf("\App\Cards\DeckFoundation", new DeckFoundation());
        $this->assertInstanceOf("\App\Cards\DeckRepresentations", new DeckRepresentations());
        $this->assertInstanceOf("\App\Cards\DeckMethods", new DeckMethods());
    }

    /**
     * Construct deck and verify its shuffle functionality.
     */
    public function testShuffleDeck(): void
    {
        $deck1 = new Deck();
        $deck1->resetDeck();

        $deck2 = new Deck();
        $deck2->resetDeck();

        /** Shuffled deck is of right type? */
        $deck2->shuffleDeck();
        $this->assertCount(54, $deck2->getDeck());
        $this->assertInstanceOf("\App\Cards\Deck", $deck2);

        /** Shuffled array has right count */
        $this->assertNotEquals($deck1->getDeck(), $deck2->getDeck());

        /** Shuffled array has unique values */
        $arr = array_unique($deck2->intValues());
        $this->assertCount(54, $arr);

        /** Shuffled array has unique string values */
        $arr = array_unique($deck2->deckValues());
        $this->assertCount(53, $arr); // Joker values equal

        /** Shuffled array has unique descriptions */
        $arr = array_unique($deck2->deckTextValues());
        $this->assertCount(53, $arr); // Joker values equal
    }

    /**
     * Construct deck and verify its card drawing functionality.
     */
    public function testDrawCardsFromDeck(): void
    {
        $deck = new Deck();
        $deck->resetDeck();

        /** Cards are drawn correctly? */
        foreach ($deck->getDeck() as $key => $card) {
            $this->assertCount(54 - $key, $deck->getDeck());
            $deck->drawCard();
            $this->assertInstanceOf("\App\Cards\CardGraphic", $card);
        }
    }

    /**
     * Construct deck manually from individual cards
     */
    public function testAddCardsToDeck(): void
    {
        $deck1 = new Deck();
        $deck1->addToDeck(range(0, 53));
        $this->assertCount(54, $deck1->getDeck());

        $deck2 = new Deck();
        $deck2->resetDeck();

        /** Decks equal? */
        $this->assertEquals($deck1->getDeck(), $deck2->getDeck());
    }
}
