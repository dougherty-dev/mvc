<?php

/**
 * Game process controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** The GameProcessController class. */
class GameProcessController extends GameController
{
    /** POST route for resetting game after finishing a round. */
    #[Route("/game/over/process", name: "game_over_process", methods: ['POST'])]
    public function gameOverProcess(): Response
    {
        $this->checkSession();
        $this->game->init();
        $this->game->deck->shuffleDeck();
        return $this->redirectToRoute('game');
    }

    /** POST route for handling options during the game. */
    #[Route("/game/options/process", name: "game_options_process", methods: ['POST'])]
    public function gameOptionsProcess(Request $request): Response
    {
        if ($request->request->get('options')) {
            $this->checkSession();

            $this->setChecked($request, 'bankIntelligence');
            $this->setChecked($request, 'showDeck');

            $this->session->set("game", $this->game);
        }

        return $this->redirectToRoute('game_dojo');
    }

    /** Helper for setting option value. */
    private function setChecked(Request $request, string $option): void
    {
        $this->game->__set($option, $request->request->get($option) ? ' checked' : '');
    }
}
