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

        if (in_array(PlayerStates::Waits->name, $playerActions)) {
            (new DealCommunityCards())->deal($entityManager, $community);

            foreach ($players as $player) {
                if (!in_array($player->getState(), [PlayerStates::Folds, PlayerStates::Out])) {
                    $player->setState(PlayerStates::Bets);
                    $updatePlayer->saveState($player->getId(), $player->getState()->value);
                }
            }

            (new BettingOrder())->setOrder($players, $community, $updateCommunity);
        }
    }
}
