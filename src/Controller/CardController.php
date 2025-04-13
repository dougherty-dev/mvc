<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Deck;
use App\Cards\Hand;

class CardController extends AbstractController
{
    protected RequestStack $requestStack;
    protected Deck $deck;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $session = $this->requestStack->getSession();

        if (!$session->get("deck")) {
            $this->deck = new Deck();
            $this->deck->resetDeck();

            $session->set("deck", $this->deck);
        }

        $this->deck = new Deck();
        if (is_object($session->get("deck")) && is_a($session->get("deck"), 'App\Cards\Deck')) {
            $this->deck = $session->get("deck");
        }

        if (!$session->get("deck_values")) {
            $session->set("deck_values", $this->deck->deckValues());
            $session->set("deck_text_values", $this->deck->deckTextValues());
        }
    }

    #[Route("/card", name: "card")]
    public function card(): Response
    {
        return $this->render('card.html.twig');
    }

    #[Route("/card/deck", name: "card_deck")]
    public function cardDeck(): Response
    {
        return $this->render('deck.html.twig');
    }

    #[Route("/card/deck/reset", name: "card_deck_reset")]
    public function cardDeckReset(): Response
    {
        $this->deck->resetDeck();

        return $this->redirectToRoute('deck');
    }

    #[Route("/card/deck/shuffle", name: "card_deck_shuffle")]
    public function cardDeckShuffle(): Response
    {
        $this->deck->shuffleDeck();

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        return $this->render('shuffle.html.twig');
    }

    #[Route("/card/deck/draw", name: "card_deck_draw")]
    public function cardDeckDraw(int $number = 1): Response
    {
        $hand = $this->deck->drawCards($number);

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        $data = [
            "number" => $number,
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ];

        return $this->render('draw.html.twig', $data);
    }

    #[Route("/card/deck/draw/{number<\d+>}", name: "card_deck_draw_number")]
    public function cardDeckDrawNumber(int $number): Response
    {
        return $this->cardDeckDraw($number);
    }

    #[Route("/card/deck/deal/{players<\d+>}/{cards<\d+>}", name: "card_deck_draw_deal_players")]
    public function cardDeckDealPlayersCards(int $players = 0, int $cards = 0): Response
    {
        $data = [
            'players' => $players,
            'cards' => $cards,
            'hands' => $this->dealHands($players, $cards),
            'remaining' => $this->deck->remainingCards()
        ];

        return $this->render('deal.html.twig', $data);
    }

    /** @return array<int<0, max>, Hand> */
    public function dealHands(int $players, int $cards): array
    {
        $hands = [];
        for ($i = 0; $i < $players; $i++) {
            $hands[$i] = $this->deck->drawCards($cards);
        }

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        return  $hands;
    }
}
