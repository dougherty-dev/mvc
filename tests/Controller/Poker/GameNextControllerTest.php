<?php

/**
 * GameNextController test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\GameNextController;

/**
 * Test cases for class GameNextController.
 */
class GameNextControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameNextController(): void
    {
        $cls = new GameNextController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\GameNextController", $cls);
    }

    /**
     * Test route /proj/poker/begin
     */
    public function testPokerBegin(): void
    {
        $client = static::createClient();
        $client->request('POST', '/proj/poker/next');
        $this->assertResponseRedirects('/proj/poker');
    }
}
