<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
        $session = $this->requestStack->getSession();
        $this->deck->shuffleDeck();
        $session->set("deck", $this->deck);
        $response = new JsonResponse($this->deck->deckValues());
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/draw", name: "api_deck_draw")]
    public function apiDeckDraw(): Response
    {
        $hand = $this->deck->drawCards()->handValues();

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

    #[Route("/api/deck/draw/process", name: "api_deck_draw_process", methods: ['POST'])]
    public function apiDeckDrawProcess(Request $request): Response
    {
        return $this->redirectToRoute('api_deck_draw_number', ['number' => $request->request->get('number')]);
    }

    #[Route("api/deck/deal/{players<\d+>}/{cards<\d+>}", name: "api_deck_deal_players_cards")]
    public function apiDeckDealPlayersCards(int $players, int $cards): Response
    {
        $session = $this->requestStack->getSession();
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

    #[Route("api/deck/deal/process", name: "api_deck_deal_process", methods: ['POST'])]
    public function apiDeckDealProcess(Request $request): Response
    {
        return $this->redirectToRoute('api_deck_deal_players_cards', [
            'players' => $request->request->get('players'),
            'cards' => $request->request->get('cards')
        ]);
    }
}
