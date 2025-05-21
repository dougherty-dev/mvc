<?php

/**
 * DealHoleCards class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker as Poker;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Entity\Community;
use App\Entity\Players;

/**
 * The DealHoleCards class.
 */
class DealHoleCards
{
    /**
     * Deal two hole cards to each player, in totem 6 cards.
     * @param Player[] $players
     */
    public function deal(
        ObjectManager $entityManager,
        array $players,
        Poker\Community $community
    ): void {

        (new DealHoleCardsHelper())->dealHoleCards($players, $community->getDeck()->drawCards(6));

        $entityCommunity = $entityManager->getRepository(Community::class)->findAll()[0];
        $entityCommunity->setStatus($community->getState()->nextState()->value)
            ->setDeck($community->getDeck()->deckIntValues());

        $entityPlayers = $entityManager->getRepository(Players::class)->findBy([], ['handle' => 'ASC']);
        foreach ($entityPlayers as $player) {
            if ($player->getLatestAction() != PlayerStates::Out->value) {
                $player->setHand($players[$player->getHandle()]->getHand()->handIntvalues());

                $entityManager->persist($player);
                $entityManager->flush();
            }
        }

        $entityManager->persist($entityCommunity);
        $entityManager->flush();
    }
}
