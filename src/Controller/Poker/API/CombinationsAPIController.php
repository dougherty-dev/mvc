<?php

/**
 * CombinationsAPIController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FindAllHands;

/**
 * The CombinationsAPIController class.
 */
class CombinationsAPIController extends AbstractController
{
    /**
     * The API route for generating all possible hands, and the best hand.
     */
    #[Route("/api/poker/combinations", name: "api_poker_combinations", methods: ['POST'])]
    public function apiPokerCombinations(Request $request): Response
    {
        $req = $request->query->all();
        if (!isset($req["table"], $req["hand"]) || empty($req["hand"]) || empty($req["table"])) {
            return $response = new JsonResponse([]);
        }

        /**
         * Make sure illegal values are not propagated.
         */
        $playerValues = array_map(fn (string $card): int => abs(intval($card) % 51), $req["hand"]);
        $tableValues = array_map(fn (string $card): int => abs(intval($card) % 51), $req["table"]);

        $handsData = (new FindAllHands())->findhands($playerValues, $tableValues);

        $response = new JsonResponse([$handsData]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
