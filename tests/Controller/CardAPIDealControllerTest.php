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
use App\Controller\CardAPIDealController;

/** Test cases for class CardAPIDealControllerTest. */
class CardAPIDealControllerTest extends CardAPIDeckControllerTest
{
    /** Test instantiation of the class itself. */
    public function testCardAPIController(): void
    {
        $cls = new CardAPIDealController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\CardAPIDealController", $cls);
    }

    /** Test route /api/deck/deal/players/cards */
    public function testAPIDeckDealPlayersCards(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/deck/deal/3/5');
        $this->assertResponseIsSuccessful();

        $session = $client->getRequest()->getSession();
        $sessionDeck = $this->fetchSessionDeck($session);

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
