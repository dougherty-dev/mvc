<?php

/**
 * Poker game controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\PokerGameController;
use App\Controller\Poker\Helpers\PokerFetchCommunity;
use App\Controller\Poker\Helpers\PokerFetchPlayers;

/**
 * Test cases for class PokerGameController.
 */
class PokerGameControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testPokerGameController(): void
    {
        $cls = new PokerGameController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\PokerGameController", $cls);

        $cls = new PokerFetchCommunity();
        $this->assertInstanceOf("\App\Controller\Poker\Helpers\PokerFetchCommunity", $cls);

        $cls = new PokerFetchPlayers();
        $this->assertInstanceOf("\App\Controller\Poker\Helpers\PokerFetchPlayers", $cls);
    }

    /**
     * Test route /proj/poker
     */
    public function testPoker(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/poker');
        $this->assertResponseIsSuccessful();
    }
}
