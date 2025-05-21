<?php

/**
 * HexDecodeAPIControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Poker\API\HexDecodeAPIController;

/**
 * HexDecodeAPIControllerTest class.
 */
class HexDecodeAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHexDecodeAPIController(): void
    {
        $cls = new HexDecodeAPIController();
        $this->assertInstanceOf("\App\Controller\Poker\API\HexDecodeAPIController", $cls);

        $client = static::createClient();
        $client->request('POST', '/api/poker/hex/decode', ['hex' => "H1e09320"]);
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test method apiPokerHex
     */
    public function testApiPokerHexDecode(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $pokerHex = $container->get(HexDecodeAPIController::class);
        /** @phpstan-ignore-next-line */
        $res = $pokerHex->apiPokerHexDecode(new Request(['hex' => ""]));
        $content = json_decode($res->getContent(), true);
        $this->assertEquals($content, []);
    }
}
