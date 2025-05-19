<?php

/**
 * PokerHandSeriesTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\PokerHand;

use PHPUnit\Framework\TestCase;
use App\Poker\PokerHand\PokerHandValue;
use App\Poker\PokerHand\PokerHandCombinations;
use App\Poker\Hand;

/**
 * PokerHandSeriesTest class.
 */
class PokerHandCombinationsTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPokerHandCombinations(): void
    {
        $handCombinations = new PokerHandCombinations();
        $this->assertInstanceOf("\App\Poker\PokerHand\PokerHandCombinations", $handCombinations);

        $hand = [rand(0, 51), rand(0, 51), rand(0, 51)];
        $permutations = $handCombinations->permute($hand);
        $this->assertCount(pow(2, 3), $permutations);

        $hand = [16, 17, 18, 19, 20]; // ♦️4, ♦️5, ♦️6, ♦️7, ♦️8
        $permutations = $handCombinations->permute($hand);
        $this->assertCount(pow(2, 5), $permutations);

        $uniqueHands = $handCombinations->permuteHand();
        $this->assertCount(21, $uniqueHands);

        /** Uniqueness */
        $hashes = array_map(fn ($value): string => md5(serialize($value)), $uniqueHands);
        $this->assertEquals($hashes, array_unique($hashes));

        // /** Straight flush */
        // $vals = [16, 17, 18, 19, 20]; // ♦️4, ♦️5, ♦️6, ♦️7, ♦️8
        // $hand = new Hand();
        // $hand->addToHand($vals);
        // $hex = $pokerHandValue->checkHand($hand);
        // $this->assertEquals($hex, "H8800000");
        // $this->assertNotEquals($hex, "H5300000");
        // $this->assertTrue($hex > "H1c0da20"); // one pair
    }
}
