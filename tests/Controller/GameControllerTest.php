<?php

/**
 * Game controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Game21\GameActions;
use App\Controller\GameController;
use App\Controller\GameSessionController;
use App\Controller\GamePlayerController;
use App\Controller\GameContinueController;
use App\Controller\GameBetController;

/** Test cases for class GameController. */
class GameControllerTest extends WebTestCase
{
    /** Test instantiation of the class itself. */
    public function testGameController(): void
    {
        $cls = new GameController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\GameController", $cls);

        $cls = new GameSessionController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\GameSessionController", $cls);

        $cls = new GamePlayerController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\GamePlayerController", $cls);

        $cls = new GameContinueController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\GameContinueController", $cls);

        $cls = new GameBetController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\GameBetController", $cls);
    }

    /** Test route /game */
    public function testGame(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('button', 'Spela 21');
    }

    /** Test route /game/doc */
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
