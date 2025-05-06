<?php

/**
 * Card controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** The CardController class. */
class CardController extends CardSessionController
{
    /** The route for the landing page. */
    #[Route("/card", name: "card")]
    public function card(): Response
    {
        return $this->render('card/card.html.twig');
    }

    /** The route for the deck page. */
    #[Route("/card/deck", name: "card_deck")]
    public function cardDeck(): Response
    {
        $this->checkSession();
        return $this->render('card/deck.html.twig');
    }

    /** The route for resetting the deck. */
    #[Route("/card/deck/reset", name: "card_deck_reset")]
    public function cardDeckReset(): Response
    {
        $this->checkSession();
        $this->deck->resetDeck();
        $this->deck->shuffleDeck();

        return $this->redirectToRoute('card_deck');
    }

    /** The route for shuffling the deck. */
    #[Route("/card/deck/shuffle", name: "card_deck_shuffle")]
    public function cardDeckShuffle(): Response
    {
        $this->checkSession();
        $this->deck->shuffleDeck();

        $this->session->set("deck", $this->deck);

        return $this->render('card/shuffle.html.twig');
    }
}
