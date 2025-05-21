<?php

/**
 * HandAPIController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Poker\SessionController;
use App\Poker\Helpers\FetchPlayers;

/**
 * The HandAPIController class.
 */
class HandAPIController extends AbstractController
{
    /**
     * The API route for displaying a player’s hand and data.
     */
    #[Route("/api/poker/hand", name: "api_poker_hand", methods: ['POST'])]
    public function apiPokerHand(ManagerRegistry $doctrine, Request $request): Response
    {
        $req = $request->request->get("player");
        if (!in_array($req, [0, 1, 2])) {
            return new JsonResponse([]);
        }

        $entityManager = $doctrine->getManager();
        $players = (new FetchPlayers())->fetchPlayers($entityManager);
        $player = $players[$req]; // fetched by handle

        $playerStats = [
            "handle" => $player->getHandle(),
            "state" => $player->getState()->name,
            "stateText" => $player->getState()->stateText(),
            "cards" => $player->getHand()->handUnicodeValues(),
            "cardSymbolValues" => $player->getHand()->handSymbolValues(),
            "cardTextValues" => $player->getHand()->handTextValues(),
            "cash" => $player->getCash(),
            "bet" => $player->getBet(),
            "isDealer" => $player->isDealer(),
            "isSmallBlind" => $player->isSmallBlind(),
            "isBigBlind" => $player->isBigBlind(),
        ];

        $response = new JsonResponse([
            "playerStats" => $playerStats
        ]);

        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
