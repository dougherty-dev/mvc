<?php

/**
 * UpdatePlayer class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Entity\Players;

/**
 * The UpdatePlayer class.
 */
class UpdatePlayer
{
    private Players $entityPlayer;

    public function __construct(private ObjectManager $entityManager)
    {
    }

    /**
     * Save player bet.
     */
    public function saveBet(int $id, int $bet): void
    {
        $this->setPlayer($id);
        $this->entityPlayer->setBet($bet);
        $this->save();
    }

    /**
     * Save player cash.
     */
    public function saveCash(int $id, int $cash): void
    {
        $this->setPlayer($id);
        $this->entityPlayer->setCash($cash);
        $this->save();
    }

    /**
     * Save player bet.
     */
    public function saveState(int $id, int $state): void
    {
        $this->setPlayer($id);
        $this->entityPlayer->setLatestAction($state);
        $this->save();
    }

    /**
     * Get player from repository.
     */
    private function setPlayer(int $id): void
    {
        $player = $this->entityManager->getRepository(Players::class)->find($id);
        if ($player instanceof Players) {
            $this->entityPlayer = $player;
        }
    }

    /**
     * Save to database.
     */
    private function save(): void
    {
        $this->entityManager->persist($this->entityPlayer);
        $this->entityManager->flush();
    }
}
