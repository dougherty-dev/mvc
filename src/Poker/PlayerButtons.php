<?php

/**
 * PlayerButtons class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Hand;

/**
 * Properties and methods for the PlayerButtons class.
 */
class PlayerButtons
{
    private bool $dealer = false;
    private bool $smallBlind = false;
    private bool $bigBlind = false;

    /**
     * Get for dealer.
     */
    public function isDealer(): bool
    {
        return $this->dealer;
    }

    /**
     * Set for dealer.
     */
    public function setDealer(bool $dealer): static
    {
        $this->dealer = $dealer;

        return $this;
    }

    /**
     * Get for small blind.
     */
    public function isSmallBlind(): bool
    {
        return $this->smallBlind;
    }

    /**
     * Set for small blind.
     */
    public function setSmallBlind(bool $smallBlind): static
    {
        $this->smallBlind = $smallBlind;

        return $this;
    }

    /**
     * Get for big blind.
     */
    public function isBigBlind(): bool
    {
        return $this->bigBlind;
    }

    /**
     * Set for big blind.
     */
    public function setBigBlind(bool $bigBlind): static
    {
        $this->bigBlind = $bigBlind;

        return $this;
    }
}
