<?php

/**
 * GameAPIController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;

/**
 * The GameAPIController class.
 */
class GameAPIController extends AbstractController
{
    /**
     * The API route for the current game.
     */
    #[Route("/api/poker/game", name: "api_poker_game")]
    public function apiPokerGame(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);

        $playerStats = array_map(fn ($player): array => [
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
        ], $players);

        $communityStats = [
            "state" => $community->getState()->name,
            "communityCards" => $community->getHand()->handUnicodeValues(),
            "cardSymbolValues" => $community->getHand()->handSymbolValues(),
            "cardTextValues" => $community->getHand()->handTextValues(),
            "communityPot" => $community->getPot(),
            "betOrder" => $community->getBetorder(),
            "deckUnicodeValues" => $community->getDeck()->deckUnicodeValues(),
            "deckSymbolValues" => $community->getDeck()->deckSymbolValues(),
            "deckTextValues" => $community->getDeck()->deckTextValues(),
            "discardedUnicodeValues" => $community->getDiscarded()->deckUnicodeValues(),
            "discardedSymbolValues" => $community->getDiscarded()->deckSymbolValues(),
            "discardedTextValues" => $community->getDiscarded()->deckTextValues()
        ];

        $response = new JsonResponse([
            "playerStats" => $playerStats,
            "communityStats" => $communityStats
        ]);

        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
