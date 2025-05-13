<?php

/**
 * PokerGameBeginController test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\Begin;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\Begin\PokerGameBeginController;
use App\Controller\Poker\Begin\PokerGameBeginUpdatePlayers;
use App\Controller\Poker\Begin\PokerGameBeginGetDeck;
use App\Controller\Poker\Begin\PokerGameBeginDetermineBadges;

/**
 * Test cases for class PokerGameBeginController.
 */
class PokerGameBeginControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testPokerGameBeginController(): void
    {
        $cls = new PokerGameBeginController();
        $this->assertInstanceOf("\App\Controller\Poker\Begin\PokerGameBeginController", $cls);

        $cls = new PokerGameBeginUpdatePlayers();
        $this->assertInstanceOf("\App\Controller\Poker\Begin\PokerGameBeginUpdatePlayers", $cls);

        $cls = new PokerGameBeginGetDeck();
        $this->assertInstanceOf("\App\Controller\Poker\Begin\PokerGameBeginGetDeck", $cls);

        $cls = new PokerGameBeginDetermineBadges();
        $this->assertInstanceOf("\App\Controller\Poker\Begin\PokerGameBeginDetermineBadges", $cls);
    }

    /**
     * Test route /proj/poker/begin
     */
    public function testPokerBegin(): void
    {
        $client = static::createClient();
        $client->request('POST', '/proj/poker/begin');
        $this->assertResponseRedirects('/proj/poker');
    }
}
