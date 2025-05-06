<?php

/**
 * Card API controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** The CardAPIDeckController class. */
class CardAPIDeckController extends CardSessionController
{
    /** The API route for the current deck values. */
    #[Route("/api/deck", name: "api_deck")]
    public function apiDeck(): Response
    {
        $this->checkSession();
        $deck = $this->deck->deckValues();
        sort($deck);

        $response = new JsonResponse($deck);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    /** The POST API route to shuffle the deck. */
    #[Route("/api/deck/shuffle", name: "api_deck_shuffle", methods: ['POST'])]
    public function apiDeckShuffle(): Response
    {
        $this->checkSession();
        $this->deck->shuffleDeck();
        $this->session->set("deck", $this->deck);

        $response = new JsonResponse($this->deck->deckValues());
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
