<?php

/**
 * PlayerBetFunctions class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Hand;
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
        $discarded = $this->community->getDiscarded();
        $cards = [...$discarded->deckIntValues(), ...$this->player->getHand()->handIntValues()];
        $discarded->addToDeck($cards);
        $this->updateCommunity->saveDiscarded($discarded->deckIntValues());

        $this->player->setState(PlayerStates::Folds);
        $this->updatePlayer->saveState($this->id, PlayerStates::Folds->value);
        $this->updatePlayer->saveHand($this->id, []);
    }

    /**
     * Routine for player calling bet.
     */
    protected function call(): void
    {
        $this->save($this->maxBet, PlayerStates::Calls);
    }

    /**
     * Routine for player passing.
     */
    protected function check(): void
    {
        $this->save($this->player->getBet(), PlayerStates::Passes);
    }

    /**
     * Routine for player raising bet.
     */
    protected function raise(int $bet): void
    {
        $this->updateCommunity->saveRaises($this->raises + 1);
        $this->community->setRaises($this->raises + 1);

        $this->save($bet + $this->maxBet, PlayerStates::Raises);
    }

    /**
     * Routines for player making bet.
     */
    protected function bet(int $bet): void
    {
        $this->save($bet, PlayerStates::Bets);
    }

    /**
     * Common routine for saving betting data.
     */
    protected function save(int $bet, PlayerStates $state): void
    {
        $cash = $this->player->getCash() + $this->player->getBet() - $bet;

        $this->player->setBet($bet)
            ->setCash($cash)
            ->setState($state);

        $this->updatePlayer->saveBet($this->id, $bet);
        $this->updatePlayer->saveCash($this->id, $cash);
        $this->updatePlayer->saveState($this->id, $state->value);
    }
}
