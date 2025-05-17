<?php

/**
 * BettingOrder class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\GameStates;

/**
 * The BettingOrder class.
 */
class BettingOrder
{
    /**
     * Find betting order.
     * First round: player next to big blind.
     * Conccurrent rounds: player next to dealer.
     * @param Player[] $players
     */
    public function setOrder(
        array $players,
        Community $community,
        UpdateCommunity $updateCommunity
    ): void {
        /** Find player with big blind, establish betting order */
        $betorder = array_map('intval', $community->getBetorder());
        if ($betorder === [] && $community->getState() != GameStates::Showdown) {
            $handle = match (true) {
                $community->getPot() => (int) array_search(true, array_map(fn ($player): bool => $player->isDealer(), $players)),
                default => (int) array_search(true, array_map(fn ($player): bool => $player->isBigBlind(), $players))
            };

            $betorder = array_map(fn ($key): int => ($handle + $key) % 3, [1, 2, 3]);
            $updateCommunity->saveBetorder($betorder);
        }
    }
}
