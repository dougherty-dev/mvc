<?php

/**
 * Card API controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Cards;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The CardAPIDrawSingleController class.
 */
class CardAPIDrawSingleController extends CardSessionController
{
    /**
     * The POST API route to draw a single card from the deck.
     */
    #[Route("/api/deck/draw", name: "api_deck_draw", methods: ['POST'])]
    public function apiDeckDraw(): Response
    {
        $this->checkSession();
        $hand = $this->deck->drawCards()->handValues();
        $this->session->set("deck", $this->deck);

        $response = new JsonResponse([
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
