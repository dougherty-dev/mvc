<?php

/**
 * PokerGamePreflopController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\PreflopDeal;
use App\Poker\Helpers\DealHoleCards;
use App\Poker\PlayerStates;
use App\Poker\Player;
use App\Poker\Community;
use App\Entity as Entity;

/**
 * The PokerGamePreflopController class.
 * @SuppressWarnings("StaticAccess")
 */
class PokerGamePreflopController extends AbstractController
{
    public ObjectManager $entityManager;
    public Community $community;
    public Entity\Community $entityCommunity;
    /** @var Entity\Players[] */
    public array $entityPlayers;

    /**
     * POST route for preflop.
     * Dealer deals one card to each player, twice, from fresh deck.
     * Cards are facing downward. Player left to big blind begins betting.
     * If player is computer, perform automatic betting, else interrupt for input.
     * Betting begins at 4, and can be raised by 4 two times.
     */
    #[Route("/proj/poker/preflop", name: "proj_poker_preflop", methods: ['POST'])]
    public function projPokerPreflop(ManagerRegistry $doctrine): Response
    {
        $pokerPlayers = new FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($doctrine);

        $playerActions = array_map(fn ($player): string =>
            PlayerStates::from($player->getLatestAction())->name, $players);

        $this->entityManager = $doctrine->getManager();

        $pokerCommunity = new FetchCommunity();
        $this->community = $pokerCommunity->fetchCommunity($doctrine);

        match (true) {
            array_unique($playerActions)[0] === 'None' => $this->dealHoleCards($doctrine),
            default => $this->bet()
        };

        return $this->redirectToRoute('proj_poker');
    }

    /**
     * Branch for dealing hole cards in preflop route.
     */
    public function dealHoleCards(ManagerRegistry $doctrine): void
    {
        $holeCards = new DealHoleCards();
        $holeCards->deal($doctrine);
    }

    /**
     * Branch for betting in preflop route.
     */
    public function bet(): void
    {
        /** Find player with big blind */
        $bigBlind = (int) array_search(true, array_map(fn ($player): bool => $player->isBigBlind(), $this->players));
        $bettingOrder = array_map(fn ($key): int => ($bigBlind + $key) % 3, [1, 2, 3]);
    }
}
