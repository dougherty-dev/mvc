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
    public $deck = null;
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
        $data = [
            "session" => $this->session
        ];

        return $this->render('session.html.twig', $data);
    }

    #[Route("session/delete", name: "sessionDelete")]
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

        $this->session->set("deckValues", $this->deck->deckValues());
        $this->session->set("unicode", $this->deck::DECK);

        $data = [
            "deck" => $this->session->get("deckValues"),
            "unicode" => $this->session->get("unicode")
        ];

        return $this->render('deck.html.twig', $data);
    }

    #[Route("card/deck/shuffle", name: "shuffle")]
    public function shuffleDeck(): Response
    {
        $this->deck->shuffleDeck();

        $this->session->set("deckValues", $this->deck->deckValues());

        $data = [
            "deck" => $this->session->get("deckValues"),
            "unicode" => $this->session->get("unicode")
        ];

        return $this->render('shuffle.html.twig', $data);
    }

    #[Route("card/deck/draw", name: "draw")]
    public function drawCard(): Response
    {
        if ($this->deck->cards() > 0) {
            $this->session->set("card", $this->deck->drawCard());
        }
        $this->session->set("deck", serialize($this->deck));
        $this->session->set("deckValues", $this->deck->deckValues());
        $this->session->set("remaining", $this->deck->cards());

        $data = [
            "card" => $this->session->get("card"),
            "remaining" => $this->session->get("remaining"),
            "unicode" => $this->session->get("unicode")
        ];

        return $this->render('draw.html.twig', $data);
    }

    private function checkSession(): void
    {
        $this->session = $this->requestStack->getSession();

        if (!$this->session->get("deck")) {
            $this->deck->resetDeck();
            $this->session->set("deck", serialize($this->deck));
        } else {
            $this->deck = unserialize($this->session->get("deck"));
        }

        if (!$this->session->get("unicode")) {
            $this->session->set("unicode", $this->deck::DECK);
        }
    }
}
