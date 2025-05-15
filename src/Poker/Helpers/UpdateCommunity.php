<?php

/**
 * UpdateCommunity class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Entity\Community;

/**
 * The UpdateCommunity class.
 */
class UpdateCommunity
{
    private Community $entityCommunity;

    public function __construct(private ObjectManager $entityManager)
    {
        // $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
    }

    /**
     * Save raises.
     */
    public function saveRaises(int $raises): void
    {
        $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
        $this->entityCommunity->setRaises($raises);
        $this->save();
    }

    /**
     * Save to database.
     */
    private function save(): void
    {
        $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
        $this->entityManager->persist($this->entityCommunity);
        $this->entityManager->flush();
    }
}
