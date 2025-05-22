<?php

/**
 * Folds class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\GameStates;

/**
 * The Folds class.
 * @SuppressWarnings("StaticAccess")
 */
class Folds
{
    /**
     * Check if player(s) fold(s).
     * @param Player[] $players
     */
    public function check(
        SessionInterface $session,
        array $players,
        Community $community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): bool {

        $outStates = (int) array_sum(array_map(fn ($player): int =>
            in_array($player->getState(), [PlayerStates::Out, PlayerStates::Folds]) ? 1 : 0, $players));

        /**
         * Do we have more than one player folding or out of the game?
         */
        if ($outStates <= 1) {
            return false;
        }

        if ($outStates > 2) {
            return true;
        }

        /**
         * $outStates == 1: just find legit player, and settle the score.
         */
        foreach ($players as $player) {
            if (!in_array($player->getState(), [PlayerStates::Out, PlayerStates::Folds])) {
                $community->setState(GameStates::Showdown);
                $updateCommunity->saveState($community->getState()->value);
                $session->set("winner", "Spelare {$player->getHandle()} vinner rundan.");

                (new CollectBets())->save($players, $community, $updatePlayer, $updateCommunity, $player);

                return true;
            }
        }

        return false;
    }
}
