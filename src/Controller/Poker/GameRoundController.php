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
use App\Poker\Round\BettingLoop;
use App\Poker\Round\DealCards;
use App\Poker\Round\RoundDone;
use App\Poker\GameStates;

/**
 * The GameRoundController class.
 * @SuppressWarnings("StaticAccess")
 */
class GameRoundController extends SessionController
{
    /**
     * POST route for preflop, flop, turn and river betting rounds.
     */
    #[Route("/proj/poker/round", name: "proj_poker_round", methods: ['POST'])]
    public function projPokerRound(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->checkSession();
        $entityManager = $doctrine->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);

        $updateCommunity = new UpdateCommunity($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);

        (new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity))->deal();

        if ((new BettingLoop())->doLoop($request, $players, $community, $updatePlayer, $updateCommunity)) {
            return $this->redirectToRoute('proj_poker');
        }

        /**
         * Check if round is done, collect bets, do next state.
         */
        $roundDone = new RoundDone();
        if ($roundDone->isDone($this->session, $entityManager, $players, $community, $updatePlayer, $updateCommunity)) {
            (new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity))->deal();
        }

        return $this->redirectToRoute('proj_poker');
    }
}
