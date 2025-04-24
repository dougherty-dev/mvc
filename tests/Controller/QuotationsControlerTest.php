<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/** Test cases for class QuotationsController. */
class QuotationsControllerTest extends WebTestCase
{
    /** Test route /api/quotation */
    public function testAPIDeck(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/quotation');
        $this->assertResponseIsSuccessful();
    }
}
