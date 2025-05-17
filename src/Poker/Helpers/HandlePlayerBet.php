<?php

/**
 * HandlePlayerBet class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Player;
use App\Poker\Community;
use App\Poker\PlayerStates;

/**
 * The HandlePlayerBet class.
 * @SuppressWarnings("StaticAccess")
 */
class HandlePlayerBet
{
    private Community $community;
    private Player $player;
    private UpdatePlayer $updatePlayer;
    private UpdateCommunity $updateCommunity;
    private int $id;
    private int $maxBet;
    //    private int $betCost;
    private int $raises;

    public function __construct()
    {
    }

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

        $this->player = $players[0];
        $this->id = $this->player->getId();

        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        $this->maxBet = max([0, ...$bets]);
        //        $this->betCost = $this->community->getState()->betCost();
        $this->raises = $this->community->getRaises();

        match (true) {
            isset($form["fold"]) => $this->fold(),
            isset($form["call"]) => $this->call(),
            isset($form["check"]) => $this->check(),
            isset($form["raise"], $form["bet"]) => $this->raise(intval($form["bet"])),
            default => null
        };
    }

    /**
     * Routines for player folding hand.
     */
    private function fold(): void
    {
        $this->updatePlayer->saveState($this->id, PlayerStates::Folds->value);
    }

    /**
     * Routines for player calling bet.
     */
    private function call(): void
    {
        $bet = $this->maxBet;
        $betDiff = $bet - $this->player->getBet();
        $cash = $this->player->getCash() - $betDiff;

        $this->player->setBet($bet);
        $this->updatePlayer->saveBet($this->id, $bet);

        $this->player->setCash($cash);
        $this->updatePlayer->saveCash($this->id, $cash);

        $this->updatePlayer->saveState($this->id, PlayerStates::Calls->value);
    }

    /**
     * Routines for player passing.
     */
    private function check(): void
    {
        $this->updatePlayer->saveState($this->id, PlayerStates::Passes->value);
    }

    /**
     * Routines for player raising bet.
     */
    private function raise(int $bet): void
    {
        $bet = $bet + $this->maxBet;
        $betDiff = $bet - $this->player->getBet();
        $cash = $this->player->getCash() - $betDiff;

        $this->player->setBet($bet);
        $this->updatePlayer->saveBet($this->id, $bet);

        $this->player->setCash($cash);
        $this->updatePlayer->saveCash($this->id, $cash);

        $this->player->setState(PlayerStates::Raises);
        $this->updatePlayer->saveState($this->id, PlayerStates::Raises->value);

        $this->updateCommunity->saveRaises($this->raises + 1);
        $this->community->setRaises($this->raises + 1);
    }
}
