<?php

/**
 * PokerGamePreflopController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Symfony\Component\HttpFoundation\Request;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\HandlePlayerBet;
use App\Poker\Helpers\HandleComputerBet;
use App\Poker\PlayerStates;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\Round\HoleCards;
use App\Poker\Round\BettingOrder;

/**
 * The PokerGamePreflopController class.
 * @SuppressWarnings("StaticAccess")
 */
class HumanPlayer
{
    /**
     * @param Player[] $players
     */
    public function handlePlayer(
        array &$players,
        Community $community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity,
        Request $request
    ): bool {
        $form = $request->request->all();

        if ($form) {
            $handlePB = new HandlePlayerBet();
            $handlePB->processForm($players, $community, $updatePlayer, $updateCommunity, $form);
        }

        if (!$form) {
            $bets = array_map(fn ($player): int => $player->getBet(), $players);
            $maxBet = max([0, ...$bets]);
            if (!in_array($players[0]->getState(), [PlayerStates::Folds, PlayerStates::Out])
                    && $players[0]->getBet() < $maxBet) {
                return true;
            }
        }

        return false;
    }
}
