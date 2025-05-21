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

        (new CollectBets())->save($players, $community, $updatePlayer, $updateCommunity, $players[$bestHand["handle"]]);
    }
}
