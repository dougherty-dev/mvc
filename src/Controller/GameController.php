<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\CardGraphic;
use App\Cards\Deck;
use App\Game21\GameActions;

class GameController extends AbstractController
{
    protected RequestStack $requestStack;
    protected GameActions $game;

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

    #[Route("/game/player/wins/process", name: "game_player_wins_process", methods: ['POST'])]
    public function gamePlayerWinsProcess(Request $request): Response
    {
        $this->checkSession();
        if ($request->request->get('continue')) {
            $this->game->continueGame();
        }

        return $this->redirectToRoute('game_dojo');
    }

    #[Route("/game/over/process", name: "game_over_process", methods: ['POST'])]
    public function gameOverProcess(): Response
    {
        $this->checkSession();
        $this->game->init();
        $this->game->deck->shuffleDeck();
        return $this->redirectToRoute('game');
    }

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

    #[Route("/api/game", name: "api_game")]
    public function apiGame(): Response
    {
        $this->checkSession();
        $players = [];
        foreach ($this->game->players as $player) {
            $players[] = [
                "cards" => $player->hand->handValues(),
                "card values" => $player->hand->handTextValues(),
                "score" => $player->__get('score'),
                "bet" => $player->__get('bet'),
                "balance" => $player->__get('balance'),
            ];
        }

        $response = new JsonResponse([
            "state" => $this->game->__get('state'),
            "players" => $players,
            "current probabilities" => $this->game->__get('cardStats'),
            "remaining cards" => $this->game->deck->remainingCards(),
            "current deck" => $this->game->deck->deckValues(),
            "options" => [
                "bank intelligence" => $this->game->__get('bankIntelligence'),
                "show deck" => $this->game->__get('showDeck'),
            ],
        ]);

        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

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
