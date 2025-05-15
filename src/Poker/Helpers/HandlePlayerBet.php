<?php

/**
 * HandlePlayerBet class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Poker as Poker;

/**
 * The HandlePlayerBet class.
 * @SuppressWarnings("StaticAccess")
 */
class HandlePlayerBet
{
    // private Poker\Community $community;
    private Poker\Player $player;
    private UpdatePlayer $update;

    public function __construct(private ObjectManager $entityManager)
    {
        // $pokerCommunity = new FetchCommunity();
        // $this->community = $pokerCommunity->fetchCommunity($this->entityManager);
    }

    /**
     * Handle form input for betting.
     * @param string[] $form
     */
    public function processForm(array $form, Poker\Player $player): void
    {
        $this->player = $player;

        $this->update = new UpdatePlayer($this->entityManager);

        match (true) {
            isset($form["fold"]) => $this->fold(),
            isset($form["call"]) => $this->call(),
            isset($form["check"]) => $this->check(),
            isset($form["raise"], $form["bet"]) => $this->raise(intval($form["bet"])),
            default => null
        };

        $this->fold();
        $this->call();
        $this->check();
        $this->raise(0);

    }

    /**
     * Routines for player folding hand.
     */
    private function fold(): void
    {
        $this->update->saveState($this->player->getId(), Poker\PlayerStates::Folds->value);
    }

    /**
     * Routines for player calling bet.
     */
    private function call(): void
    {
        $this->update->saveState($this->player->getId(), Poker\PlayerStates::Calls->value);
    }

    /**
     * Routines for player passing.
     */
    private function check(): void
    {
        $this->update->saveState($this->player->getId(), Poker\PlayerStates::Passes->value);
    }

    /**
     * Routines for player folding raising bet.
     */
    private function raise(int $bet): void
    {
        $this->update->saveState($this->player->getId(), Poker\PlayerStates::Raises->value);
        if ($bet) {

        };
    }
}
