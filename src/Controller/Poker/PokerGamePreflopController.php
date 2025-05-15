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
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\DealHoleCards;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\PlayerStates;
use App\Poker\Player;

/**
 * The PokerGamePreflopController class.
 * @SuppressWarnings("StaticAccess")
 */
class PokerGamePreflopController extends AbstractController
{
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
        $entityManager = $doctrine->getManager();
        $update = new UpdatePlayer($entityManager);

        $pokerPlayers = new FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($entityManager);

        $playerActions = array_map(fn ($player): string =>
            PlayerStates::from($player->getLatestAction())->name, $players);

        if (array_unique($playerActions) === [PlayerStates::None->name]) {
            $holeCards = new DealHoleCards();
            $holeCards->deal($entityManager);

            array_map(fn ($player): Player => $player->setState(PlayerStates::Bets), $players);
            array_map(fn ($player): null =>
                $update->saveState($player->getId(), $player->getState()->value), $players);

            array_map(fn ($player): null =>
                $update->saveBet($player->getId(), $player->getBet()), $players);
            array_map(fn ($player): null =>
                $update->saveCash($player->getId(), $player->getCash()), $players);
        }

        $this->betPreflop($players);

        return $this->redirectToRoute('proj_poker');
    }

    /**
     * Branch for betting in preflop route.
     * @param Player[] $players
     */
    public function betPreflop($players): void
    {
        /** Find player with big blind */
        $bigBlind = (int) array_search(true, array_map(fn ($player): bool => $player->isBigBlind(), $players));
        $bettingOrder = array_map(fn ($key): int => ($bigBlind + $key) % 3, [1, 2, 3]);
        //        $bets = array_map(fn ($player): int => $player->getBet(), $players);

        foreach ($bettingOrder as $key) {
            if ($players[$key]->getState() === PlayerStates::Bets) {
                if ($key === 0) {
                    return;
                }


            }
        }
    }
}
