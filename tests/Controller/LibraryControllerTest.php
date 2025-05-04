<?php

/**
 * Library controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Book;

/** Test cases for class LibraryController. */
class LibraryControllerTest extends WebTestCase
{
    /** Test route /library */
    public function testLibrary(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library');
        $this->assertResponseIsSuccessful();
    }

    /** Test route /library/view */
    public function testLibraryView(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library/view');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Böcker');
    }

    /** Test route /library/view/id */
    public function testLibraryViewId(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library/view/1');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/library/view/0');
        $this->assertResponseRedirects('/library/view');
    }

    /** Test route /library/edit/id */
    public function testLibraryEditId(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library/edit/1');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/library/edit/0');
        $this->assertResponseRedirects('/library/view');
    }

    /** Test route /library/new */
    public function testLibraryNew(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library/new');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Ny bok');
    }

    /** Test route /library/reset */
    public function testLibraryReset(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library/reset');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Återställ bibliotek');
    }

    /** Test route api/library/books */
    public function testAPILibraryBooks(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/library/books');
        $response = $client->getResponse();
        $this->assertJson((string) $response->getContent());
    }

    /** Test route api/library/book/{isbn} */
    public function testAPILibraryBookISBN(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/library/book/9780380807345');
        $response = $client->getResponse();
        $this->assertJson((string) $response->getContent());

        $client->request('GET', '/api/library/book/01234567890123');
        $response = $client->getResponse();
        $this->assertJson((string) $response->getContent());
    }
}
