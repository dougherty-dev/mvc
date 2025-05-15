<?php

/**
 * Poker game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Poker\PokerSessionController;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\GameStates;

/**
 * The PokerGameController class.
 */
class PokerGameController extends PokerSessionController
{
    /**
     * The route for the poker game page.
     */
    #[Route("/proj/poker", name: "proj_poker")]
    public function projPoker(ManagerRegistry $doctrine): Response
    {
        $this->checkSession();
        $entityManager = $doctrine->getManager();

        $pokerCommunity = new FetchCommunity();
        $community = $pokerCommunity->fetchCommunity($entityManager);

        $pokerPlayers = new FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($entityManager);

        $action = match ($community->getState()) {
            GameStates::None => ['Spela', 'spela', 'proj_poker_begin'],
            GameStates::NewGame => ['Dela kort', 'preflop', 'proj_poker_preflop'],
            GameStates::PreFlop => ['Satsa', 'preflop', 'proj_poker_preflop'],
            GameStates::Flop => ['Satsa', 'flop', 'proj_poker'],
            GameStates::Turn => ['Satsa', 'turn', 'proj_poker'],
            GameStates::River => ['Satsa', 'river', 'proj_poker'],
            GameStates::Showdown => ['Nästa runda', 'showdown', 'proj_poker'],
            GameStates::EndGame => ['Nytt spel', 'endgame', 'proj_poker'],
        };

        $data = [
            "community" => $community,
            "players" => $players,
            "action" => $action
        ];

        return $this->render('poker/poker.html.twig', $data);
    }
}
