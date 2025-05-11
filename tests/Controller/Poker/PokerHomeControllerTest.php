<?php

/**
 * Poker home controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\PokerHomeController;
use App\Controller\Poker\PokerSessionController;

/**
 * Test cases for class PokerHomeController.
 */
class PokerHomeControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testPokerHomeController(): void
    {
        $cls = new PokerHomeController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\PokerHomeController", $cls);

        $cls = new PokerSessionController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\PokerSessionController", $cls);
    }

    /**
     * Test route /proj
     */
    public function testProj(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test route /proj/about
     */
    public function testAbout(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/about');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test route /proj/session
     */
    public function testSession(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/session');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test route /proj/reset
     */
    public function testReset(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/reset');
        $this->assertResponseIsSuccessful();
    }
}
