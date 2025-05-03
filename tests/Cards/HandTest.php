<?php

/**
 * Hand test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Cards;

use PHPUnit\Framework\TestCase;

/** Test cases for class Hand. */
class HandTest extends TestCase
{
    /** Construct object with argument and verify that the object has the expected properties. */
    public function testCreateObject(): void
    {
        $hand = new Hand();
        foreach (range(0, 53) as $val) {
            $card = new CardGraphic($val);
            $hand->addCard($card);
        }

        $this->assertCount(54, $hand->getHand());

        $deck = new Deck();
        $deck->resetDeck();

        /** Deck and hand methods behave identically? */
        $this->assertEquals($deck->getDeck(), $hand->getHand());

        $this->assertEquals($deck->intValues(), $hand->intValues());
        $this->assertEquals($deck->deckValues(), $hand->handValues());
        $this->assertEquals($deck->deckTextValues(), $hand->handTextValues());

        $this->assertContainsOnly('integer', $hand->intValues());
        $this->assertContainsOnly('string', $hand->handValues());
        $this->assertContainsOnly('string', $hand->handTextValues());
    }
}
