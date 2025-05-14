<?php

/**
 * Poker game begin controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\GetDeck;
use App\Poker\Helpers\DetermineBadges;
use App\Poker\Helpers\UpdatePlayers;
use App\Poker as Poker;
use App\Entity as Entity;

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

        $deckHelper = new GetDeck();
        $deck = $deckHelper->getDeck($entityCommunity);
        $deck->shuffleDeck();
        $hand = $deck->drawCards(3);

        $badges = new DetermineBadges();
        [$dealer, $smallBlind, $bigBlind] = $badges->determineBadges($hand);

        $players = new UpdatePlayers();
        $players->updatePlayers($doctrine, $hand, $dealer, $smallBlind, $bigBlind);

        $deck->resetDeck();
        $deck->shuffleDeck();

        $entityCommunity->setStatus(10)
            ->setDeck($deck->deckIntValues());

        $entityManager->persist($entityCommunity);
        $entityManager->flush();

        return $this->redirectToRoute('proj_poker');
    }
}
