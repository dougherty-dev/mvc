<?php

/**
 * SetBadges class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Community;
use App\Poker\GameStates;
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
    public function set(
        ObjectManager $entityManager,
        Community $community,
        int $dealer,
        int $smallBlind,
        int $bigBlind
    ): void {
        $entityPlayers = $entityManager->getRepository(Players::class)->findAll();

        foreach ($entityPlayers as $player) {
            $handle = $player->getHandle();

            /**
             * Post small and big blinds according to game level.
             * Only on preflop.
             */
            $bet = match (true) {
                $handle === $smallBlind => 2,
                $handle === $bigBlind => 4,
                default => 0
            };

            $player->setDealer($handle === $dealer)
                ->setSmallBlind($handle === $smallBlind)
                ->setBigBlind($handle === $bigBlind);

            if ($community->getState() === GameStates::NewGame) {
                $cash = $player->getCash() - $bet;

                $player->setBet($bet)
                    ->setCash($cash);
            }

            $entityManager->persist($player);
            $entityManager->flush();
        }
    }
}
