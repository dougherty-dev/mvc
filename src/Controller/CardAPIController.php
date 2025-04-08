<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller;
use App\Cards\Deck;

class CardAPIController extends CardController
{
    #[Route("/api/deck", name: "api_deck")]
    public function api_deck(): Response
    {
        $this->deck->resetDeck();
        $response = new JsonResponse($this->deck->deckValues());
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return $response;
    }

    #[Route("/api/deck/shuffle", name: "api_deck_shuffle")]
    public function api_deck_shuffle(): Response
    {
        $this->deck->shuffleDeck();
        $this->session->set("deck", $this->deck);
        $response = new JsonResponse($this->deck->deckValues());
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/draw", name: "api_deck_draw")]
    public function api_deck_draw(): Response
    {
        $data = parent::drawCards();

        $this->session->set("deck", $this->deck);
        $response = new JsonResponse(
            ["card" => $this->deck->handValues($data["cards"]),
            "remaining" => $data["remaining"]]
        );
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/draw/{number<\d+>}", name: "api_deck_draw_number")]
    public function api_deck_draw_number(int $number): Response
    {
        $data = parent::drawCards($number);

        $this->session->set("deck", $this->deck);
        $response = new JsonResponse([
            "card" => $this->deck->handValues($data["cards"]),
            "remaining" => $data["remaining"]
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck/draw/process", name: "api_deck_draw_process", methods: ['POST'])]
    public function api_deck_draw_process(Request $request): Response
    {
        return $this->redirectToRoute('api_deck_draw_number', ['number' => $request->request->get('number')]);
    }

    #[Route("api/deck/deal/{players<\d+>}/{cards<\d+>}", name: "api_deck_deal_players_cards")]
    public function api_deck_deal_players_cards(int $players, int $cards): Response
    {
        $p = $players;
        $c = $cards;

        $player_cards = [];
        while ($p > 0) {
            $c = $cards;
            while ($c > 0 && $this->deck->cards()) {
                $player_cards[$p][] = $this->deck->handValues([$this->deck->drawCard()]);
                --$c;
            }
            --$p;
        }

        $this->session->set("deck", $this->deck);

        $response = new JsonResponse([
            "player_cards" => array_reverse($player_cards, true),
            "remaining" => $this->deck->cards()
        ]);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("api/deck/deal/process", name: "api_deck_deal_process", methods: ['POST'])]
    public function api_deck_deal_process(Request $request): Response
    {
        return $this->redirectToRoute('api_deck_deal_players_cards', [
            'players' => $request->request->get('players'),
            'cards' => $request->request->get('cards')
        ]);
    }

}
