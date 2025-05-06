<?php

/**
 * Quotations controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\QuotationsController;

/**
 * Test cases for class QuotationsController.
 */
class QuotationsControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testQuotationsController(): void
    {
        $this->assertInstanceOf("\App\Controller\QuotationsController", new QuotationsController());
    }

    /**
     * Test route /api/quotation
     */
    public function testAPIDeck(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/quotation');
        $this->assertResponseIsSuccessful();
    }
}
