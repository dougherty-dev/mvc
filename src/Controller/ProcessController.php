<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Deck;

class ProcessController extends CardController
{
    protected RequestStack $requestStack;

    #[Route("session", name: "session")]
    public function session(): Response
    {
        return $this->render('session.html.twig');
    }

    #[Route("session/delete", name: "session_delete")]
    public function sessionDelete(): Response
    {
        $session = $this->requestStack->getSession();
        $session->clear();
        $this->addFlash(
            'notice',
            'Sessionen raderades.'
        );

        return $this->redirectToRoute('session');
    }

    #[Route("card/deck/draw/process", name: "draw_number_post", methods: ['POST'])]
    public function drawNumberCardPost(Request $request): Response
    {
        return $this->redirectToRoute('draw_number', ['number' => $request->request->get('number')]);
    }

    #[Route("card/deck/deal/process", name: "deal_post", methods: ['POST'])]
    public function dealPost(Request $request): Response
    {
        return $this->redirectToRoute('deal', [
            'players' => $request->request->get('players'),
            'cards' => $request->request->get('cards')
        ]);
    }

    #[Route("/api/deck/draw/process", name: "api_deck_draw_process", methods: ['POST'])]
    public function apiDeckDrawProcess(Request $request): Response
    {
        return $this->redirectToRoute('api_deck_draw_number', ['number' => $request->request->get('number')]);
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
