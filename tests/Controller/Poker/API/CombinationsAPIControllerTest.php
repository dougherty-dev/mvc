<?php

/**
 * CombinationsAPIControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Poker\API\CombinationsAPIController;

/**
 * CombinationsAPIControllerTest class.
 */
class CombinationsAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testCombinationsAPIController(): void
    {
        $cls = new CombinationsAPIController();
        $this->assertInstanceOf("\App\Controller\Poker\API\CombinationsAPIController", $cls);

        $client = static::createClient();
        $client->request('POST', '/api/poker/combinations', ['table' => [32, 30, 5, 47, 4], 'hand' => [28, 33]]);
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test method apiPokerCombinations
     */
    public function testAPIPokerCombinations(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $combinations = $container->get(CombinationsAPIController::class);
        /** @phpstan-ignore-next-line */
        $res = $combinations->apiPokerCombinations(new Request(['table' => [32, 30, 5, 47, 4], 'hand' => [28, 33]]));
        /** @var string[] */
        $content = json_decode($res->getContent(), true);
        $content = $content[0];

        $this->assertEquals($content["bestHex"], "H4900000"); // @phpstan-ignore-line
        $this->assertEquals($content["originalCards"], [ // @phpstan-ignore-line
            "♥️7",
            "♥️5",
            "♣️6",
            "♠️9",
            "♣️5",
            "♥️3",
            "♥️8"
        ]);

        /** @phpstan-ignore-next-line */
        $res = $combinations->apiPokerCombinations(new Request(['table' => [], 'hand' => []]));
        $content = json_decode($res->getContent(), true);
        $this->assertEquals($content, []);
    }
}
