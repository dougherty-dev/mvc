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
     * Save betorder.
     * @param int[] $betorder
     */
    public function saveBetorder(array $betorder): void
    {
        $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
        $this->entityCommunity->setBetorder($betorder);
        $this->save();
    }

    /**
     * Save pot.
     */
    public function savePot(int $pot): void
    {
        $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
        $this->entityCommunity->setPot($pot);
        $this->save();
    }

    /**
     * Save state.
     */
    public function saveState(int $status): void
    {
        $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
        $this->entityCommunity->setStatus($status);
        $this->save();
    }

    /**
     * Save discarded cards.
     * @param int[] $discarded
     */
    public function saveDiscarded(array $discarded): void
    {
        $this->entityCommunity = $this->entityManager->getRepository(Community::class)->findAll()[0];
        $this->entityCommunity->setDiscarded($discarded);
        $this->save();
    }

    /**
     * Save to database.
     */
    private function save(): void
    {
        $this->entityManager->persist($this->entityCommunity);
        $this->entityManager->flush();
    }
}
