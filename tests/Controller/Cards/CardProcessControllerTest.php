<?php

/**
 * Process controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Cards;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Cards\CardProcessController;

/**
 * Test cases for class CardProcessController.
 */
class CardProcessControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testCardProcessController(): void
    {
        $cls = new CardProcessController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardProcessController", $cls);
    }

    /**
     * Test route /session
     */
    public function testSession(): void
    {
        $client = static::createClient();
        $client->request('GET', '/session');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $session->set("test", 'cookie');
        $this->assertEquals($session->get("test"), 'cookie');
    }

    /**
     * Test route /session/delete
     */
    public function testSessionDelete(): void
    {
        $client = static::createClient();
        $client->request('GET', '/session/delete');
        $this->assertResponseRedirects('/session');
    }

    /**
     * Test route /card/deck/draw/process
     */
    public function testCardDeckDrawProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/card/deck/draw/process', ['number' => 5]);
        $this->assertResponseRedirects('/card/deck/draw/5');
    }

    /**
     * Test route /card/deck/deal/process
     */
    public function testCardDeckDealProcess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/card/deck/deal/process', ['players' => 3, 'cards' => 5]);
        $this->assertResponseRedirects('/card/deck/deal/3/5');
    }
}
