<?php

/**
 * Community test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ManagerRegistry;
use RangeException;
use App\Repository\CommunityRepository;

/**
 * Test cases for class CommunityRepository.
 */
class CommunityRepositoryTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $registry = $this->createMock(ManagerRegistry::class);
        $this->assertInstanceOf("\App\Repository\CommunityRepository", new CommunityRepository($registry));
    }
}
