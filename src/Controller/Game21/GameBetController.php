<?php

/**
 * Game bet controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Game21;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Game21\GameActionsBet;

/**
 * The GameBetController class.
 */
class GameBetController extends GameSessionController
{
    /**
     * POST route for player making a bet.
     */
    #[Route("/game/player/bets/process", name: "game_player_bets_process", methods: ['POST'])]
    public function gamePlayerBetsProcess(Request $request): Response
    {
        $this->checkSession();
        if ($request->request->get('bet')) {
            $bet = intval($request->request->get('bet'));
            $this->game->gaBet = new GameActionsBet();
            $this->game->gaBet->playerBets($bet, $this->game);
            $this->session->set("game", $this->game);
        }

        return $this->redirectToRoute('game_dojo');
    }
}
