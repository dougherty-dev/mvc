<?php

/**
 * SetBadges class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Hand;
use App\Entity\Players;

/**
 * The SetBadges class.
 */
class SetBadges
{
    /**
     * Update player boolean variables for badges and hand.
     * Also post small and big blinds, collecting from cash
     */
    public function updatePlayers(
        ObjectManager $entityManager,
        Hand $hand,
        int $dealer,
        int $smallBlind,
        int $bigBlind
    ): void {
        $entityPlayers = $entityManager->getRepository(Players::class)->findAll();

        $playersController = new FetchPlayers();
        $players = $playersController->fetchPlayers($entityManager);

        $dealerHelper = new DealOrder();
        $dealOrder = $dealerHelper->dealOrder($players);

        foreach ($dealOrder as $key) {
            $handle = $entityPlayers[$key]->getHandle();

            /**
             * Post small and big blinds according to game level
             */
            $bet = match (true) {
                $handle === $smallBlind => 2,
                $handle === $bigBlind => 4,
                default => 0
            };

            $cash = $entityPlayers[$key]->getCash() - $bet;

            $entityPlayers[$key]->setDealer($handle === $dealer)
                ->setSmallBlind($handle === $smallBlind)
                ->setBigBlind($handle === $bigBlind)
                ->setBet($bet)
                ->setCash($cash)
                ->setHand([$hand->getHand()[$handle]->getCard()]);

            $entityManager->persist($entityPlayers[$key]);
            $entityManager->flush();
        }
    }
}
