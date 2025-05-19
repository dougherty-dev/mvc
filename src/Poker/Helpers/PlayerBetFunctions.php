<?php

/**
 * PlayerBetFunctions class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Player;
use App\Poker\Community;
use App\Poker\PlayerStates;

/**
 * The PlayerBetFunctions class.
 * @SuppressWarnings("StaticAccess")
 */
class PlayerBetFunctions
{
    protected Community $community;
    protected Player $player;
    protected UpdatePlayer $updatePlayer;
    protected UpdateCommunity $updateCommunity;
    protected int $id;
    protected int $betCost;
    protected int $maxBet;
    protected int $raises;

    /**
     * Routine for player folding hand.
     */
    protected function fold(): void
    {
        $this->updatePlayer->saveState($this->id, PlayerStates::Folds->value);
    }

    /**
     * Routine for player calling bet.
     */
    protected function call(): void
    {
        $bet = $this->maxBet;
        $cash = $this->player->getCash() + $this->player->getBet() - $bet;

        $this->save($bet, $cash, PlayerStates::Calls);
    }

    /**
     * Routine for player passing.
     */
    protected function check(): void
    {
        $this->save($this->player->getBet(), $this->player->getCash(), PlayerStates::Passes);
    }

    /**
     * Routine for player raising bet.
     */
    protected function raise(int $bet): void
    {
        $bet = $bet + $this->maxBet;
        $cash = $this->player->getCash() + $this->player->getBet() - $bet;

        $this->updateCommunity->saveRaises($this->raises + 1);
        $this->community->setRaises($this->raises + 1);

        $this->save($bet, $cash, PlayerStates::Raises);
    }

    /**
     * Routines for player making bet.
     */
    protected function bet(int $bet): void
    {
        $cash = $this->player->getCash() + $this->player->getBet() - $bet;

        $this->save($bet, $cash, PlayerStates::Bets);
    }

    /**
     * Common routine for saving betting data.
     */
    protected function save(int $bet, int $cash, PlayerStates $state): void
    {
        $this->player->setBet($bet);
        $this->updatePlayer->saveBet($this->id, $bet);

        $this->player->setCash($cash);
        $this->updatePlayer->saveCash($this->id, $cash);

        $this->player->setState($state);
        $this->updatePlayer->saveState($this->id, $state->value);
    }
}
