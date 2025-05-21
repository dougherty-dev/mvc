<?php

/**
 * GameNextController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Round\SetNewDealer;
use App\Poker\Round\CheckBadges;
use App\Poker\Round\SetBadges;
use App\Poker\Round\DealCards;
use App\Poker\Round\EndGame;
use App\Poker\Round\PrepareNextRound;

/**
 * The GameNextController class.
 */
class GameNextController extends SessionController
{
    /**
     * POST route for continuing game after showdown.
     */
    #[Route("/proj/poker/next", name: "proj_poker_next", methods: ['GET', 'POST'])]
    public function projPokerBegin(ManagerRegistry $doctrine): Response
    {
        $this->checkSession();
        $this->session->set("bestPokerHand", []);

        $entityManager = $doctrine->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $players = (new FetchPlayers())->fetchPlayers($entityManager);

        $updateCommunity = new UpdateCommunity($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);

        (new EndGame())->checkStatus($this->session, $players, $community, $updateCommunity, $updatePlayer);

        (new PrepareNextRound())->save($entityManager, $players, $community, $updatePlayer);

        [$dealer, $smallBlind, $bigBlind] = (new SetNewDealer())->set($players);
        (new SetBadges())->set($entityManager, $community, $dealer, $smallBlind, $bigBlind);

        (new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity))->deal();

        return $this->redirectToRoute('proj_poker');
    }
}
