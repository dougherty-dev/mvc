<?php

/**
 * Book test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Entity;

use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ManagerRegistry;
use RangeException;
use App\Repository\BookRepository;

/** Test cases for class Book. */
class BookRepositoryTest extends TestCase
{
    /** Construct object with argument and verify that the object has the expected properties. */
    public function testCreateObject(): void
    {
        $registry = $this->createMock(ManagerRegistry::class);
        $library = new BookRepository($registry);
        $this->assertInstanceOf("\App\Repository\BookRepository", $library);
    }
}
