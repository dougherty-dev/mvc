<?php

/**
 * Card API controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Cards;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Cards\Deck;
use App\Controller\Cards\CardAPIDeckController;

/**
 * Test cases for class CardAPIDeckController.
 */
class CardAPIDeckControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testCardAPIController(): void
    {
        $cls = new CardAPIDeckController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardAPIDeckController", $cls);
    }

    /**
     * Test route /api/deck and deck properties in session
     */
    public function testAPIDeck(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/deck');
        $this->assertResponseIsSuccessful();

        $deck = new Deck();
        $deck->resetDeck();

        $session = $client->getRequest()->getSession();
        $sessionDeck = $this->fetchSessionDeck($session);

        $this->assertEquals($session->get("deck_values"), $deck->deckValues());
        $this->assertEquals($session->get("deck_text_values"), $deck->deckTextValues());

        $sessionDeck->resetDeck();
        $this->assertEquals($sessionDeck, $deck);
    }

    /**
     * Test route /api/deck/shuffle
     */
    public function testAPIDeckShuffle(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/shuffle');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = $this->fetchSessionDeck($session);

        $this->assertCount(54, $sessionDeck->intValues());
    }

    protected function fetchSessionDeck(SessionInterface $session): Deck
    {
        $sessionDeck = new Deck();
        if ($session->get("deck") instanceof Deck) {
            $sessionDeck = $session->get("deck");
        }
        return $sessionDeck;
    }
}
