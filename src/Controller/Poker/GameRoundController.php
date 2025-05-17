<?php

/**
 * GameRoundController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\HandleComputerBet;
use App\Poker\Round\DealCards;
use App\Poker\Round\HumanPlayer;
use App\Poker\Round\RoundDone;
use App\Poker\GameStates;

/**
 * The GameRoundController class.
 * @SuppressWarnings("StaticAccess")
 */
class GameRoundController extends AbstractController
{
    /**
     * POST route for preflop, flop, turn and river betting rounds.
     */
    #[Route("/proj/poker/round", name: "proj_poker_round", methods: ['POST'])]
    public function projPokerRound(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $pokerCommunity = new FetchCommunity();
        $community = $pokerCommunity->fetchCommunity($entityManager);

        $pokerPlayers = new FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($entityManager);

        $updateCommunity = new UpdateCommunity($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);

        $dealCards = new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity);
        $dealCards->deal();

        /**
         * Main loop for betting round, according to betting order.
         * Interrupt for human player and treat input when available.
         */
        $betorder = array_map('intval', $community->getBetorder());

        foreach ($betorder as $currentPlayer) {
            /**
             * Human player
             */
            if ($currentPlayer === 0) {
                $humanPlayer = new HumanPlayer();
                $res = $humanPlayer->handlePlayer($players, $community, $updatePlayer, $updateCommunity, $request);
                if ($res) {
                    return $this->redirectToRoute('proj_poker');
                }
            }

            /**
             * Computer player
             */
            if ($currentPlayer != 0) {
                $handleCB = new HandleComputerBet();
                $handleCB->handleBet($players, $community, $updatePlayer, $updateCommunity, $currentPlayer);
            }

            array_shift($betorder);
            $community->setBetorder($betorder);
            $updateCommunity->saveBetorder($betorder);
        }

        /**
         * Check if round is done, collect bets, do next state.
         */
        $roundDone = new RoundDone();
        if ($roundDone->isDone($entityManager, $players, $community, $updatePlayer, $updateCommunity)) {
            $updateCommunity->saveState($community->getState()->nextState()->value);
        }

        return $this->redirectToRoute('proj_poker');
    }
}
