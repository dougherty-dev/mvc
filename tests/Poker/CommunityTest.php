<?php

/**
 * Poker community test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\Community;
use App\Poker\CommunityCards;
use App\Poker\Deck;
use App\Poker\Hand;

/**
 * Test cases for class Community.
 */
class CommunityTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $community = new Community();
        $this->assertInstanceOf("\App\Poker\Community", $community);
        $this->assertEquals($community->getRaises(), 0);

        $cards = new CommunityCards();
        $this->assertInstanceOf("\App\Poker\CommunityCards", $cards);
        $this->assertCount(0, $cards->getDeck()->get());
        $this->assertCount(0, $cards->getDiscarded()->get());
        $this->assertCount(0, $cards->getHand()->get());

        $deck = new Deck();
        $deck->resetDeck();

        $cards->setDeck($deck);
        $this->assertCount(52, $cards->getDeck()->get());

        $cards->setDiscarded($deck);
        $this->assertCount(52, $cards->getDiscarded()->get());

        $hand = new Hand();
        $hand->addToHand(array_keys($deck->get()));
        $cards->setHand($hand);
        $this->assertCount(52, $cards->getHand()->get());
    }
}
