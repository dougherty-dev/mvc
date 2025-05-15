<?php

/**
 * Repository class for ORM poker community.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Repository;

use App\Entity\Community;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Community>
 */
class CommunityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Community::class);
    }

    /**
     * Reset community and players table.
     */
    public function truncateTables(): void
    {
        $connection = $this->getEntityManager()->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeStatement($platform->getTruncateTableSQL('community', true));
        $connection->executeStatement($platform->getTruncateTableSQL('players', true));
    }
}
