<?php

/**
 * Player class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * Properties and methods for the Player class.
 */
class Player extends PlayerVars
{
    private Hand $hand;
    private PlayerStates $state;
    private string $stateText;

    /**
     * Convenient to make a hand at construction.
     */
    public function __construct()
    {
        $this->hand = new Hand();
    }

    /**
     * Get for hand.
     */
    public function gethand(): Hand
    {
        return $this->hand;
    }

    /**
     * Set for hand.
     */
    public function setHand(Hand $hand): static
    {
        $this->hand = $hand;

        return $this;
    }

    /**
     * Get for state.
     */
    public function getState(): PlayerStates
    {
        return $this->state;
    }

    /**
     * Set for state.
     */
    public function setState(PlayerStates $state): static
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
}
