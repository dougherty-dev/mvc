<?php

/**
 * Process controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Cards;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The CardProcessController class.
 */
class CardProcessController extends CardSessionController
{
    /**
     * The route for the session page.
     */
    #[Route("/session", name: "session")]
    public function session(): Response
    {
        return $this->render('session.html.twig');
    }

    /**
     * The route for deleting the session.
     */
    #[Route("/session/delete", name: "session_delete")]
    public function sessionDelete(): Response
    {
        $this->checkSession();
        $this->session->clear();

        $this->addFlash(
            'notice',
            'Sessionen raderades.'
        );

        return $this->redirectToRoute('session');
    }

    /**
     * The POST (re)route for drawing cards from the deck.
     */
    #[Route("/card/deck/draw/process", name: "card_deck_draw_process", methods: ['POST'])]
    public function cardDeckDrawProcess(Request $request): Response
    {
        return $this->redirectToRoute(
            'card_deck_draw_number',
            ['number' => $request->request->get('number')]
        );
    }

    /**
     * The POST (re)route for dealing cards to player.
     */
    #[Route("/card/deck/deal/process", name: "card_deck_deal_process", methods: ['POST'])]
    public function cardDeckDealProcess(Request $request): Response
    {
        return $this->redirectToRoute('card_deck_draw_deal_players', [
            'players' => $request->request->get('players'),
            'cards' => $request->request->get('cards')
        ]);
    }
}
