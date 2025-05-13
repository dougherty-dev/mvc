<?php

/**
 * Poker game begin controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Begin;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker as Poker;
use App\Entity as Entity;
use App\Controller\Poker\Helpers\PokerGameGetDeck;

/**
 * The PokerGameBeginController class.
 */
class PokerGameBeginController extends AbstractController
{
    /**
     * POST route for beginning game.
     * Dealer shuffles deck, gives one open card to each player.
     * Card with highest value becomes dealer. If tie, highest suit wins.
     * Deck is reset and shuffled for preflop.
     */
    #[Route("/proj/poker/begin", name: "proj_poker_begin", methods: ['POST'])]
    public function projPokerBegin(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $entityCommunity = $entityManager->getRepository(Entity\Community::class)->findAll()[0];

        $deckHelper = new PokerGameGetDeck();
        $deck = $deckHelper->getDeck($entityCommunity);
        $deck->shuffleDeck();
        $hand = $deck->drawCards(3);

        $badges = new PokerGameBeginDetermineBadges();
        [$dealer, $smallBlind, $bigBlind] = $badges->determineBadges($hand);

        $players = new PokerGameBeginUpdatePlayers();
        $players->updatePlayers($entityManager, $hand, $dealer, $smallBlind, $bigBlind);

        $deck->resetDeck();
        $deck->shuffleDeck();

        $entityCommunity->setStatus(10)
            ->setDeck($deck->deckIntValues());

        $entityManager->persist($entityCommunity);
        $entityManager->flush();

        return $this->redirectToRoute('proj_poker');
    }
}
