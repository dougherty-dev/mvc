<?php

/**
 * HandleComputerBet class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Poker\GameStates;
use App\Poker\Community;
use App\Poker\PlayerStates;
use App\Poker\Player;

/**
 * The HandleComputerBet class.
 * @SuppressWarnings("StaticAccess")
 */
class HandleComputerBet
{
    private Community $community;
    private UpdatePlayer $updatePlayer;
    private UpdateCommunity $updateCommunity;

    /**
     * Computer betting.
     * @param Player[] $players
     */
    public function handleBet(
        array &$players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity,
        int $currentPlayer
    ): void {
        $player = $players[$currentPlayer];
        $id = $player->getId();

        $this->updatePlayer = $updatePlayer;
        $this->updateCommunity = $updateCommunity;

        $this->community = $community;
        $betCost = $this->community->getState()->betCost();

        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        $maxBet = max([0, ...$bets]);

        /** For now, raise until can't raise more, then call or pass */
        $raises = $this->community->getRaises();
        if ($raises <= 2) {
            $bet = $maxBet + $betCost;
            $betDiff = $bet - $player->getBet();
            $cash = $player->getCash() - $betDiff;

            $this->updatePlayer->saveCash($id, $cash);
            $this->updatePlayer->saveBet($id, $bet);
            $this->updatePlayer->saveState($id, PlayerStates::Raises->value);
            $this->community->setRaises($raises + 1);
            $this->updateCommunity->saveRaises($raises + 1);
            $player->setBet($bet);
        }

        if ($raises > 2) { // when not Call
            $bet = $maxBet;
            $betDiff = $bet - $player->getBet();
            $cash = $player->getCash() - $betDiff;

            $this->updatePlayer->saveCash($id, $cash);
            $this->updatePlayer->saveBet($id, $bet);
            $this->updatePlayer->saveState($id, PlayerStates::Calls->value);
            $player->setBet($bet);
        }

        $players[$currentPlayer] = $player;
    }
}
