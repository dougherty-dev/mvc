<?php

/**
 * Poker game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker as Poker;
use App\Entity as Entity;
use App\Controller\Poker as Controller;

/**
 * The PokerGameController class.
 */
class PokerGameController extends Controller\PokerSessionController
{
    /**
     * The route for the poker game page.
     */
    #[Route("/proj/poker", name: "proj_poker")]
    public function projPoker(ManagerRegistry $doctrine): Response
    {
        $this->checkSession();

        $community = new Controller\PokerFetchCommunityController();
        $players = new Controller\PokerFetchPlayersController();

        $data = [
            "community" => $community->fetchCommunity($doctrine),
            "players" => $players->fetchPlayers($doctrine)
        ];

        return $this->render('poker/poker.html.twig', $data);
    }


    /**
     * POST route for branching action.
     */
    // #[Route("/proj/poker/continue", name: "proj_poker_continue", methods: ['POST'])]
    // public function projPokerContinue(): Response
    // {
    //     // get form data, update poker DB
    //     $this->checkSession();
    //     $this->game->init();
    //     $this->game->deck->shuffleDeck();
    //     return $this->redirectToRoute('proj_poker');
    // }
}
