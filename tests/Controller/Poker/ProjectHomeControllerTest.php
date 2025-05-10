<?php

/**
 * Home controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\ProjectHomeController;
use App\Controller\Poker\PokerSessionController;

/**
 * Test cases for class HomeController.
 */
class ProjectHomeControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testProjectHomeController(): void
    {
        $cls = new ProjectHomeController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\ProjectHomeController", $cls);

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
     * Test route /proj/poker
     */
    public function testPoker(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/poker');
        $this->assertResponseIsSuccessful();
    }
}
