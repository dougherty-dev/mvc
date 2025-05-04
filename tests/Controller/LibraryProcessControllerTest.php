<?php

/**
 * Library process controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Book;
use App\Repository\BookRepository;
use App\Controller\LibraryProcessController;

/** Test cases for class LibraryProcessController. */
class LibraryProcessControllerTest extends WebTestCase
{
    private function randString(int $chars = 0): string
    {
        $randString = md5(microtime(true).mt_Rand());
        return $chars ? substr($randString, 0, $chars) : $randString;
    }

    /** Test instantiation of the class itself. */
    public function testLibraryProcessController(): void
    {
        $cls = new LibraryProcessController();
        $this->assertInstanceOf("\App\Controller\LibraryProcessController", $cls);
    }

    /** Test all process routes, using test DB. */
    public function testLibraryProcess(): void
    {
        /** Reset DB. */
        $client = static::createClient();
        $client->request('POST', '/library/reset/post');
        $this->assertResponseRedirects("/library/view");

        /** Count books in library. */
        $client->request('GET', '/api/library/books');
        $response = $client->getResponse();
        $content = (string) $response->getContent();
        $array = (array) json_decode($content, true);
        $this->assertJson($content);
        $this->assertEquals(5, count($array));

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
        $client->request('POST', '/library/update', [
            'id' => 6,
            'delete' => true
        ]);
        $this->assertResponseRedirects("/library/delete/6");

        /** Delete book with id = 4 and follow redirect to book list view. */
        $client->followRedirects(true);
        $client->request('POST', '/library/update', [
            'id' => 4,
            'delete' => true
        ]);
        $this->assertResponseIsSuccessful();
        $client->followRedirects(false);

        /** Delete book with non-existing id = 7. */
        $client->request('POST', '/library/update', [
            'id' => 7,
            'delete' => true
        ]);
        $this->assertResponseStatusCodeSame(404);

        /** Delete book with non-existing id = 7, direct method. */
        $client->request('GET', '/library/delete/7');
        $this->assertResponseStatusCodeSame(404);
    }
}
