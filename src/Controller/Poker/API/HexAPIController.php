<?php

/**
 * HexAPIController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Hand;
use App\Poker\PokerHand\PokerHandValue;

/**
 * The HexAPIController class.
 */
class HexAPIController extends AbstractController
{
    /**
     * The API route for generating hex codes.
     * Input is 5 cards in numerical representation 0–51.
     */
    #[Route("/api/poker/hex", name: "api_poker_hex", methods: ['POST'])]
    public function apiPokerHex(Request $request): Response
    {
        $req = $request->query->all();
        if (!isset($req["hand"]) && empty($req["hand"])) {
            return new JsonResponse([]);
        }

        /**
         * Make sure illegal values are not propagated.
         */
        $values = array_map(fn (string $card): int => abs(intval($card) % 51), $req["hand"]);

        $hand = new Hand();
        $hand->addToHand($values);

        $hex = (new PokerHandValue())->checkHand($hand);
        $handUnicodeValues = $hand->handUnicodeValues();
        $handSymbolValues = $hand->handSymbolValues();
        $handTextValues = $hand->handTextValues();

        $response = new JsonResponse([
            "hex" => $hex,
            "handUnicodeValues" => $handUnicodeValues,
            "handSymbolValues" => $handSymbolValues,
            "handTextValues" => $handTextValues
        ]);

        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
