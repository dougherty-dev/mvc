<?php

/**
 * DecideWinner class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\PokerHand\PokerHands;

/**
 * The DecideWinner class.
 * @SuppressWarnings("StaticAccess")
 */
class DecideWinner
{
    /**
     * Decide winner, pay out and reset community pot, save results in session for display.
     * @param Player[] $players
     */
    public function evaluateHands(
        SessionInterface $session,
        array &$players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): void {
        /**
         * Find the best hand on the table.
         */
        $bestHand = [];
        $permuteHands = new PermuteHands();

        foreach ($players as $player) {
            if (in_array($player->getState(), [PlayerStates::Folds, PlayerStates::Out])) {
                continue;
            }

            $bestHand = $permuteHands->permute($community, $player, $updatePlayer, $bestHand);
        }

        if (!isset($bestHand["hex"], $bestHand["handle"], $bestHand["id"])) {
            return;
        }

        $bestHand["text"] = "Spelare {$bestHand["handle"]} vinner med " .
            PokerHands::from(intval($bestHand["hex"][1]))->text() . ".";
        $session->set("bestPokerHand", $bestHand);

        /**
         * Put all bets in community pot and save.
         */
        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        $newPot = $community->getPot() + (int) array_sum($bets);
        $community->setPot($newPot);
        $updateCommunity->savePot($newPot);

        /**
         * Add community pot to winning player and save. Reset community pot.
         */
        $playerCash = $community->getPot() + $players[$bestHand["handle"]]->getCash();
        $updatePlayer->saveCash((int) $bestHand["id"], $playerCash);
        $players[$bestHand["handle"]]->setCash($playerCash);

        $updateCommunity->savePot(0);
        $community->setPot(0);

        /** Reset and save players’ bets. */
        array_map(fn ($player): Player => $player->setBet(0), $players);
        array_map(fn ($player): null => $updatePlayer->saveBet($player->getId(), 0), $players);

        /** Save players’ cash. */
        array_map(fn ($player): null => $updatePlayer->saveCash($player->getId(), $player->getCash()), $players);
    }
}
