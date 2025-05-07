<?php

/**
 * Repository class for ORM book library.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Book;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * Reset book table.
     */
    public function truncateTable(): void
    {
        $connection = $this->getEntityManager()->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeStatement($platform->getTruncateTableSQL('book', true));
    }

    /**
     * Find previous and next records of id.
     *
     * @return int[]
     */
    public function adjacentRecords(int $id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $res = [];
        $sqlStmt = [
            "SELECT `id` FROM `book` WHERE `id` = (SELECT MAX(`id`) FROM `book` WHERE `id` < $id)",
            "SELECT `id` FROM `book` WHERE `id` = (SELECT MIN(`id`) FROM `book` WHERE `id` > $id)"
        ];

        foreach ($sqlStmt as $sql) {
            $response = $connection->executeQuery($sql, ['id' => $id])
                ->fetchAllAssociative()[0]['id'] ?? 0;

            $res[] = is_int($response) ? $response : 0;
        }

        return $res;
    }

    /**
     * Find book from ISBN.
     */
    public function findBookFromIsbn(string $isbn): ?Book
    {
        $res = $this->createQueryBuilder('b')
            ->andWhere('b.isbn = :val')
            ->setParameter('val', $isbn)
            ->getQuery()
            ->getOneOrNullResult()
        ;
        return $res instanceof Book ? $res : null;
    }
}
