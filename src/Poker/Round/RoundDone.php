<?php

/**
 * RoundDone class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The RoundDone class.
 * @SuppressWarnings("StaticAccess")
 */
class RoundDone
{
    /**
     * Check conditions after each round to determine if betting is complete.
     * @param Player[] $players
     */
    public function isDone(
        ObjectManager $entityManager,
        array &$players,
        Community $community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): bool {
        /**
         * Check if round is done, collect bets, do flop.
         */
        $bets = [];
        foreach ($players as $player) {
            if (!in_array($player->getState(), [PlayerStates::Folds, PlayerStates::Out])) {
                $bets[] = $player->getBet();
            }
        }

        if (count(array_unique($bets)) === 1 && $community->getBetorder() === []) {
            $resetRound = new ResetRound();
            $resetRound->reset($entityManager, $players, $community, $updatePlayer, $updateCommunity);
            return true;
        }

        /**
         * Or make another round.
         */
        $bettingOrder = new BettingOrder();
        $bettingOrder->setOrder($players, $community, $updateCommunity);

        return false;
    }
}

/**
 * två folds? kolla här eller när det sker
 * spelare på minus?
 * bara en spelare kvar?
 */
