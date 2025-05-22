<?php

/**
 * BettingLoop class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Symfony\Component\HttpFoundation\Request;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\HandleComputerBet;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The BettingLoop class.
 * @SuppressWarnings("StaticAccess")
 */
class BettingLoop
{
    /**
     * Main loop for betting rounds.
     * @param Player[] $players
     */
    public function doLoop(
        Request $request,
        array &$players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): bool {
        /**
         * Main loop for betting round, according to betting order.
         * Interrupt for human player and treat input when available.
         */
        $betorder = array_map('intval', $community->getBetorder());

        foreach ($betorder as $currentPlayer) {
            /**
             * Human player
             */
            if ($currentPlayer === 0) {
                $res = (new HumanPlayer())->handlePlayer($players, $community, $updatePlayer, $updateCommunity, $request);
                if ($res) {
                    return true;
                }
            }

            /**
             * Computer player
             */
            if ($currentPlayer != 0 && !in_array($players[$currentPlayer]->getState(), [PlayerStates::Out, PlayerStates::Folds])) {
                (new HandleComputerBet())->handleBet($players, $community, $updatePlayer, $updateCommunity, $currentPlayer);
            }

            array_shift($betorder);
            $community->setBetorder($betorder);
            $updateCommunity->saveBetorder($betorder);
        }

        return false;
    }
}
