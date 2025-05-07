<?php

/**
 * Game session controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Game21;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Game21\GameActions;

/**
 * The GameSessionController class.
 */
class GameSessionController extends AbstractController
{
    protected GameActions $game;
    protected SessionInterface $session;

    public function __construct(protected RequestStack $requestStack)
    {
    }

    /**
     * Protected method for handling session data.
     */
    protected function checkSession(): void
    {
        $this->session = $this->requestStack->getSession();
        if (!$this->session->get("game")) {
            $this->newSessionGame();
        }

        $this->game = new GameActions();
        if ($this->session->get("game") instanceof GameActions) {
            $this->game = $this->session->get("game");
        }
    }

    /**
     * Private method for initiating session.
     */
    private function newSessionGame(): void
    {
        $game = new GameActions();

        $this->session->set("deck_values", $game->deck->deckValues());
        $this->session->set("deck_text_values", $game->deck->deckTextValues());

        $game->deck->shuffleDeck();
        array_map(fn ($player): null => $player->__set('score', $player->handScore->bestScore($player->hand)), $game->players);
        $this->session->set("game", $game);
    }
}
