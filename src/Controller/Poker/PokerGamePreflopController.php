<?php

/**
 * PokerGamePreflopController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers as Helpers;
use App\Poker as Poker;

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
    public function projPokerPreflop(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $pokerPlayers = new Helpers\FetchPlayers();
        $players = $pokerPlayers->fetchPlayers($entityManager);

        $update = new Helpers\UpdatePlayer($entityManager);

        $playerActions = array_map(fn ($player): string =>
            Poker\PlayerStates::from($player->getLatestAction())->name, $players);

        if (array_unique($playerActions) === [Poker\PlayerStates::None->name]) {
            $holeCards = new Helpers\DealHoleCards();
            $holeCards->deal($entityManager);

            array_map(fn ($player): Poker\Player => $player->setState(Poker\PlayerStates::Bets), $players);
            array_map(fn ($player): null =>
                $update->saveState($player->getId(), $player->getState()->value), $players);
        }

        $form = $request->request->all();
        // if ($form) {
        $handlePB = new Helpers\HandlePlayerBet($entityManager);
        $handlePB->processForm($form, $players[0]);
        // }

        $handleCB = new Helpers\HandleComputerBet($entityManager);
        $handleCB->handleBets($players);

        return $this->redirectToRoute('proj_poker');
    }
}
