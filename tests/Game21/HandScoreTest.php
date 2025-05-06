<?php

/**
 * Hand score test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Game21;

use PHPUnit\Framework\TestCase;
use App\Cards\CardGraphic;
use App\Cards\Hand;
use App\Game21\HandScore;
use App\Game21\HandScoreAces;
use App\Game21\HandScoreJokers;
use App\Game21\HandScoreBest;
use App\Game21\HandScoreCalculate;
use App\Game21\HandScoreAdd;

/** Test cases for class Card. */
class HandScoreTest extends TestCase
{
    /** Instantiate Handscore classes. */
    public function testCreateInstance(): void
    {
        $this->assertInstanceOf("\App\Game21\HandScore", new HandScore());
        $this->assertInstanceOf("\App\Game21\HandScoreAces", new HandScoreAces());
        $this->assertInstanceOf("\App\Game21\HandScoreJokers", new HandScoreJokers());
        $this->assertInstanceOf("\App\Game21\HandScoreBest", new HandScoreBest());
        $this->assertInstanceOf("\App\Game21\HandScoreCalculate", new HandScoreCalculate());
        $this->assertInstanceOf("\App\Game21\HandScoreAdd", new HandScoreAdd());
    }

    /** Construct object and check scores for some hands. */
    public function testCreateObject(): void
    {
        $handscore = new HandScore();

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
