<?php

/**
 * Game player controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Game21;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Game21\GameFoundation;

/**
 * The GamePlayerController class.
 */
class GamePlayerController extends GameSessionController
{
    /**
     * POST route for player drawing a card.
     */
    #[Route("/game/player/draws/process", name: "game_player_draws_process", methods: ['POST'])]
    public function gamePlayerDrawsProcess(Request $request): Response
    {
        $this->checkSession();
        $id = intval($request->request->get('player'));
        if ($request->request->get('draw')) {
            $this->game->playerDraws($id);
        }

        if ($request->request->get('stay')) {
            $this->game->playerDraws(1); // Shift to bank
        }

        $this->session->set("game", $this->game);
        return $this->redirectToRoute('game_dojo');
    }
}
