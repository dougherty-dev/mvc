<?php

/**
 * DealCards class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\GameStates;

/**
 * The DealCards class.
 */
class DealCards
{
    public function __construct(
        public ObjectManager $entityManager,
        /** @var Player[] */
        public array $players,
        public Community &$community,
        public UpdatePlayer $updatePlayer,
        public UpdateCommunity $updateCommunity
    ) {
    }

    /**
     * Deal hole cards or community cards depending on current state.
     */
    public function deal(): void
    {
        match ($this->community->getState()) {
            GameStates::NewGame => $this->holeCards(),
            GameStates::Flop,
            GameStates::Turn,
            GameStates::River   => $this->communityCards(),
            default => null
        };
    }

    private function holeCards(): void
    {
        $holeCards = new HoleCards();
        $holeCards->prepareHoleCards(
            $this->entityManager,
            $this->players,
            $this->community,
            $this->updatePlayer,
            $this->updateCommunity
        );
    }

    private function communityCards(): void
    {
        $communityCards = new CommunityCards();
        $communityCards->prepareCommunityCards(
            $this->entityManager,
            $this->players,
            $this->community,
            $this->updatePlayer,
            $this->updateCommunity
        );
    }
}
