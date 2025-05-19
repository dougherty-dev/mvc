<?php

/**
 * GameRoundControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\GameRoundController;

/**
 * Test cases for class GameRoundController.
 */
class GameRoundControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameRoundController(): void
    {
        $cls = new GameRoundController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\GameRoundController", $cls);
    }

    /**
     * Test route /proj/poker/begin
     */
    public function testPokerBegin(): void
    {
        $client = static::createClient();
        $client->request('POST', '/proj/poker/begin');
        $client->request('POST', '/proj/poker/round');
        $this->assertResponseRedirects('/proj/poker');
    }

    /**
     * Test route /proj/poker/round
     */
    public function testPokerRound(): void
    {
        $client = static::createClient();
        $client->request('POST', '/proj/poker/round', ['fold' => 1]);
        $this->assertResponseRedirects('/proj/poker');

        $client->request('POST', '/proj/poker/round', ['call' => 1]);
        $this->assertResponseRedirects('/proj/poker');

        $client->request('POST', '/proj/poker/round', ['check' => 1]);
        $this->assertResponseRedirects('/proj/poker');

        $client->request('POST', '/proj/poker/round', ['raise' => 1]);
        $this->assertResponseRedirects('/proj/poker');

        $client->request('POST', '/proj/poker/round', ['makebet' => 1, 'bet' => 10]);
        $this->assertResponseRedirects('/proj/poker');
    }
}
