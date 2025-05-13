<?php

/**
 * Community class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * Properties and methods for the Community class.
 */
class Community extends CommunityCards
{
    private GameStates $state;
    private string $stateText;
    private int $status = 0;
    private int $pot = 0;
    private int $raises = 0;

    /**
     * Get for state.
     */
    public function getState(): GameStates
    {
        return $this->state;
    }

    /**
     * Set for state.
     */
    public function setState(GameStates $state): static
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get for state text.
     */
    public function getStateText(): string
    {
        return $this->stateText;
    }

    /**
     * Set for state text.
     */
    public function setStateText(string $stateText): static
    {
        $this->stateText = $stateText;

        return $this;
    }

    /**
     * Get for status.
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set for status.
     */
    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get for pot.
     */
    public function getPot(): int
    {
        return $this->pot;
    }

    /**
     * Set for pot.
     */
    public function setPot(int $pot): static
    {
        $this->pot = $pot;

        return $this;
    }

    /**
     * Get for raises.
     */
    public function getRaises(): int
    {
        return $this->raises;
    }

    /**
     * Set for raises.
     */
    public function setRaises(int $raises): static
    {
        $this->raises = $raises;

        return $this;
    }
}
