<?php

/**
 * Game continues controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Game21\GameActionsContinue;

/** The GameContinueController class. */
class GameContinueController extends GameController
{
    /** POST route for confirmation of winning player. */
    #[Route("/game/player/wins/process", name: "game_player_wins_process", methods: ['POST'])]
    public function gamePlayerWinsProcess(Request $request): Response
    {
        $this->checkSession();
        if ($request->request->get('continue')) {
            $this->game->gaContinue = new GameActionsContinue();
            $this->game->gaContinue->continueGame($this->game);
        }

        return $this->redirectToRoute('game_dojo');
    }
}
