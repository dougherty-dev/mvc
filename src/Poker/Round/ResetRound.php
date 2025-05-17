<?php

/**
 * ResetRound class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The ResetRound class.
 * @SuppressWarnings("StaticAccess")
 */
class ResetRound
{
    /**
     * Check conditions after each round to determine if betting is complete.
     * @param Player[] $players
     */
    public function reset(
        ObjectManager $entityManager,
        array $players,
        Community $community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): void {

        $bets = array_map(fn ($player): int => $player->getBet(), $players);
        $updateCommunity->savePot($community->getPot() + array_sum($bets));
        $updateCommunity->saveRaises(0);

        array_map(fn ($player): null => $updatePlayer->saveBet($player->getId(), 0), $players);

        $checkBadges = new CheckBadges();
        [$dealer, $smallBlind, $bigBlind] = $checkBadges->check($players);

        $setBadges = new SetBadges();
        $setBadges->set($entityManager, $community, $dealer, $smallBlind, $bigBlind);

        foreach ($players as $player) {
            if ($player->getState() != PlayerStates::Out) {
                $updatePlayer->saveState($player->getId(), PlayerStates::Bets->value);
            }
        }

        $bettingOrder = new BettingOrder();
        $bettingOrder->setOrder($players, $community, $updateCommunity);
    }
}
