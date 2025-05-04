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

class GameController extends AbstractController
{
    protected RequestStack $requestStack;
    protected GameActions $game;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /** Route for introduction page. */
    #[Route("/game", name: "game")]
    public function game(): Response
    {
        return $this->render('game/game.html.twig');
    }

    /** Route for documentation page. */
    #[Route("/game/doc", name: "game_doc")]
    public function gameDoc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    /** Route for the game arena, which is the primary view. */
    #[Route("/game/dojo", name: "game_dojo")]
    public function gameDojo(): Response
    {
        $this->checkSession();
        return $this->render('game/dojo.html.twig');
    }

    /** Protected method for handling session data. */
    protected function checkSession(): void
    {
        $session = $this->requestStack->getSession();

        if (!$session->get("game")) {
            $game = new GameActions();
            $session->set("deck_values", $game->deck->deckValues());
            $session->set("deck_text_values", $game->deck->deckTextValues());

            $game->deck->shuffleDeck();
            foreach ($game->players as $player) {
                $player->__set('score', $player->handScore->bestScore($player->hand));
            }
            $session->set("game", $game);
        }

        $this->game = new GameActions();
        if (is_object($session->get("game")) && is_a($session->get("game"), 'App\Game21\GameActions')) {
            $this->game = $session->get("game");
        }
    }
}
