<?php

/**
 * PokerGameBeginController test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\PokerGameBeginController;

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
        $this->assertInstanceOf("\App\Controller\Poker\PokerGameBeginController", $cls);
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
