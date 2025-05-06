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
 * The CardAPIDealController class.
 */
class CardAPIDealController extends CardSessionController
{
    /**
     * The API route to deal several cards to player.
     */
    #[Route("/api/deck/deal/{players<\d+>}/{cards<\d+>}", name: "api_deck_deal_players_cards", methods: ['GET'])]
    public function apiDeckDealPlayersCards(int $players, int $cards): Response
    {
        $this->checkSession();
        $hands = [];
        for ($i = 0; $i < $players; $i++) {
            $hands[$i] = $this->deck->drawCards($cards)->handValues();
        }

        $this->session->set("deck", $this->deck);

        $response = new JsonResponse([
            "hands" => $hands,
            "remaining" => $this->deck->remainingCards()
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    /**
     * The POST API route to deal several cards to player.
     */
    #[Route("/api/deck/deal/{players<\d+>}/{cards<\d+>}", name: "api_deck_deal_players_cards_post", methods: ['POST'])]
    public function apiDeckDealPlayersCardsPost(Request $request): Response
    {
        return $this->redirectToRoute('api_deck_deal_players_cards', [
            'players' => $request->request->get('players'),
            'cards' => $request->request->get('cards')
        ]);
    }
}
