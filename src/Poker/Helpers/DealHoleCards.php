<?php

/**
 * DealHoleCards class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ManagerRegistry;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\PreflopDeal;
use App\Poker\Player;
use App\Entity\Community;
use App\Entity\Players;

/**
 * The DealHoleCards class.
 */
class DealHoleCards
{
    /**
     * Deal two hole cards to each player, in totem 6 cards.
     */
    public function deal(ManagerRegistry $doctrine): void
    {
        $entityManager = $doctrine->getManager();

        $pokerPlayers = new FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($doctrine);

        $pokerCommunity = new FetchCommunity();
        $community = $pokerCommunity->fetchCommunity($doctrine);

        $deal = new PreflopDeal();
        $deal->dealHoleCards($players, $community->getDeck()->drawCards(6));

        $entityCommunity = $entityManager->getRepository(Community::class)->findAll()[0];
        $entityCommunity->setStatus(20)
            ->setDeck($community->getDeck()->deckIntValues());

        $entityPlayers = $entityManager->getRepository(Players::class)->findAll();
        foreach ($entityPlayers as $player) {
            $player->setHand($players[$player->getHandle()]->getHand()->handIntvalues());

            $entityManager->persist($player);
            $entityManager->flush();
        }

        $entityManager->persist($entityCommunity);
        $entityManager->flush();
    }
}
