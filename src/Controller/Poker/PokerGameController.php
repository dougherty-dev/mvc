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
use App\Poker\Deck;
use App\Poker\Player;
use App\Poker\GameFoundation;

/**
 * The PokerGameController class.
 */
class PokerGameController extends PokerSessionController
{
    /**
     * The route for the poker game page.
     */
    #[Route("/proj/poker", name: "proj_poker")]
    public function projPoker(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $community = new Poker\Community();

        $repository = $entityManager->getRepository(Entity\Community::class);
        $res = $repository->findAll()[0];
        $community->deck->addToDeck(array_map('intval', $res->getDeck()));
        $community->discarded->addToDeck(array_map('intval', $res->getDiscarded()));
        $community->hand->addToHand(array_map('intval', $res->getHand()));
        $community->__set("status", (int) $res->getStatus());
        $community->__set("pot", (int) $res->getPot());
        $community->__set("raises", (int) $res->getRaises());

        $players = [];

        $repository = $entityManager->getRepository(Entity\Players::class);
        $results = $repository->findAll();

        foreach ($results as $res) {
            $player = new Player();
            $player->__set("handle", $res->getHandle());
            $player->hand->addToHand(array_map('intval', $res->getHand()));
            $player->__set("handle", $res->getHandle());
            $player->__set("cash", $res->getCash());
            $player->__set("bet", $res->getBet());
            $player->__set("latestAction", $res->getLatestAction());
            $player->__set("dealer", $res->isDealer());
            $player->__set("smallBlind", $res->isSmallBlind());
            $player->__set("bigBlind", $res->isBigBlind());
            $players[] = $player;
        }

        $this->checkSession();
        return $this->render('poker/poker.html.twig', ["community" => $community, "players" => $players]);
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
