<?php

/**
 * Game controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Game21;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Game21\GameAPIController;

/**
 * Test cases for class GameController.
 */
class GameAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameAPIController(): void
    {
        $cls = new GameAPIController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GameAPIController", $cls);
    }

    /**
     * Test route /api/game
     */
    public function testAPIGame(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/game');
        $this->assertResponseIsSuccessful();
    }
}
