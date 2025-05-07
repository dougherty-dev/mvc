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
 * The CardAPIDrawController class.
 */
class CardAPIDrawController extends CardSessionController
{
    /**
     * The POST API route to draw several cards from the deck.
     */
    #[Route("/api/deck/draw/{number<\d+>}", name: "api_deck_draw_number_post", methods: ['POST'])]
    public function apiDeckDrawNumberPost(Request $request): Response
    {
        return $this->redirectToRoute(
            'api_deck_draw_number',
            ['number' => $request->request->get('number')]
        );
    }

    /**
     * The API route to draw several cards from the deck.
     */
    #[Route("/api/deck/draw/{number<\d+>}", name: "api_deck_draw_number", methods: ['GET'])]
    public function apiDeckDrawNumber(int $number): Response
    {
        $this->checkSession();
        $hand = $this->deck->drawCards($number)->handValues();
        $this->session->set("deck", $this->deck);

        $response = new JsonResponse([
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
