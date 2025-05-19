<?php

/**
 * PokerHandValueTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\PokerHand;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\PokerHand\PokerHandBase;
use App\Poker\PokerHand\PokerHandIssers;
use App\Poker\PokerHand\PokerHandNonSeries;
use App\Poker\PokerHand\PokerHandSequence;
use App\Poker\PokerHand\PokerHandSeries;
use App\Poker\PokerHand\PokerHandValue;
use App\Poker\Hand;

/**
 * PokerHandValueTest class.
 */
class PokerHandValueTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPokerHandValue(): void
    {
        $pokerHandValue = new PokerHandValue();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandValue", $pokerHandValue);

        $pokerHandIssers = new PokerHandIssers();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandIssers", $pokerHandIssers);

        $pokerHandSeries = new PokerHandSeries();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandSeries", $pokerHandSeries);

        $pokerHandNonSeries = new PokerHandNonSeries();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandNonSeries", $pokerHandNonSeries);

        $pokerHandBase = new PokerHandBase();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandBase", $pokerHandBase);

        $pokerHandSequence = new PokerHandSequence();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandSequence", $pokerHandSequence);

        /** Four of a kind */
        $vals = [0, 13, 12, 26, 39]; // ♣️A, ♦️A, ♣️K, ♥️A, ♠️A
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H7e00000");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex > "H1e00000"); // pair

        /** Full house */
        $vals = [0, 13, 26, 1, 14]; // ♣️A, ♦️A, ♥️A, ♣️2, ♦️2
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H6e00000");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex < "H7e00000"); // four of a kind

        /** Three of a kind */
        $vals = [1, 14, 11, 27, 3]; // ♣️2, ♦️2, ♣️Q, ♥️2, ♣️4
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H3200000");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex < "H6e00000"); // full house

        /** Two pairs */
        $vals = [1, 14, 11, 22, 24]; // ♣️2, ♦️2, ♣️Q, ♦️10, ♦️Q
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H2c2a000");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex < "H3200000"); // three of a kind

        /** One pair */
        $vals = [12, 14, 11, 22, 24]; // ♣️K, ♦️2, ♣️Q, ♦️10, ♦️Q
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H1c0da20");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex < "H2c2a000"); // two pairs

        /** High card */
        $vals = [12, 14, 11, 22, 26]; // ♣️K, ♦️2, ♣️Q, ♦️10, ♥️A
        $hand = new Hand();
        $hand->addToHand($vals);
        $hex = $pokerHandValue->checkHand($hand);
        $this->assertEquals($hex, "H0e0dca2");
        $this->assertNotEquals($hex, "H5300000");
        $this->assertTrue($hex < "H1c0da20"); // one pair
    }
}
