<?php

/**
 * Game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Game21;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The GameController class.
 */
class GameController extends GameSessionController
{
    /**
     * Route for game landing page.
     */
    #[Route("/game", name: "game")]
    public function game(): Response
    {
        return $this->render('game/game.html.twig');
    }

    /**
     * Route for documentation page.
     */
    #[Route("/game/doc", name: "game_doc")]
    public function gameDoc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    /**
     * Route for the game arena, the primary view.
     */
    #[Route("/game/dojo", name: "game_dojo")]
    public function gameDojo(): Response
    {
        $this->checkSession();
        return $this->render('game/dojo.html.twig');
    }
}
