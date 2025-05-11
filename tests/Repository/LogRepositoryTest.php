<?php

/**
 * Log test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ManagerRegistry;
use RangeException;
use App\Repository\LogRepository;

/**
 * Test cases for class LogRepository.
 */
class LogRepositoryTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $registry = $this->createMock(ManagerRegistry::class);
        $this->assertInstanceOf("\App\Repository\LogRepository", new LogRepository($registry));
    }
}
