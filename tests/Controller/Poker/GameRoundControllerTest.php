<?php

/**
 * GameRoundControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\GameRoundController;
use App\Controller\Poker\Unit\StatesController;

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
        $this->assertResponseRedirects('/proj/poker');
    }

    /**
     * Test route /proj/poker/round
     */
    public function testPokerRound(): void
    {
        $client = static::createClient();
        $client->request('POST', '/proj/reset/post');

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

        $client->request('POST', '/proj/reset/post');
    }

    /**
     * Test route /proj/poker/round in different configurations
     */
    public function testPokerStates(): void
    {
        $states = new StatesController();
        $this->assertInstanceOf("\App\Controller\Poker\Unit\StatesController", $states);

        $client = static::createClient();

        $data = [
            "players" => [
                [
                    "hand" => [15, 2],
                    "cash" => 500,
                    "bet" => 98,
                    "action" => 20,
                    "dealer" => true,
                    "smallblind" => false,
                    "bigblind" => false
                ],
                [
                    "hand" => [4, 12],
                    "cash" => 200,
                    "bet" => 50,
                    "action" => 40,
                    "dealer" => false,
                    "smallblind" => true,
                    "bigblind" => false
                ],
                [
                    "hand" => [46, 5],
                    "cash" => 1200,
                    "bet" => 40,
                    "action" => 50,
                    "dealer" => false,
                    "smallblind" => false,
                    "bigblind" => true
                ]
            ],
            "community" => [
                "status" => 20,
                "hand" => [],
                "pot" => 200,
                "raises" => 3
            ]
        ];

        $client->request('POST', '/proj/unit/states', $data);
        $this->assertResponseRedirects('/proj/poker');
        $client->request('POST', '/proj/poker');
        $client->request('POST', '/proj/reset/post');
    }

    /**
     * Test route /proj/poker/round in different configurations
     */
    public function testPokerStates2(): void
    {

        $client = static::createClient();

        $data = [
            "players" => [
                [
                    "hand" => [15, 2],
                    "cash" => 500,
                    "bet" => 98,
                    "action" => 60,
                    "dealer" => true,
                    "smallblind" => false,
                    "bigblind" => false
                ],
                [
                    "hand" => [4, 12],
                    "cash" => 200,
                    "bet" => 50,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => true,
                    "bigblind" => false
                ],
                [
                    "hand" => [46, 5],
                    "cash" => 1200,
                    "bet" => 40,
                    "action" => 50,
                    "dealer" => false,
                    "smallblind" => false,
                    "bigblind" => true
                ]
            ],
            "community" => [
                "status" => 60,
                "hand" => [33, 23, 22, 12, 10],
                "pot" => 200,
                "raises" => 3
            ]
        ];

        $client->request('POST', '/proj/unit/states', $data);
        $this->assertResponseRedirects('/proj/poker');
        $client->request('POST', '/proj/poker');
        $client->request('POST', '/proj/reset/post');
    }

    /**
     * Test route /proj/poker/round in different configurations
     */
    public function testPokerStates3(): void
    {
        $client = static::createClient();

        $data = [
            "players" => [
                [
                    "hand" => [15, 2],
                    "cash" => 500,
                    "bet" => 98,
                    "action" => 20,
                    "dealer" => true,
                    "smallblind" => false,
                    "bigblind" => false
                ],
                [
                    "hand" => [4, 12],
                    "cash" => 200,
                    "bet" => 50,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => true,
                    "bigblind" => false
                ],
                [
                    "hand" => [46, 5],
                    "cash" => 1200,
                    "bet" => 40,
                    "action" => 20,
                    "dealer" => false,
                    "smallblind" => false,
                    "bigblind" => true
                ]
            ],
            "community" => [
                "status" => 30,
                "hand" => [33, 23, 22],
                "pot" => 200,
                "raises" => 1
            ]
        ];

        $client->request('POST', '/proj/unit/states', $data);
        $this->assertResponseRedirects('/proj/poker');
        $client->request('POST', '/proj/poker/next');
        $client->request('POST', '/proj/reset/post');
    }

    /**
     * Test route /proj/poker/round in different configurations
     */
    public function testPokerStates4(): void
    {
        $client = static::createClient();

        $data = [
            "players" => [
                [
                    "hand" => [15, 2],
                    "cash" => 500,
                    "bet" => 98,
                    "action" => 20,
                    "dealer" => true,
                    "smallblind" => false,
                    "bigblind" => false
                ],
                [
                    "hand" => [4, 12],
                    "cash" => 200,
                    "bet" => 50,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => true,
                    "bigblind" => false
                ],
                [
                    "hand" => [46, 5],
                    "cash" => 1200,
                    "bet" => 40,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => false,
                    "bigblind" => true
                ]
            ],
            "community" => [
                "status" => 30,
                "hand" => [33, 23, 22],
                "pot" => 200,
                "raises" => 1
            ]
        ];

        $client->request('POST', '/proj/unit/states', $data);
        $this->assertResponseRedirects('/proj/poker');
        $client->request('POST', '/proj/poker/next');
        $client->request('POST', '/proj/reset/post');
    }

    /**
     * Test route /proj/poker/round in different configurations
     */
    public function testPokerStates5(): void
    {
        $client = static::createClient();

        $data = [
            "players" => [
                [
                    "hand" => [15, 2],
                    "cash" => -500,
                    "bet" => 98,
                    "action" => 20,
                    "dealer" => true,
                    "smallblind" => false,
                    "bigblind" => false
                ],
                [
                    "hand" => [4, 12],
                    "cash" => -200,
                    "bet" => 50,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => true,
                    "bigblind" => false
                ],
                [
                    "hand" => [46, 5],
                    "cash" => 1200,
                    "bet" => 40,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => false,
                    "bigblind" => true
                ]
            ],
            "community" => [
                "status" => 30,
                "hand" => [33, 23, 22],
                "pot" => 200,
                "raises" => 1
            ]
        ];

        $client->request('POST', '/proj/unit/states', $data);
        $this->assertResponseRedirects('/proj/poker');
        $client->request('POST', '/proj/poker/next');
    }

    /**
     * Test route /proj/poker/round in different configurations
     */
    public function testPokerStates6(): void
    {
        $client = static::createClient();

        $data = [
            "players" => [
                [
                    "hand" => [15, 2],
                    "cash" => 500,
                    "bet" => 98,
                    "action" => 30,
                    "dealer" => true,
                    "smallblind" => false,
                    "bigblind" => false
                ],
                [
                    "hand" => [4, 12],
                    "cash" => 200,
                    "bet" => 50,
                    "action" => 30,
                    "dealer" => false,
                    "smallblind" => false,
                    "bigblind" => true
                ],
                [
                    "hand" => [46, 5],
                    "cash" => -1200,
                    "bet" => 40,
                    "action" => 70,
                    "dealer" => false,
                    "smallblind" => true,
                    "bigblind" => false
                ]
            ],
            "community" => [
                "status" => 10,
                "hand" => [],
                "pot" => 200,
                "raises" => 1
            ]
        ];

        $client->request('POST', '/proj/unit/states', $data);
        $this->assertResponseRedirects('/proj/poker');
        $client->request('POST', '/proj/poker');
        $client->request('POST', '/proj/reset/post');
    }
}
