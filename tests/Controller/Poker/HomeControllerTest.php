<?php

/**
 * HomeControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\HomeController;
use App\Controller\Poker\SessionController;
use App\Kernel;

/**
 * Test cases for class HomeController.
 */
class HomeControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHomeController(): void
    {
        $cls = new HomeController();
        $this->assertInstanceOf("\App\Controller\Poker\HomeController", $cls);

        $cls = new SessionController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\Poker\SessionController", $cls);
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
     * Test route /proj/reset
     */
    public function testReset(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/reset');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test route /proj/about/database
     */
    public function testAboutDatabase(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/about/database');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Test route /proj/api
     */
    public function testAPI(): void
    {
        $client = static::createClient();
        $client->request('GET', '/proj/api');
        $this->assertResponseIsSuccessful();
    }
}
