<?php

/**
 * PreflopDeal class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Hand;
use App\Poker\Player;

/**
 * The PreflopDeal class.
 */
class PreflopDeal
{
    /**
     * Dealer deals one card to each player, twice, from fresh deck.
     * @param Player[] $players
     */
    public function dealHoleCards(array &$players, Hand $dealtHand): void
    {
        $dealerHelper = new DealOrder();
        $dealOrder = $dealerHelper->dealOrder($players);

        array_map(fn ($player): null => $player->getHand()->emptyHand(), $players);

        for ($i = 0; $i < 2; $i++) {
            foreach ($dealOrder as $key) {
                $players[$key]->getHand()->addCard($dealtHand->drawCard());
                $players[$key]->setHand($players[$key]->getHand());
            }
        }
    }
}
