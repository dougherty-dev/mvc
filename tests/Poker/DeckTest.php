<?php

/**
 * Poker deck test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\DeckFoundation;
use App\Poker\DeckMethods;
use App\Poker\Deck;
use App\Poker\FaceMethods;
use App\Poker\Card;
use App\Poker\Hand;

/**
 * Test cases for class Deck.
 * @SuppressWarnings("StaticAccess")
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
        $this->assertInstanceOf("\App\Poker\Deck", $deck);
        $this->assertCount(0, $deck->get());

        /**
         * Deck has right count on reset?
         */
        $deck->resetDeck();
        $this->assertCount(52, $deck->get());

        $this->assertInstanceOf("\App\Poker\DeckFoundation", new DeckFoundation());
        $this->assertInstanceOf("\App\Poker\DeckMethods", new DeckMethods());
        $this->assertInstanceOf("\App\Poker\FaceMethods", new FaceMethods());
        $this->assertInstanceOf("\App\Poker\Card", new Card(1));
        $this->assertInstanceOf("\App\Poker\Hand", new Hand());
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
        $this->assertCount(52, $deck2->get());
        $this->assertInstanceOf("\App\Poker\Deck", $deck2);
    }

    /**
     * Construct deck and verify its card drawing functionality.
     */
    public function testDrawCardsFromDeck(): void
    {
        $deck = new Deck();
        $deck->resetDeck();

        /** Cards are drawn correctly? */
        foreach ($deck->get() as $key => $card) {
            $this->assertCount(52 - $key, $deck->get());
            $deck->drawCard();
            $this->assertInstanceOf("\App\Poker\Card", $card);
        }
    }

    /**
     * Construct deck manually from individual cards
     */
    public function testAddCardsToDeck(): void
    {
        $deck1 = new Deck();
        $deck1->addToDeck(range(0, 51));
        $this->assertCount(52, $deck1->get());

        $deck2 = new Deck();
        $deck2->resetDeck();

        /** Decks equal? */
        $this->assertEquals($deck1->get(), $deck2->get());
    }

    /**
     * Test FaceMethods
     */
    public function testFaceMethods(): void
    {
        $deck = FaceMethods::deckFaceValues();
        $this->assertCount(52, $deck);

        $deck = FaceMethods::deckUnicodeValues();
        $this->assertCount(52, $deck);

        $deck = FaceMethods::deckSymbolValues();
        $this->assertCount(52, $deck);

        $deck = FaceMethods::deckTextValues();
        $this->assertCount(52, $deck);
    }

    /**
     * Test Hand
     */
    public function testHand(): void
    {
        $hand = new Hand();
        foreach (range(0, 51) as $val) {
            $card = new Card($val);
            $hand->addCard($card);
        }

        $this->assertCount(52, $hand->get());

        $deck = new Deck();
        $deck->resetDeck();

        /** Deck and hand methods behave identically? */
        $this->assertEquals($deck->get(), $hand->get());

        $this->assertEquals(FaceMethods::deckTextValues(), $hand->handTextValues());
        $this->assertEquals(FaceMethods::deckFaceValues(), $hand->handFaceValues());
        $this->assertEquals(FaceMethods::deckUnicodeValues(), $hand->handUnicodeValues());
        $this->assertEquals(FaceMethods::deckSymbolValues(), $hand->handSymbolValues());
        $this->assertEquals(FaceMethods::deckSymbolValues(), $hand->handSymbolValues());

        $this->assertContainsOnly('integer', $hand->handIntValues());
        $this->assertContainsOnly('integer', $hand->handFaceValues());
        $this->assertContainsOnly('string', $hand->handTextValues());
        $this->assertContainsOnly('string', $hand->handUnicodeValues());
        $this->assertContainsOnly('string', $hand->handSymbolValues());

        $hand->empty();
        $this->assertCount(0, $hand->get());
    }
}
