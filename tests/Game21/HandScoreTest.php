<?php

/**
 * Hand score test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Game21;

use PHPUnit\Framework\TestCase;
use App\Cards\CardGraphic;
use App\Cards\Hand;

/** Test cases for class Card. */
class HandScoreTest extends TestCase
{
    /** Construct object and check scores for some hands. */
    public function testCreateObject(): void
    {
        $handscore = new HandScore();
        $this->assertInstanceOf("\App\Game21\HandScore", $handscore);

        /** Two kings */
        $hand = new Hand();
        $hand->addCard(new CardGraphic(12));
        $hand->addCard(new CardGraphic(25));
        $bestScore = $handscore->bestScore($hand);
        $lowestScore = $handscore->lowestScore($hand);
        $this->assertEquals($bestScore, $lowestScore);
        $this->assertEquals($bestScore, 26);

        /** Ace plus seven */
        $hand = new Hand();
        $hand->addCard(new CardGraphic(0));
        $hand->addCard(new CardGraphic(6));
        $bestScore = $handscore->bestScore($hand);
        $lowestScore = $handscore->lowestScore($hand);
        $this->assertNotEquals($bestScore, $lowestScore);
        $this->assertEquals($bestScore, 21);
        $this->assertEquals($lowestScore, 8);

        /** Two jokers */
        $hand = new Hand();
        $hand->addCard(new CardGraphic(52));
        $hand->addCard(new CardGraphic(53));
        $bestScore = $handscore->bestScore($hand);
        $lowestScore = $handscore->lowestScore($hand);
        $this->assertNotEquals($bestScore, $lowestScore);
        $this->assertEquals($bestScore, 21);
        $this->assertEquals($lowestScore, 2);

        /** Three aces */
        $hand = new Hand();
        $hand->addCard(new CardGraphic(0));
        $hand->addCard(new CardGraphic(13));
        $hand->addCard(new CardGraphic(26));
        $bestScore = $handscore->bestScore($hand);
        $lowestScore = $handscore->lowestScore($hand);
        $this->assertNotEquals($bestScore, $lowestScore);
        $this->assertEquals($bestScore, 16);
        $this->assertEquals($lowestScore, 3);

        /** Ace plus joker */
        $hand = new Hand();
        $hand->addCard(new CardGraphic(0));
        $hand->addCard(new CardGraphic(53));
        $bestScore = $handscore->bestScore($hand);
        $lowestScore = $handscore->lowestScore($hand);
        $this->assertNotEquals($bestScore, $lowestScore);
        $this->assertEquals($bestScore, 21);
        $this->assertEquals($lowestScore, 2);
    }
}
