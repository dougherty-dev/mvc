<?php

/**
 * CommunityCards class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Hand;
use App\Poker\Deck;
use App\Poker\GameStates;

/**
 * Properties and methods for the CommunityCards class.
 */
class CommunityCards
{
    private Deck $deck;
    private Deck $discarded;
    private Hand $hand;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->discarded = new Deck();
        $this->hand = new Hand();
    }

    /**
     * Get for deck.
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }

    /**
     * Set for dealer.
     */
    public function setDeck(Deck $deck): static
    {
        $this->deck = $deck;

        return $this;
    }

    /**
     * Get for discarded.
     */
    public function getDiscarded(): Deck
    {
        return $this->discarded;
    }

    /**
     * Set for discarded.
     */
    public function setDiscarded(Deck $discarded): static
    {
        $this->discarded = $discarded;

        return $this;
    }

    /**
     * Get for hand.
     */
    public function getHand(): Hand
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
}
