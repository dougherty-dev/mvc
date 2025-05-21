<?php

/**
 * NewDealerFuncs class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use App\Poker\Player;

/**
 * The NewDealerFuncs class.
 * @SuppressWarnings("StaticAccess")
 */
class NewDealerFuncs
{
    protected int $dealer = -1;
    protected int $smallBlind = -1;
    protected int $bigBlind = -1;

    /**
     * Three players?
     */
    protected function threePlayersLeft(): void
    {
        $this->dealer = ($this->dealer + 1) % 3;
        $this->smallBlind = ($this->dealer + 1) % 3;
        $this->bigBlind = ($this->smallBlind + 1) % 3;
    }

    /**
     * Two players. New dealer is out?
     */
    protected function newDealerOut(): void
    {
        $this->dealer = ($this->dealer + 1) % 3;
        $this->smallBlind = $this->dealer;
        $this->bigBlind = ($this->smallBlind + 1) % 3;
    }

    /**
     * New dealer is still in.
     * Dealer + 1 out?
     */
    protected function newDealerPlusOneOut(): void
    {
        $this->dealer = ($this->dealer + 2) % 3;
        $this->smallBlind = $this->dealer;
        $this->bigBlind = ($this->smallBlind + 1) % 3;
    }

    /**
     * Dealer + 2 out?
     */
    protected function newDealerPlusTwoOut(): void
    {
        $this->dealer = ($this->dealer + 1) % 3;
        $this->smallBlind = $this->dealer;
        $this->bigBlind = ($this->smallBlind + 2) % 3;
    }
}
