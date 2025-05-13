<?php

/**
 * PokerGamePreflopController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Preflop;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker as Poker;
use App\Entity as Entity;
use App\Controller\Poker\Helpers\PokerFetchCommunity;
use App\Controller\Poker\Helpers\PokerFetchPlayers;
use App\Controller\Poker\Helpers\PokerGameGetDeck;

/**
 * The PokerGamePreflopController class.
 */
class PokerGamePreflopController extends AbstractController
{
    /**
     * POST route for preflop.
     * Dealer deals one card to each player, twice, from fresh deck.
     * Cards are facing downward. Player left to big blind begins betting.
     * If player is computer, perform automatic betting, else interrupt for input.
     * Betting begins at 4, and can be raised by 4 two times.
     */
    #[Route("/proj/poker/preflop", name: "proj_poker_preflop", methods: ['POST'])]
    public function projPokerPreflop(ManagerRegistry $doctrine): Response
    {
        $communityController = new PokerFetchCommunity();
        $community = $communityController->fetchCommunity($doctrine);
        $hand = $community->getDeck()->drawCards(6);

        $playersController = new PokerFetchPlayers();
        $players = $playersController->fetchPlayers($doctrine);

        $hand = $community->getHand();

        $current = -1;
        foreach ($players as $key => $player) {
            if ($player->isBigBlind()) {
                $current = $key;
                break;
            }
        }

        $order = [($current + 1) % 3, ($current + 2) % 3, ($current + 3) % 3];
        $playerOrdered = array_combine($order, $players);
        foreach ($playerOrdered as $key => $player) {
            $playerHand = array_map(fn ($card): int => $card->getValue() % $key, $hand->getHand());
            $hand->emptyHand();
            $hand->addToHand($playerHand);
            $player->setHand($hand);
        }


        return $this->redirectToRoute('proj_poker');
    }
}
