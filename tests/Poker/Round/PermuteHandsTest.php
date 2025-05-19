<?php

/**
 * PermuteHandsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Round\PermuteHands;

/**
 * PermuteHandsTest class.
 */
class PermuteHandsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPermuteHands(): void
    {
        $permuteHands = new PermuteHands();
        $this->assertInstanceOf("\App\Poker\Round\PermuteHands", $permuteHands);


        //     /** Four of a kind */
        //     $vals = [0, 13, 12, 26, 39]; // ♣️A, ♦️A, ♣️K, ♥️A, ♠️A
        //     $hand = new Hand();
        //     $hand->addToHand($vals);
        //     $hex = $pokerHandValue->checkHand($hand);
        //     $this->assertEquals($hex, "H7e00000");
        //     $this->assertNotEquals($hex, "H5300000");
        //     $this->assertTrue($hex > "H1e00000"); // pair
    }
}
