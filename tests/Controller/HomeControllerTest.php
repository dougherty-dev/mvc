<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/** Test cases for class HomeController. */
class HomeControllerTest extends WebTestCase
{
    /** Test route / */
    public function testHome(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }

    /** Test route /about */
    public function testAbout(): void
    {
        $client = static::createClient();
        $client->request('GET', '/about');
        $this->assertResponseIsSuccessful();
    }

    /** Test route /report */
    public function testReport(): void
    {
        $client = static::createClient();
        $client->request('GET', '/report');
        $this->assertResponseIsSuccessful();
    }

    /** Test route /lucky */
    public function testLucky(): void
    {
        $client = static::createClient();
        $client->request('GET', '/lucky');
        $this->assertResponseIsSuccessful();
    }

    /** Test route /api */
    public function testAPI(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api');
        $this->assertResponseIsSuccessful();
    }
}
