<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardController extends AbstractController
{
    #[Route("session", name: "session")]
    public function session(
        SessionInterface $session
    ): Response {
        $data = [
            "session" => $session
        ];

        return $this->render('session.html.twig', $data);
    }

    #[Route("session/delete", name: "sessionDelete")]
    public function sessionDelete(
        SessionInterface $session
    ): Response {
        $session->clear();

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
    public function deck(
        SessionInterface $session
    ): Response {
        $deck = new \App\Cards\ExtendedDeck();
        $session->set("deck", $deck->deckValues());
        $session->set("unicode", $deck::DECK);
        $data = [
            "deck" => $session->get("deck"),
            "unicode" => $session->get("unicode")
        ];

        return $this->render('deck.html.twig', $data);
    }

    #[Route("card/deck/shuffle", name: "shuffle")]
    public function shuffleDeck(
        SessionInterface $session
    ): Response {
        $deck = new \App\Cards\ExtendedDeck();
        $deck->shuffleDeck();
        $session->set("deck", $deck->deckValues());
        $session->set("unicode", $deck::DECK);
        $data = [
            "deck" => $session->get("deck"),
            "unicode" => $session->get("unicode")
        ];

        return $this->render('shuffle.html.twig', $data);
    }
}
