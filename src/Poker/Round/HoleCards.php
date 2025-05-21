<?php

/**
 * HoleCards class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The HoleCards class.
 * @SuppressWarnings("StaticAccess")
 */
class HoleCards
{
    /**
     * Dealer deals one card to each player, twice, from fresh deck.
     * @param Player[] $players
     */
    public function prepareHoleCards(
        ObjectManager $entityManager,
        array &$players,
        Community $community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): void {
        $playerActions = array_map(fn ($player): string =>
            PlayerStates::from($player->getLatestAction())->name, $players);

        if (in_array(PlayerStates::None->name, $playerActions)) {
            $holeCards = new DealHoleCards();
            $holeCards->deal($entityManager, $players, $community);

            foreach ($players as $player) {
                if ($player->getState() != PlayerStates::Out) {
                    $player->setState(PlayerStates::Bets);
                    $updatePlayer->saveState($player->getId(), PlayerStates::Bets->value);
                }
            }

            $bettingOrder = new BettingOrder();
            $bettingOrder->setOrder($players, $community, $updateCommunity);
        }
    }
}
