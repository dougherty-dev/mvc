<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Deck;
use App\Cards\Hand;

class GameController extends CardController
{
    protected RequestStack $requestStack;
    protected Deck $deck;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        //        $session = $this->requestStack->getSession();
    }

    #[Route("/game", name: "game")]
    public function game(): Response
    {
        return $this->render('game.html.twig');
    }

    #[Route("/game/doc", name: "game_doc")]
    public function gameDoc(): Response
    {
        return $this->render('doc.html.twig');
    }

    #[Route("/game/dojo", name: "game_dojo")]
    public function gameDojo(): Response
    {
        return $this->render('dojo.html.twig');
    }
}
