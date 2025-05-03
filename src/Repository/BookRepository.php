<?php

declare (strict_types=1);

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function truncateTable(): void
    {
        $connection = $this->getEntityManager()->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeUpdate($platform->getTruncateTableSQL('book', true));
    }

    /**
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
                ->fetchAllAssociative()[0]['id'] ?? null;

            $res[] = is_int($response) ? $response : 0;
        }

        return $res;
    }

    //    /**
    //     * @return Book[] Returns an array of Book objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Book
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
