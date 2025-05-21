<?php

/**
 * HandleComputerBet class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The HandleComputerBet class.
 * @SuppressWarnings("StaticAccess")
 */
class HandleComputerBet extends PlayerBetFunctions
{
    /**
     * Computer betting.
     * @param Player[] $players
     */
    public function handleBet(
        array &$players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity,
        int $currentPlayer
    ): void {
        if ($players[$currentPlayer]->getState() === PlayerStates::Out) {
            return;
        }
        $this->updatePlayer = $updatePlayer;
        $this->updateCommunity = $updateCommunity;

        $this->community = $community;
        $this->betCost = $this->community->getState()->betCost();

        $this->player = $players[$currentPlayer];
        $this->id = $this->player->getId();

        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        $this->maxBet = max([0, ...$bets]);
        $this->raises = $this->community->getRaises();

        /** For now, raise until can't raise more, then call or pass */
        match (true) {
            $this->raises <= 2 && $this->player->getBet() < $this->maxBet => $this->raise($this->betCost),
            $this->raises > 2 && $this->player->getBet() === $this->maxBet => $this->check(),
            $this->raises > 2 && $this->player->getBet() < $this->maxBet => $this->call(),
            $this->maxBet === 0 => $this->bet($this->betCost),
            default => $this->bet($this->maxBet),
        };
    }
}
