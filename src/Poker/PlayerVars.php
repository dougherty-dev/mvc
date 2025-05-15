<?php

/**
 * PlayerVars class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * Properties and methods for the Player class.
 */
class PlayerVars extends PlayerButtons
{
    private int $id;
    private int $handle = 0;
    private int $cash = 0;
    private int $bet = 0;
    private int $latestAction = 0;

    /**
     * Get for ID.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set for ID.
     */
    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get for handle.
     */
    public function getHandle(): int
    {
        return $this->handle;
    }

    /**
     * Set for handle.
     */
    public function setHandle(int $handle): static
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * Get for cash.
     */
    public function getCash(): int
    {
        return $this->cash;
    }

    /**
     * Set for cash.
     */
    public function setCash(int $cash): static
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * Get for bet.
     */
    public function getBet(): int
    {
        return $this->bet;
    }

    /**
     * Set for bet.
     */
    public function setBet(int $bet): static
    {
        $this->bet = $bet;

        return $this;
    }

    /**
     * Get for latest action.
     */
    public function getLatestAction(): int
    {
        return $this->latestAction;
    }

    /**
     * Set for latest action.
     */
    public function setLatestAction(int $latestAction): static
    {
        $this->latestAction = $latestAction;

        return $this;
    }
}
