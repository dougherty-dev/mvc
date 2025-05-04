<?php

/**
 * Game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Game21\GameActions;

class GameProcessController extends GameController
{
    protected RequestStack $requestStack;
    protected GameActions $game;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /** POST route for player drawing a card. */
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

        $session = $this->requestStack->getSession();
        $session->set("game", $this->game);
        return $this->redirectToRoute('game_dojo');
    }

    /** POST route for player making a bet. */
    #[Route("/game/player/bets/process", name: "game_player_bets_process", methods: ['POST'])]
    public function gamePlayerBetsProcess(Request $request): Response
    {
        $this->checkSession();
        if ($request->request->get('bet')) {
            $bet = intval($request->request->get('bet'));
            $this->game->playerBets($bet);
            $session = $this->requestStack->getSession();
            $session->set("game", $this->game);
        }

        return $this->redirectToRoute('game_dojo');
    }

    /** POST route for confirmation of winning player. */
    #[Route("/game/player/wins/process", name: "game_player_wins_process", methods: ['POST'])]
    public function gamePlayerWinsProcess(Request $request): Response
    {
        $this->checkSession();
        if ($request->request->get('continue')) {
            $this->game->continueGame();
        }

        return $this->redirectToRoute('game_dojo');
    }

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
        $this->checkSession();
        if ($request->request->get('options')) {
            $this->game->__set('bankIntelligence', $request->request->get('bankIntelligence') ? ' checked' : '');
            $this->game->__set('showDeck', $request->request->get('showDeck') ? ' checked' : '');
            $session = $this->requestStack->getSession();
            $session->set("game", $this->game);
        }
        return $this->redirectToRoute('game_dojo');
    }
}
