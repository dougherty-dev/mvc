<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Deck;

class CardController extends AbstractController
{
    /** @var RequestStack $requestStack */
    protected $requestStack;
    /** @var Deck $deck */
    public $deck;

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

    #[Route("card", name: "card")]
    public function card(): Response
    {
        return $this->render('card.html.twig');
    }

    #[Route("card/deck/reset", name: "reset")]
    public function reset(): Response
    {
        $this->deck->resetDeck();
        return $this->redirectToRoute('deck');
    }

    #[Route("card/deck", name: "deck")]
    public function deck(): Response
    {
        return $this->render('deck.html.twig');
    }

    #[Route("card/deck/shuffle", name: "shuffle")]
    public function shuffleDeck(): Response
    {
        $session = $this->requestStack->getSession();
        $this->deck->shuffleDeck();
        $session->set("deck", $this->deck);
        return $this->render('shuffle.html.twig');
    }

    #[Route("card/deck/draw", name: "draw")]
    public function drawCard(): Response
    {
        $session = $this->requestStack->getSession();
        $hand = $this->deck->drawCards();
        $session->set("deck", $this->deck);

        $data = [
            "number" => 1,
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ];

        return $this->render('draw.html.twig', $data);
    }

    #[Route("card/deck/draw/{number<\d+>}", name: "draw_number")]
    public function drawNumberCard(int $number): Response
    {
        $session = $this->requestStack->getSession();
        $hand = $this->deck->drawCards($number);
        $session->set("deck", $this->deck);

        $data = [
            "number" => $number,
            "hand" => $hand,
            "remaining" => $this->deck->remainingCards()
        ];

        return $this->render('draw.html.twig', $data);
    }

    #[Route("card/deck/draw/process", name: "draw_number_post", methods: ['POST'])]
    public function drawNumberCardPost(Request $request): Response
    {
        return $this->redirectToRoute('draw_number', ['number' => $request->request->get('number')]);
    }

    #[Route("card/deck/deal/{players<\d+>}/{cards<\d+>}", name: "deal")]
    public function deal(int $players = 0, int $cards = 0): Response
    {
        $hands = [];
        for ($i = 0; $i < $players; $i++) {
            $hands[$i] = $this->deck->drawCards($cards);
        }

        $session = $this->requestStack->getSession();
        $session->set("deck", $this->deck);

        $data = [
            'players' => $players,
            'cards' => $cards,
            'hands' => $hands,
            'remaining' => $this->deck->remainingCards()
        ];

        return $this->render('deal.html.twig', $data);
    }

    #[Route("card/deck/deal/process", name: "deal_post", methods: ['POST'])]
    public function dealPost(Request $request): Response
    {
        return $this->redirectToRoute('deal', [
            'players' => $request->request->get('players'),
            'cards' => $request->request->get('cards')
        ]);
    }
}
