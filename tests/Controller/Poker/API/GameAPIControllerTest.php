<?php

/**
 * GameAPIControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Poker\API\GameAPIController;

/**
 * GameAPIControllerTest class.
 */
class GameAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameAPIController(): void
    {
        $cls = new GameAPIController();
        $this->assertInstanceOf("\App\Controller\Poker\API\GameAPIController", $cls);

        $client = static::createClient();
        $client->request('GET', '/api/poker/game');
        $this->assertResponseIsSuccessful();
    }
}
