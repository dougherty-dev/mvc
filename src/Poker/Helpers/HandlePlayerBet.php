<?php

/**
 * HandlePlayerBet class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The HandlePlayerBet class.
 * @SuppressWarnings("StaticAccess")
 */
class HandlePlayerBet extends PlayerBetFunctions
{
    /**
     * Handle form input for betting.
     * @param Player[] $players
     * @param string[] $form
     */
    public function processForm(
        array &$players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity,
        array $form
    ): void {
        $this->updatePlayer = $updatePlayer;
        $this->updateCommunity = $updateCommunity;

        $this->community = $community;
        $this->betCost = $this->community->getState()->betCost();

        $this->player = $players[0];
        $this->id = $this->player->getId();

        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        $this->maxBet = max([0, ...$bets]);
        $this->raises = $this->community->getRaises();

        match (true) {
            isset($form["fold"]) => $this->fold(),
            isset($form["call"]) => $this->call(),
            isset($form["check"]) => $this->check(),
            isset($form["raise"], $form["bet"]) => $this->raise(intval($form["bet"])),
            isset($form["makebet"], $form["bet"]) => $this->bet(intval($form["bet"])),
            default => null
        };
    }
}
