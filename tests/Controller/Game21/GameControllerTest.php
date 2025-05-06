<?php

/**
 * Game controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Game21;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Game21\GameActions;
use App\Controller\Game21\GameController;
use App\Controller\Game21\GameSessionController;
use App\Controller\Game21\GamePlayerController;
use App\Controller\Game21\GameContinueController;
use App\Controller\Game21\GameBetController;

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
        $this->assertInstanceOf("\App\Controller\Game21\GameController", $cls);

        $cls = new GameSessionController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GameSessionController", $cls);

        $cls = new GamePlayerController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GamePlayerController", $cls);

        $cls = new GameContinueController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GameContinueController", $cls);

        $cls = new GameBetController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GameBetController", $cls);
    }

    /**
     * Test route /game
     */
    public function testGame(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('button', 'Spela 21');
    }

    /**
     * Test route /game/doc
     */
    public function testDoc(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game/doc');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Dokumentation');
    }

    /** Test route /game/dojo */
    public function testDojo(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game/dojo');
        $this->assertResponseIsSuccessful();
    }
}
