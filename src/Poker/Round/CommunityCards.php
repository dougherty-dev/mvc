<?php

/**
 * CommunityCards class.
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
 * The CommunityCards class.
 * @SuppressWarnings("StaticAccess")
 */
class CommunityCards
{
    /**
     * Dealer burns a card and deals three community cards.
     * @param Player[] $players
     */
    public function prepareCommunityCards(
        ObjectManager $entityManager,
        array $players,
        Community &$community,
        UpdatePlayer $updatePlayer,
        UpdateCommunity $updateCommunity
    ): void {
        $playerActions = array_map(fn ($player): string =>
            PlayerStates::from($player->getLatestAction())->name, $players);

        if (array_unique($playerActions) === [PlayerStates::Bets->name]) {
            $dealCards = new DealCommunityCards();
            $dealCards->deal($entityManager, $community);

            array_map(fn ($player): Player => $player->setState(PlayerStates::Bets), $players);
            array_map(fn ($player): null =>
                $updatePlayer->saveState($player->getId(), $player->getState()->value), $players);

            $bettingOrder = new BettingOrder();
            $bettingOrder->setOrder($players, $community, $updateCommunity);
        }
    }
}
