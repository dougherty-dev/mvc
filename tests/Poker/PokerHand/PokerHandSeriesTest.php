<?php

/**
 * PokerHandSeriesTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\PokerHand;

use App\Poker\PokerHand\PokerHandValue;
use App\Poker\Hand;

/**
 * PokerHandSeriesTest class.
 */
class PokerHandSeriesTest extends PokerHandValueTest
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPokerHandSeries(): void
    {
        $pokerHandValue = new PokerHandValue();

        /** Straight flush */
        $vals = [16, 17, 18, 19, 20]; // ♦️4, ♦️5, ♦️6, ♦️7, ♦️8
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H8800000");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex > "H1c0da20"); // one pair

        /** Flush */
        $vals = [15, 17, 18, 19, 20]; // ♦️3, ♦️5, ♦️6, ♦️7, ♦️8
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H5800000");
        $this->assertNotEquals($hex, "H5300000");

        /** Straight */
        $vals = [3, 17, 18, 19, 20]; // ♣️4, ♦️5, ♦️6, ♦️7, ♦️8
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H4800000");
        $this->assertNotEquals($hex, "H5300000");

        /** Straight flush, ace low */
        $vals = [4, 0, 2, 3, 1]; // ♣️5, ♣️A, ♣️3, ♣️4, ♣️2
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H8500000");
        $this->assertNotEquals($hex, "H5300000");

        /** Straight flush, ace high */
        $vals = [12, 0, 9, 10, 11]; // ♣️K, ♣️A, ♣️10, ♣️J, ♣️Q
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H8e00000");
        $this->assertNotEquals($hex, "H5300000");

        /** Straight, ace high */
        $vals = [12, 13, 9, 10, 11]; // ♣️K, ♦️A, ♣️10, ♣️J, ♣️Q
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H4e00000");
        $this->assertNotEquals($hex, "H5300000");

        /** Straight, ace low */
        $vals = [4, 0, 2, 3, 14]; // ♣️5, ♣️A, ♣️3, ♣️4, ♣️2
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H4500000");
        $this->assertNotEquals($hex, "H5300000");
    }
}
