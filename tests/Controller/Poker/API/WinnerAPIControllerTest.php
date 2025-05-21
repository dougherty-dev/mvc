<?php

/**
 * WinnerAPIControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Poker\Community;
use App\Poker\GameStates;
use App\Poker\Hand;
use App\Controller\Poker\API\WinnerAPIController;

/**
 * WinnerAPIControllerTest class.
 */
class WinnerAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testWinnerAPIController(): void
    {
        $cls = new WinnerAPIController();
        $this->assertInstanceOf("\App\Controller\Poker\API\WinnerAPIController", $cls);

        $client = static::createClient();
        $client->request('GET', '/api/poker/winner');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test method apiPokerWinner
     */
    public function testApiPokerWinner(): void
    {
        $winner = $this->createMock(WinnerAPIController::class);
        $winner->expects(self::once())
            ->method('apiPokerWinner')
            ->willReturn(new JsonResponse([]));

        $registry = $this->createMock(ManagerRegistry::class);
        $res = $winner->apiPokerWinner($registry);
        $this->assertEquals($res->getContent(), '[]');
    }
}
