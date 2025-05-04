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

/** Test cases for class GameController. */
class GameControllerTest extends WebTestCase
{
    /** Test instantiation of the class itself. */
    public function testGameController(): void
    {
        $cls = new GameController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\GameController", $cls);
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

    /** Test route /game/player/draws/process */
    public function testGamePlayerDrawsProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/player/draws/process', ['player' => 0, 'draw' => true, 'stay' => true]);
        $this->assertResponseRedirects('/game/dojo');
    }

    /** Test route /game/player/bets/process */
    public function testGamePlayerBetsProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/player/bets/process', ['bet' => 50]);
        $this->assertResponseRedirects('/game/dojo');
    }

    /** Test route /game/player/wins/process */
    public function testGamePlayerWinsProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/player/wins/process', ['continue' => true]);
        $this->assertResponseRedirects('/game/dojo');
    }

    /** Test route /game/over/process */
    public function testGameOverProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/over/process');
        $this->assertResponseRedirects('/game');
    }

    /** Test route /game/options/process */
    public function testGameOptionsProcess(): void
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/game/options/process',
            [
                'options' => true,
                'bankIntelligence' => 'checked',
                'showDeck' => 'checked'
            ]
        );
        $this->assertResponseRedirects('/game/dojo');
    }

    /** Test route /api/game */
    public function testAPIGame(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/game');
        $this->assertResponseIsSuccessful();
    }
}
