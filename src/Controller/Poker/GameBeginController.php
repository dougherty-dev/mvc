<?php

/**
 * GameBeginController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\GetDeck;
use App\Poker\Round\DealerLottery;
use App\Poker\Round\BeginSetBadges;
use App\Poker\Hand;
use App\Entity\Community;

/**
 * The GameBeginController class.
 */
class GameBeginController extends AbstractController
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
        $entityCommunity = $entityManager->getRepository(Community::class)->findAll()[0];

        $community = (new FetchCommunity())->fetchCommunity($entityManager);

        $deck = (new GetDeck())->getDeck($entityCommunity);
        $deck->shuffleDeck();
        $hand = $deck->drawCards(3);

        [$dealer, $smallBlind, $bigBlind] = (new DealerLottery())->determineDealer($hand);

        (new BeginSetBadges())->updateBadges($entityManager, $community, $hand, $dealer, $smallBlind, $bigBlind);

        $deck->resetDeck();
        $deck->shuffleDeck();

        $entityCommunity->setStatus($community->getState()->nextState()->value)
            ->setDeck($deck->deckIntValues())
            ->setHand([]);
        $community->setHand(new Hand());

        $entityManager->persist($entityCommunity);
        $entityManager->flush();

        return $this->redirectToRoute('proj_poker');
    }
}
