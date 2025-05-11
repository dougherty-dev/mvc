<?php

/**
 * Community test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use RangeException;
use App\Entity\Community;

/** Test cases for class Community. */
class CommunityTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $community = new Community();
        $this->assertInstanceOf("\App\Entity\Community", $community);

        $id = rand(0, 1000);
        $community->setId($id);
        $getId = $community->getId();
        $this->assertEquals($id, $getId);

        $status = rand(0, 10);
        $community->setStatus($status);
        $getStatus = $community->getStatus();
        $this->assertEquals($status, $getStatus);

        $deck = array_fill(0, 10, rand(0, 50));
        $community->setDeck($deck);
        $getDeck = $community->getDeck();
        $this->assertEquals($deck, $getDeck);

        $discarded = array_fill(0, 10, rand(0, 50));
        $community->setDiscarded($discarded);
        $getDiscarded = $community->getDiscarded();
        $this->assertEquals($discarded, $getDiscarded);

        $hand = array_fill(0, 10, rand(0, 50));
        $community->setHand($hand);
        $getHand = $community->getHand();
        $this->assertEquals($hand, $getHand);

        $pot = rand(0, 10);
        $community->setPot($pot);
        $getPot = $community->getPot();
        $this->assertEquals($pot, $getPot);

        $raises = rand(0, 10);
        $community->setRaises($raises);
        $getRaises = $community->getRaises();
        $this->assertEquals($raises, $getRaises);
    }
}
