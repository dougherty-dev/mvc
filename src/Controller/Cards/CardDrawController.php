<?php

/**
 * Card controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Cards;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The CardDrawController class.
 */
class CardDrawController extends CardSessionController
{
    /**
     * The route for drawing a card from deck.
     */
    #[Route("/card/deck/draw", name: "card_deck_draw")]
    public function cardDeckDraw(int $number = 1): Response
    {
        $this->checkSession();
        $hand = $this->deck->drawCards($number);

        $this->session->set("deck", $this->deck);

        $data = [
            "number" => $number,
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * The route for drawing several cards from deck.
     */
    #[Route("/card/deck/draw/{number<\d+>}", name: "card_deck_draw_number")]
    public function cardDeckDrawNumber(int $number): Response
    {
        return $this->cardDeckDraw($number);
    }

    /**
     * The route for dealing cards to player.
     */
    #[Route("/card/deck/deal/{players<\d+>}/{cards<\d+>}", name: "card_deck_draw_deal_players")]
    public function cardDeckDealPlayersCards(int $players = 0, int $cards = 0): Response
    {
        $this->checkSession();

        $hands = [];
        for ($i = 0; $i < $players; $i++) {
            $hands[$i] = $this->deck->drawCards($cards);
        }

        $this->session->set("deck", $this->deck);

        $data = [
            'players' => $players,
            'cards' => $cards,
            'hands' => $hands,
            'remaining' => $this->deck->remainingCards()
        ];

        return $this->render('card/deal.html.twig', $data);
    }
}
