<?php

/**
 * CollectBets class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\GameStates;

/**
 * The CollectBets class.
 * @SuppressWarnings("StaticAccess")
 */
class CollectBets
{
    /**
     * Check if player(s) fold(s).
     * @param Player[] $players
     */
    public function save(
        array $players,
        Community $community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity,
        Player $player
    ): void {
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
        $playerCash = $community->getPot() + $player->getCash();
        $updatePlayer->saveCash((int) $player->getId(), $playerCash);
        $player->setCash($playerCash);

        $updateCommunity->savePot(0);
        $community->setPot(0);

        /**
         * Reset and save players’ bets.
         */
        array_map(fn ($player): Player => $player->setBet(0), $players);
        array_map(fn ($player): null => $updatePlayer->saveBet($player->getId(), 0), $players);

        /**
         * Save players’ cash.
         */
        array_map(fn ($player): null => $updatePlayer->saveCash($player->getId(), $player->getCash()), $players);
    }
}
