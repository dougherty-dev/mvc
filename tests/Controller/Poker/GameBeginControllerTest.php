<?php

/**
 * GameBeginController test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\GameBeginController;

/**
 * Test cases for class GameBeginController.
 */
class GameBeginControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameBeginController(): void
    {
        $cls = new GameBeginController();
        $this->assertInstanceOf("\App\Controller\Poker\GameBeginController", $cls);
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
