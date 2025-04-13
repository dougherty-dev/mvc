<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller;
use App\Cards\Hand;

class CardAPIController extends CardController
{
    #[Route("/api/deck", name: "api_deck")]
    public function apiDeck(): Response
    {
        $sorted = $this->deck->deckValues();
        sort($sorted);

        $response = new JsonResponse($sorted);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/shuffle", name: "api_deck_shuffle")]
    public function apiDeckShuffle(): Response
    {
        $this->deck->shuffleDeck();

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        $response = new JsonResponse($this->deck->deckValues());
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/draw", name: "api_deck_draw")]
    public function apiDeckDraw(int $number = 1): Response
    {
        $hand = $this->deck->drawCards($number)->handValues();

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        $response = new JsonResponse([
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/draw/{number<\d+>}", name: "api_deck_draw_number")]
    public function apiDeckDrawNumber(int $number): Response
    {
        return $this->apiDeckDraw($number);
    }

    #[Route("/api/deck/deal/{players<\d+>}/{cards<\d+>}", name: "api_deck_deal_players_cards")]
    public function apiDeckDealPlayersCards(int $players, int $cards): Response
    {
        $hands = [];
        for ($i = 0; $i < $players; $i++) {
            $hands[$i] = $this->deck->drawCards($cards)->handValues();
        }

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        $response = new JsonResponse([
            "hands" => $hands,
            "remaining" => $this->deck->remainingCards()
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
