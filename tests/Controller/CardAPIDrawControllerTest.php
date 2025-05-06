<?php

/**
 * Card API controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Cards\Deck;
use App\Controller\CardAPIDrawController;

/** Test cases for class CardAPIDrawControllerTest. */
class CardAPIDrawControllerTest extends CardAPIDeckControllerTest
{
    /** Test instantiation of the class itself. */
    public function testCardAPIController(): void
    {
        $cls = new CardAPIDrawController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\CardAPIDrawController", $cls);
    }

    /** Test route /api/deck/draw */
    public function testAPIDeckDraw(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/draw');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = $this->fetchSessionDeck($session);

        $this->assertCount(53, $sessionDeck->intValues());
    }

    /** Test route /api/deck/draw/number */
    public function testAPIDeckDrawNumber(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/deck/draw/5');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = $this->fetchSessionDeck($session);

        $this->assertCount(49, $sessionDeck->intValues());
    }

    /** Test route /api/deck/draw/number */
    public function testAPIDeckDrawNumberPost(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/draw/5', ['number' => 5]);
        $this->assertResponseRedirects('/api/deck/draw/5');
    }
}
