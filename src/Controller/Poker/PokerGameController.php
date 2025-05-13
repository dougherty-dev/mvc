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
use App\Controller\Poker\Helpers\PokerFetchCommunity;
use App\Controller\Poker\Helpers\PokerFetchPlayers;
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

        $communityController = new PokerFetchCommunity();
        $community = $communityController->fetchCommunity($doctrine);

        $playersController = new PokerFetchPlayers();
        $players = $playersController->fetchPlayers($doctrine);

        $action = match($community->getState()) {
            GameStates::None => ['Spela', 'spela', 'proj_poker_begin'],
            GameStates::NewGame => ['Dela kort', 'preflop', 'proj_poker_preflop'],
            default => ['Odefinierat', 'odefinierat', 'proj_poker']
        };

        $data = [
            "community" => $community,
            "players" => $players,
            "action" => $action
        ];

        return $this->render('poker/poker.html.twig', $data);
    }
}
