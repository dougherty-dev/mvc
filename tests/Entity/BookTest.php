<?php

/**
 * Book test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use RangeException;
use App\Entity\Book;

/** Test cases for class Book. */
class BookTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $book = new Book();
        $this->assertInstanceOf("\App\Entity\Book", $book);

        $id = rand(0, 1000);
        $book->setId($id);
        $getId = $book->getId();
        $this->assertEquals($id, $getId);

        $title = md5(strval(mt_rand()));
        $book->setTitle($title);
        $getTitle = $book->getTitle();
        $this->assertEquals($title, $getTitle);

        $author = md5(strval(mt_rand()));
        $book->setAuthor($author);
        $getAuthor = $book->getAuthor();
        $this->assertEquals($author, $getAuthor);

        $isbn = md5(strval(mt_rand()));
        $book->setIsbn($isbn);
        $getIsbn = $book->getIsbn();
        $this->assertEquals($isbn, $getIsbn);

        $image = md5(strval(mt_rand()));
        $book->setImage($image);
        $getImage = $book->getImage();
        $this->assertEquals($image, $getImage);
    }
}
