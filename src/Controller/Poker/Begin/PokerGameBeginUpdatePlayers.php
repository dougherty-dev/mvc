<?php

/**
 * Poker game begin controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Begin;

use Doctrine\Persistence\ObjectManager;
use App\Poker as Poker;
use App\Entity as Entity;
use App\Controller\Poker\Begin as Controller;

/**
 * The PokerGameBeginController class.
 */
class PokerGameBeginUpdatePlayers
{
    /**
     * Update player boolean variables for badges and hand.
     */
    public function updatePlayers(
        ObjectManager $entityManager,
        Poker\Hand $hand,
        int $dealer,
        int $smallBlind,
        int $bigBlind
    ): void {
        $entityPlayers = $entityManager->getRepository(Entity\Players::class)->findAll();
        foreach ($entityPlayers as $player) {
            $handle = $player->getHandle();

            $player->setDealer($handle === $dealer)
                ->setSmallBlind($handle === $smallBlind)
                ->setBigBlind($handle === $bigBlind)
                ->setHand([$hand->getHand()[$handle]->getCard()]);

            $entityManager->persist($player);
            $entityManager->flush();
        }
    }
}
