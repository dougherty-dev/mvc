<?php

/**
 * UpdatePlayers class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ManagerRegistry;
use App\Poker\Hand;
use App\Entity\Players;

/**
 * The UpdatePlayers class.
 */
class UpdatePlayers
{
    /**
     * Update player boolean variables for badges and hand.
     */
    public function updatePlayers(
        ManagerRegistry $doctrine,
        Hand $hand,
        int $dealer,
        int $smallBlind,
        int $bigBlind
    ): void {
        $entityManager = $doctrine->getManager();
        $entityPlayers = $entityManager->getRepository(Players::class)->findAll();

        $playersController = new FetchPlayers();
        $players = $playersController->fetchPlayers($doctrine);

        $dealerHelper = new DealOrder();
        $dealOrder = $dealerHelper->dealOrder($players);

        foreach ($dealOrder as $key) {
            $handle = $entityPlayers[$key]->getHandle();

            $entityPlayers[$key]->setDealer($handle === $dealer)
                ->setSmallBlind($handle === $smallBlind)
                ->setBigBlind($handle === $bigBlind)
                ->setHand([$hand->getHand()[$handle]->getCard()]);

            $entityManager->persist($entityPlayers[$key]);
            $entityManager->flush();
        }
    }
}
