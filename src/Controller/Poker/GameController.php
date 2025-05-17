<?php

/**
 * GameController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\GameStates;

/**
 * The GameController class.
 */
class GameController extends SessionController
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
            GameStates::NewGame => ['Dela kort', 'preflop', 'proj_poker_round'],
            GameStates::PreFlop => ['Fortsätt', 'preflop', 'proj_poker_round'],
            GameStates::Flop => ['Fortsätt', 'flop', 'proj_poker_round'],
            GameStates::Turn => ['Fortsätt', 'turn', 'proj_poker_round'],
            GameStates::River => ['Fortsätt', 'river', 'proj_poker_round'],
            GameStates::Showdown => ['Nästa runda', 'showdown', 'proj_poker_next'],
            GameStates::EndGame => ['Nytt spel', 'endgame', 'proj_reset'],
        };

        $data = [
            "community" => $community,
            "players" => $players,
            "action" => $action
        ];

        return $this->render('poker/poker.html.twig', $data);
    }
}
