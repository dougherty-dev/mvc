<?php

/**
 * WinnerAPIController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\GameStates;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FindBestHand;

/**
 * The WinnerAPIController class.
 */
class WinnerAPIController extends AbstractController
{
    /**
     * The API route for deciding the winner during river, before showdown.
     */
    #[Route("/api/poker/winner", name: "api_poker_winner")]
    public function apiPokerWinner(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $noCommunityCards = $community->getHand()->remainingCards();

        if (!($community->getState() === GameStates::River && ($noCommunityCards === 5))) {
            return new JsonResponse([]);
        }

        $players = (new FetchPlayers())->fetchPlayers($entityManager);
        $bestHand = (new FindBestHand())->find($players, $community);

        $response = new JsonResponse([
            "bestHand" => $bestHand
        ]);

        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
