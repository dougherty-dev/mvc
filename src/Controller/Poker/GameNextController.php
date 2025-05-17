<?php

/**
 * GameNextController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Round\SetNewDealer;
use App\Poker\Round\SetBadges;
use App\Poker\Round\DealCards;
use App\Poker\Round\PrepareNextRound;

/**
 * The GameNextController class.
 */
class GameNextController extends AbstractController
{
    /**
     * POST route for continuing game after showdown.
     */
    #[Route("/proj/poker/next", name: "proj_poker_next", methods: ['POST'])]
    public function projPokerBegin(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $pokerCommunity = new FetchCommunity();
        $community = $pokerCommunity->fetchCommunity($entityManager);

        $pokerPlayers = new FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($entityManager);

        $updateCommunity = new UpdateCommunity($entityManager);
        $updatePlayer = new UpdatePlayer($entityManager);

        $nextRound = new PrepareNextRound();
        $nextRound->save($entityManager, $players, $community, $updatePlayer);

        $newDealer = new SetNewDealer();
        [$dealer, $smallBlind, $bigBlind] = $newDealer->set($players);

        $setBadges = new SetBadges();
        $setBadges->set($entityManager, $community, $dealer, $smallBlind, $bigBlind);

        $dealCards = new DealCards($entityManager, $players, $community, $updatePlayer, $updateCommunity);
        $dealCards->deal();

        return $this->redirectToRoute('proj_poker');
    }
}
