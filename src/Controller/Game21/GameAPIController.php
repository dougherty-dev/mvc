<?php

/**
 * Game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Game21;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The GameAPIController class.
 */
class GameAPIController extends GameSessionController
{
    /**
     * The API route for current game stats.
     */
    #[Route("/api/game", name: "api_game")]
    public function apiGame(): Response
    {
        $this->checkSession();
        $players = array_map(fn ($player): array => [
            "cards" => $player->hand->handValues(),
            "card values" => $player->hand->handTextValues(),
            "score" => $player->__get('score'),
            "bet" => $player->__get('bet'),
            "balance" => $player->__get('balance'),
        ], $this->game->players);

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
}
