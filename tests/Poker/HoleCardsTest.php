<?php

/**
 * HoleCardsTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ObjectManager;
use App\Poker\Round\HoleCards;
use App\Poker\Round\DealHoleCardsHelper;
use App\Poker\Round\DealHoleCards;
use App\Poker\Round\CommunityCards;
use App\Poker\Round\DealCommunityCards;

/**
 * Test cases for class HoleCards.
 */
class HoleCardsTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHelpers(): void
    {
        $cls = new HoleCards();
        $this->assertInstanceOf("\App\Poker\Round\HoleCards", $cls);

        $cls = new DealHoleCardsHelper();
        $this->assertInstanceOf("\App\Poker\Round\DealHoleCardsHelper", $cls);

        $cls = new DealHoleCards();
        $this->assertInstanceOf("\App\Poker\Round\DealHoleCards", $cls);

        $cls = new CommunityCards();
        $this->assertInstanceOf("\App\Poker\Round\CommunityCards", $cls);

        $cls = new DealCommunityCards();
        $this->assertInstanceOf("\App\Poker\Round\DealCommunityCards", $cls);
    }
}
