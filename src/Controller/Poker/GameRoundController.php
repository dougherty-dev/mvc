<?php

/**
 * GameRoundController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
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
use App\Poker\Round\Folds;

/**
 * The GameRoundController class.
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
        $this->session->set("winner", "");
        $entityManager = $doctrine->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);

        $updateCommunity = new UpdateCommunity($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);

        if ((new Folds())->check($this->session, $players, $community, $updatePlayer, $updateCommunity)) {
            return $this->redirectToRoute('proj_poker_next');
        }

        (new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity))->deal();

        if ((new BettingLoop())->doLoop($request, $players, $community, $updatePlayer, $updateCommunity)) {
            return $this->redirectToRoute('proj_poker');
        }

        if ((new RoundDone())->isDone($this->session, $entityManager, $players, $community, $updatePlayer, $updateCommunity)) {
            (new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity))->deal();
        }

        return $this->redirectToRoute('proj_poker');
    }
}
