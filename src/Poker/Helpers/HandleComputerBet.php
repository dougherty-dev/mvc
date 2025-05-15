<?php

/**
 * HandleComputerBet class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Poker as Poker;
use App\Poker\GameStates;

/**
 * The HandleComputerBet class.
 * @SuppressWarnings("StaticAccess")
 */
class HandleComputerBet
{
    private Poker\Community $community;
    private UpdatePlayer $updatePlayer;
    private UpdateCommunity $updateCommunity;

    public function __construct(private ObjectManager $entityManager)
    {
    }

    /**
     * Computer betting.
     * @param Poker\Player[] $players
     */
    public function handleBets(array $players): void
    {
        $this->updatePlayer = new UpdatePlayer($this->entityManager);
        $this->updateCommunity = new UpdateCommunity($this->entityManager);

        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        if (count(array_unique($bets)) === 1) {
            // round done;
        }

        /** Find player with big blind, establish betting order */
        $bigBlind = (int) array_search(true, array_map(fn ($player): bool => $player->isBigBlind(), $players));
        $bettingOrder = array_map(fn ($key): int => ($bigBlind + $key) % 3, [1, 2, 3]);

        $pokerCommunity = new FetchCommunity();
        $this->community = $pokerCommunity->fetchCommunity($this->entityManager);
        $betCost = $this->community->getState()->betCost();


        foreach ($bettingOrder as $key) {
            /** Break for human player’s interaction */
            if ($key === 0 && $players[$key]->getState() === Poker\PlayerStates::Bets) {
                return;
            }

            // if ($key === 0) {
            if ($key > 1) {
                continue;
            }

            $bets = array_map(fn ($player): int => $player->getBet(), $players);
            $maxBet = max([0, ...$bets]);

            /** For now, raise until can't raise more, then call or pass */
            $raises = $this->community->getRaises();
            if ($raises <= 2) {
                $bet = $maxBet + $betCost;
                $this->updatePlayer->saveCash($players[$key]->getId(), $players[$key]->getCash() - $bet);
                $this->updatePlayer->saveBet($players[$key]->getId(), $bet);
                $this->updatePlayer->saveState($players[$key]->getId(), Poker\PlayerStates::Raises->value);
                $this->community->setRaises($raises + 1);
                $this->updateCommunity->saveRaises($raises + 1);
                $players[$key]->setBet($bet);
            }

            // if ($raises > 2) {
            if ($raises < 2) {
                $bet = $maxBet;
                $this->updatePlayer->saveCash($players[$key]->getId(), $players[$key]->getCash() - $bet);
                $this->updatePlayer->saveBet($players[$key]->getId(), $bet);
                $this->updatePlayer->saveState($players[$key]->getId(), Poker\PlayerStates::Calls->value);
                $players[$key]->setBet($bet);
            }

        }
    }
}
