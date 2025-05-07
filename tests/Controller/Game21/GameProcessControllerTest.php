<?php

/**
 * Game controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Game21;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Game21\GameProcessController;
use App\Controller\Game21\GamePlayerController;

/**
 * Test cases for class GameProcessController.
 */
class GameProcessControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameProcessController(): void
    {
        $cls = new GameProcessController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GameProcessController", $cls);

        $cls = new GamePlayerController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Game21\GamePlayerController", $cls);
    }

    /**
     * Test POST route /game/player/draws/process
     */
    public function testGamePlayerDrawsProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/player/draws/process', ['player' => 0, 'draw' => true, 'stay' => true]);
        $this->assertResponseRedirects('/game/dojo');
    }

    /**
     * Test POST route /game/player/bets/process
     */
    public function testGamePlayerBetsProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/player/bets/process', ['bet' => 50]);
        $this->assertResponseRedirects('/game/dojo');
    }

    /**
     * Test POST route /game/player/wins/process
     */
    public function testGamePlayerWinsProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/player/wins/process', ['continue' => true]);
        $this->assertResponseRedirects('/game/dojo');
    }

    /**
     * Test POST route /game/over/process
     */
    public function testGameOverProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/over/process');
        $this->assertResponseRedirects('/game');
    }

    /**
     * Test POST route /game/options/process
     */
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
}
