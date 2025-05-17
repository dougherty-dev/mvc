<?php

/**
 * Poker game controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\GameController;

/**
 * Test cases for class GameController.
 */
class GameControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameController(): void
    {
        $cls = new GameController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\GameController", $cls);
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
