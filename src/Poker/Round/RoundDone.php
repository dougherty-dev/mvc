<?php

/**
 * RoundDone class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\GameStates;

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
        SessionInterface $session,
        ObjectManager $entityManager,
        array &$players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): bool {
        /**
         * Check if round is done, collect bets, up level.
         */
        $bets = [];
        foreach ($players as $player) {
            if (!in_array($player->getState(), [PlayerStates::Folds, PlayerStates::Out])) {
                $bets[] = $player->getBet();
            }
        }

        if (count(array_unique($bets)) === 1 && $community->getBetorder() === []) {
            /**
             * Select a winner and tidy up before showdown.
             */
            if ($community->getState() === GameStates::River) {
                (new DecideWinner())->evaluateHands($session, $players, $community, $updatePlayer, $updateCommunity);
            }

            (new ResetRound())->reset($entityManager, $players, $community, $updatePlayer, $updateCommunity);
            return true;
        }

        (new BettingOrder())->setOrder($players, $community, $updateCommunity);

        return false;
    }
}
