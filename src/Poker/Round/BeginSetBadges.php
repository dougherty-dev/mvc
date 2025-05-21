<?php

/**
 * BeginSetBadges class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Community;
use App\Poker\Hand;
use App\Entity\Players;

/**
 * The BeginSetBadges class.
 */
class BeginSetBadges
{
    /**
     * Update player boolean variables for badges and hand.
     * Also post small and big blinds, collecting from cash
     */
    public function updateBadges(
        ObjectManager $entityManager,
        Community $community,
        Hand $hand,
        int $dealer,
        int $smallBlind,
        int $bigBlind
    ): void {
        $entityPlayers = $entityManager->getRepository(Players::class)->findAll();

        (new SetBadges())->set($entityManager, $community, $dealer, $smallBlind, $bigBlind);

        foreach ($entityPlayers as $player) {
            $handle = $player->getHandle();

            $player->setHand([$hand->getHand()[$handle]->getCard()]);
            $entityManager->persist($player);
            $entityManager->flush();
        }
    }
}
