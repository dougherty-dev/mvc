<?php

/**
 * PokerGamePreflopControllerTest test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\Preflop;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\Preflop\PokerGamePreflopController;

/**
 * Test cases for class PokerGamePreflopControllerTest.
 */
class PokerGamePreflopControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testPokerGamePreflopController(): void
    {
        $cls = new PokerGamePreflopController();
        $this->assertInstanceOf("\App\Controller\Poker\Preflop\PokerGamePreflopController", $cls);
    }

    /**
     * Test route /proj/poker/begin
     */
    public function testPokerPreflop(): void
    {
        $client = static::createClient();
        $client->request('POST', '/proj/poker/begin');
        $client->request('POST', '/proj/poker/preflop');
        $this->assertResponseRedirects('/proj/poker');
    }
}
