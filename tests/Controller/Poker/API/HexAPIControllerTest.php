<?php

/**
 * HexAPIControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Poker\API\HexAPIController;

/**
 * HexAPIControllerTest class.
 */
class HexAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHexAPIController(): void
    {
        $cls = new HexAPIController();
        $this->assertInstanceOf("\App\Controller\Poker\API\HexAPIController", $cls);

        $client = static::createClient();
        $client->request('POST', '/api/poker/hex', ['hand' => [0, 27, 13, 2, 47]]);
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test method apiPokerHex
     */
    public function testApiPokerHex(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $pokerHex = $container->get(HexAPIController::class);
        /** @phpstan-ignore-next-line */
        $res = $pokerHex->apiPokerHex(new Request(['hand' => [0, 27, 13, 2, 47]]));
        /** @var string[] */
        $content = json_decode($res->getContent(), true);

        $this->assertEquals($content["hex"], "H1e09320");
        $this->assertEquals($content["handUnicodeValues"], [
            "🃑",
            "🂢",
            "🃁",
            "🃓",
            "🂹"
        ]);
        $this->assertEquals($content["handSymbolValues"], [
            "♣️A",
            "♥️2",
            "♦️A",
            "♣️3",
            "♠️9"
        ]);
        $this->assertEquals($content["handTextValues"], [
            "klöver ess",
            "hjärter två",
            "ruter ess",
            "klöver tre",
            "spader nio"
        ]);

        /** @phpstan-ignore-next-line */
        $res = $pokerHex->apiPokerHex(new Request(['hand' => null]));
        $content = json_decode($res->getContent(), true);
        $this->assertEquals($content, []);
    }
}
