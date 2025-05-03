<?php

/**
 * Quotations controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/** Test cases for class QuotationsController. */
class LibraryControllerTest extends WebTestCase
{
    /** Test route /library */
    public function testLibrary(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library');
        $this->assertResponseIsSuccessful();
    }
}
