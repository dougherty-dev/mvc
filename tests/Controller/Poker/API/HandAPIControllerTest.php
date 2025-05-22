<?php

/**
 * HandAPIControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Poker\API\HandAPIController;

/**
 * CombinationsAPIControllerTest class.
 */
class HandAPIControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHandAPIController(): void
    {
        $cls = new HandAPIController();
        $this->assertInstanceOf("\App\Controller\Poker\API\HandAPIController", $cls);

        $client = static::createClient();
        $client->request('POST', '/api/poker/hand', ['player' => 0]);
        $this->assertResponseIsSuccessful();

        $client->request('POST', '/api/poker/hand', ['player' => 4]);
        $this->assertResponseIsSuccessful();
        $this->assertEquals($client->getResponse()->getContent(), '[]');
        $client->request('POST', '/proj/reset/post');
    }
}
