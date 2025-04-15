<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Deck;
use App\Cards\Hand;
use App\Cards\CardGraphic;
use App\Game21\Player;
use App\Game21\Game;

class GameController extends AbstractController
{
    protected RequestStack $requestStack;
    protected Deck $deck;
    protected Player $player;
    protected Game $game;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    #[Route("/game", name: "game")]
    public function game(): Response
    {
        return $this->render('game.html.twig');
    }

    #[Route("/game/doc", name: "game_doc")]
    public function gameDoc(): Response
    {
        return $this->render('doc.html.twig');
    }

    #[Route("/game/dojo", name: "game_dojo")]
    public function gameDojo(): Response
    {
        $this->checkSession();
        return $this->render('dojo.html.twig');
    }

    private function checkSession(): void
    {
        $session = $this->requestStack->getSession();

        if (!$session->get("deck_values")) {
            $deck = new Deck();
            $deck->resetDeck();

            $session->set("deck_values", $deck->deckValues());
            $session->set("deck_text_values", $deck->deckTextValues());
        }

        if (!$session->get("game")) {
            $game = new Game();
            $game->player->hand->addCard(new CardGraphic(1));
            $game->player->hand->addCard(new CardGraphic(13));
            $game->player->hand->addCard(new CardGraphic(53));

            $game->player->setScore();
            $session->set("game", $game);
        }

        $this->game = new Game();
        if (is_object($session->get("game")) && is_a($session->get("game"), 'App\Game21\Game')) {
            $this->game = $session->get("game");
        }
    }
}
