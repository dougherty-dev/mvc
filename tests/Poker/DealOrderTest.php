<?php

/**
 * DealOrderTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\DealOrder;
use App\Poker\Helpers\DetermineBadges;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\GetDeck;
use App\Poker\Helpers\PreflopDeal;
use App\Poker\Helpers\SetBadges;
use App\Poker\Helpers\DealHoleCards;

/**
 * Test cases for class DealOrderTest.
 */
class DealOrderTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHelpers(): void
    {
        $cls = new DealOrder();
        $this->assertInstanceOf("\App\Poker\Helpers\DealOrder", $cls);

        $cls = new DetermineBadges();
        $this->assertInstanceOf("\App\Poker\Helpers\DetermineBadges", $cls);

        $cls = new FetchCommunity();
        $this->assertInstanceOf("\App\Poker\Helpers\FetchCommunity", $cls);

        $cls = new FetchPlayers();
        $this->assertInstanceOf("\App\Poker\Helpers\FetchPlayers", $cls);

        $cls = new GetDeck();
        $this->assertInstanceOf("\App\Poker\Helpers\GetDeck", $cls);

        $cls = new PreflopDeal();
        $this->assertInstanceOf("\App\Poker\Helpers\PreflopDeal", $cls);

        $cls = new SetBadges();
        $this->assertInstanceOf("\App\Poker\Helpers\SetBadges", $cls);

        $cls = new DealHoleCards();
        $this->assertInstanceOf("\App\Poker\Helpers\DealHoleCards", $cls);
    }
}
