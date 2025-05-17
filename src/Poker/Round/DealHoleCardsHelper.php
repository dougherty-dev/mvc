<?php

/**
 * DealHoleCardsHelper class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use App\Poker\Hand;
use App\Poker\Player;

/**
 * The DealHoleCardsHelper class.
 */
class DealHoleCardsHelper
{
    /**
     * Dealer deals one hole card to each player, twice, from fresh deck.
     * @param Player[] $players
     */
    public function dealHoleCards(array &$players, Hand $dealtHand): void
    {
        $dealer = (int) array_search(true, array_map(fn ($player): bool => (bool) $player->isDealer(), $players));
        $dealOrder = array_map(fn ($key): int => ($dealer + $key) % 3, [1, 2, 3]);

        array_map(fn ($player): null => $player->getHand()->emptyHand(), $players);

        for ($i = 0; $i < 2; $i++) {
            foreach ($dealOrder as $key) {
                $players[$key]->getHand()->addCard($dealtHand->drawCard());
                $players[$key]->setHand($players[$key]->getHand());
            }
        }
    }
}
