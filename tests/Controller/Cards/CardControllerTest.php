<?php

/**
 * Card controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Cards;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Cards\Deck;
use App\Controller\Cards\CardController;
use App\Controller\Cards\CardSessionDeckController;
use App\Controller\Cards\CardSessionController;
use App\Controller\Cards\CardDrawController;
use App\Controller\Cards\CardDealController;

/**
 * Test cases for class CardController.
 */
class CardControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testCardController(): void
    {
        $cls = new CardController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardController", $cls);

        $cls = new CardSessionDeckController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardSessionDeckController", $cls);

        $cls = new CardSessionController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardSessionController", $cls);

        $cls = new CardDrawController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardDrawController", $cls);

        $cls = new CardDealController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Cards\CardDealController", $cls);
    }

    /**
     * Test route /card
     */
    public function testCard(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Kortspel');
    }

    /**
     * Test route /card/deck and deck properties in session
     */
    public function testCardDeck(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Kortleken');

        $deck = new Deck();
        $deck->resetDeck();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if ($session->get("deck") instanceof Deck) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertEquals($session->get("deck_values"), $deck->deckValues());
        $this->assertEquals($session->get("deck_text_values"), $deck->deckTextValues());

        $sessionDeck->resetDeck();
        $this->assertEquals($sessionDeck, $deck);
    }

    /**
     * Test route /card/deck/reset
     */
    public function testCardDeckReset(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/reset');
        $this->assertResponseRedirects('/card/deck');
    }

    /**
     * Test route /card/deck/shuffle
     */
    public function testCardDeckShuffle(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/shuffle');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if ($session->get("deck") instanceof Deck) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(54, $sessionDeck->intValues());
    }

    /**
     * Test route /card/deck/draw
     */
    public function testCardDeckDraw(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/draw');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if ($session->get("deck") instanceof Deck) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(53, $sessionDeck->intValues());
    }

    /**
     * Test route /card/deck/draw/number
     */
    public function testCardDeckDrawNumber(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/draw/5');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if ($session->get("deck") instanceof Deck) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(49, $sessionDeck->intValues());
    }

    /**
     * Test route /card/deck/deal/players/cards
     */
    public function testCardDeckDealPlayersCards(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/deal/3/5');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = new Deck();
        if ($session->get("deck") instanceof Deck) {
            $sessionDeck = $session->get("deck");
        }

        $this->assertCount(39, $sessionDeck->intValues());
    }
}
