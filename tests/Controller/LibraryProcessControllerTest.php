<?php

/**
 * Library process controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Controller\LibraryAddController;
use App\Controller\LibraryDeleteController;
use App\Controller\LibraryUpdateController;
use App\Entity\Book;
use App\Repository\BookRepository;

/** Test cases for class LibraryAddController. */
class LibraryAddControllerTest extends WebTestCase
{
    /** Helper function for generating random strings. */
    private function randString(int $chars = 0): string
    {
        $randString = md5(microtime(true).mt_Rand());
        return $chars ? substr($randString, 0, $chars) : $randString;
    }

    /** Reset DB. */
    private function resetDB(): KernelBrowser
    {
        $client = static::createClient();
        $client->request('POST', '/library/reset/post');
        return $client;
    }

    /** Test instantiation of the class itself. */
    public function testLibraryAddController(): void
    {
        $cls = new LibraryAddController();
        $this->assertInstanceOf("\App\Controller\LibraryAddController", $cls);

        $cls = new LibraryDeleteController();
        $this->assertInstanceOf("\App\Controller\LibraryDeleteController", $cls);

        $cls = new LibraryUpdateController();
        $this->assertInstanceOf("\App\Controller\LibraryUpdateController", $cls);
    }

    /** Test all process routes, using test DB. */
    public function testLibraryProcess(): void
    {
        $client = $this->resetDB();
        $this->assertResponseRedirects("/library/view");

        /** Count books in library. */
        $client->request('GET', '/api/library/books');
        $response = $client->getResponse();
        $content = (string) $response->getContent();
        $array = (array) json_decode($content, true);
        $this->assertJson($content);
        $this->assertEquals(5, count($array));
    }

    /** Test CRUD for library. */
    public function testLibraryCRUD(): void
    {
        $client = $this->resetDB();

        /** Add new book, id will be 6. */
        $title = $this->randString();
        $author = $this->randString();
        $isbn = $this->randString(13);
        $client->request('POST', '/library/new/post', [
            'title' => $title,
            'author' => $author,
            'isbn' => $isbn
        ]);
        $this->assertResponseStatusCodeSame(302);
        $this->assertResponseRedirects("/library/view/6");

        /** Update book with id = 6. */
        $client->request('POST', '/library/update', [
            'id' => 6,
            'title' => $this->randString(),
            'author' => $this->randString(),
            'isbn' => $this->randString(13)
        ]);
        $this->assertResponseRedirects("/library/view/6");

        /** Delete book with id = 6. */
        $client->request('POST', '/library/delete', [
            'id' => 6
        ]);
        $this->assertResponseRedirects("/library/view");
    }

    /** Test delete for library. */
    public function testLibraryDelete(): void
    {
        $client = $this->resetDB();

        /** Delete book with non-existing id = 7. */
        $client->request('POST', '/library/delete', [
            'id' => 7
        ]);
        $this->assertResponseRedirects("/library/view");

        /** Delete book from confirmation page. */
        $client->request('POST', '/library/delete/confirm', [
            'id' => 2
        ]);
        $this->assertResponseIsSuccessful();

        /** Delete book with id = 4 and follow redirect to book list view. */
        $client->followRedirects(true);
        $client->request('POST', '/library/delete', [
            'id' => 4
        ]);
        $this->assertResponseIsSuccessful();
    }

    /** Test update for library. */
    public function testLibraryUpdate(): void
    {
        $client = $this->resetDB();

        /** Update book with non-existing id = 8. */
        $client->request('POST', '/library/update', [
            'id' => 8,
            'title' => $this->randString(),
            'author' => $this->randString(),
            'isbn' => $this->randString(13)
        ]);
        $this->assertResponseRedirects("/library/view");
    }
}
