<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Cards\Deck;

/** Test cases for class CardAPIController. */
class CardAPIControllerTest extends WebTestCase
{
    /** Test route /api/deck and deck properties in session */
    public function testAPIDeck(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/deck');
        $this->assertResponseIsSuccessful();

        $deck = new Deck();
        $deck->resetDeck();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if (is_object($session->get("deck")) && is_a($session->get("deck"), 'App\Cards\Deck')) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertEquals($session->get("deck_values"), $deck->deckValues());
        $this->assertEquals($session->get("deck_text_values"), $deck->deckTextValues());

        $sessionDeck->resetDeck();
        $this->assertEquals($sessionDeck, $deck);
    }

    /** Test route /api/deck/shuffle */
    public function testAPIDeckShuffle(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/shuffle');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if (is_object($session->get("deck")) && is_a($session->get("deck"), 'App\Cards\Deck')) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(54, $sessionDeck->intValues());
    }

    /** Test route /api/deck/draw */
    public function testAPIDeckDraw(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/draw');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if (is_object($session->get("deck")) && is_a($session->get("deck"), 'App\Cards\Deck')) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(53, $sessionDeck->intValues());
    }

    /** Test route /api/deck/draw/number */
    public function testAPIDeckDrawNumber(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/deck/draw/5');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if (is_object($session->get("deck")) && is_a($session->get("deck"), 'App\Cards\Deck')) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(49, $sessionDeck->intValues());
    }

    /** Test route /api/deck/draw/number */
    public function testAPIDeckDrawNumberPost(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/draw/5', ['number' => 5]);
        $this->assertResponseRedirects('/api/deck/draw/5');
    }

    /** Test route /api/deck/deal/players/cards */
    public function testAPIDeckDealPlayersCards(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/deck/deal/3/5');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if (is_object($session->get("deck")) && is_a($session->get("deck"), 'App\Cards\Deck')) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(39, $sessionDeck->intValues());
    }

    /** Test route /api/deck/deal/players/cards */
    public function testAPIDeckDealPlayersCardsPost(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/deal/3/5', ['players' => 3, 'cards' => 5]);
        $this->assertResponseRedirects('/api/deck/deal/3/5');
    }
}
