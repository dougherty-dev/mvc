<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    private $deck = null;
    public $session = null;

    public function __construct(
        private RequestStack $requestStack
    ) {
        $this->deck = new \App\Cards\ExtendedDeck();
        $this->checkSession();
    }

    #[Route("session", name: "session")]
    public function session(): Response
    {
        return $this->render('session.html.twig');
    }

    #[Route("session/delete", name: "session_delete")]
    public function sessionDelete(): Response
    {
        $this->session->clear();
        $this->addFlash(
            'notice',
            'Sessionen raderades.'
        );

        return $this->redirectToRoute('session');
    }

    #[Route("card", name: "card")]
    public function card(): Response
    {
        return $this->render('card.html.twig');
    }

    #[Route("card/deck", name: "deck")]
    public function deck(): Response
    {
        return $this->render('deck.html.twig');
    }

    #[Route("card/deck/shuffle", name: "shuffle")]
    public function shuffleDeck(): Response
    {
        $this->deck->shuffleDeck();
        $this->session->set("deck", $this->deck);
        return $this->render('shuffle.html.twig');
    }

    #[Route("card/deck/draw", name: "draw")]
    public function drawCard(): Response
    {
        return $this->render('draw.html.twig', $this->drawCards());
    }

    #[Route("card/deck/draw/{number<\d+>}", name: "draw_number")]
    public function drawNumberCard(int $number): Response
    {
        return $this->render('draw.html.twig', $this->drawCards($number));
    }

    #[Route("card/deck/draw/process", name: "draw_number_post", methods: ['POST'])]
    public function drawNumberCardPost(Request $request): Response
    {
        return $this->redirectToRoute('draw_number', ['number' => $request->request->get('number')]);
    }

    private function drawCards($number = 1): array
    {
        $n = $number;
        $cards = [];
        while ($n > 0 && $this->deck->cards()) {
            $cards[] = $this->deck->drawCard();
            --$n;
        }
        $this->session->set("deck", $this->deck);

        return [
            "number" => $number,
            "cards" => $cards,
            "remaining" => $this->deck->cards()
        ];
    }

    #[Route("card/deck/deal/{players<\d+>}/{cards<\d+>}", name: "deal")]
    public function deal(int $players = 0, int $cards = 0): Response
    {
        $p = $players;
        $c = $cards;
        $no_cards = $p * $c;

        if ($no_cards > $this->deck->cards()) {
            $this->addFlash(
                'notice',
                'För få kort i lek.'
            );
            return $this->redirectToRoute('card');
        }

        $player_cards = [];
        while ($p > 0) {
            $c = $cards;
            while ($c > 0 && $this->deck->cards()) {
                $player_cards[$p][] = $this->deck->drawCard();
                --$c;
            }
            --$p;
        }

        $this->session->set("deck", $this->deck);

        $data = [
            'players' => $players,
            'cards' => $cards,
            'player_cards' => $player_cards,
            'remaining' => $this->deck->cards()
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

    private function checkSession(): void
    {
        $this->session = $this->requestStack->getSession();

        if (!$this->session->get("deck")) {
            $this->deck->resetDeck();
            $this->session->set("deck", $this->deck);
        } else {
            $this->deck = $this->session->get("deck");
        }

        if (!$this->session->get("unicode")) {
            $this->session->set("unicode", $this->deck::DECK);
        }
    }
}
