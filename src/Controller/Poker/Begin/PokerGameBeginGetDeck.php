<?php

/**
 * PokerGameBeginGetDeck helper class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Begin;

use App\Poker as Poker;
use App\Entity as Entity;

/**
 * The PokerGameBeginGetDeck helper class.
 */
class PokerGameBeginGetDeck
{
    /**
     * Get deck from Community entity DB, construct real Deck class object.
     */
    public function getDeck(Entity\Community $entityCommunity): Poker\Deck
    {
        $entityDeck = $entityCommunity->getDeck();
        $entityDeck = array_map('intval', $entityDeck);

        $pokerCommunity = new Poker\Community();
        $deck = $pokerCommunity->getDeck();

        $deck->addToDeck($entityDeck);
        $deck->shuffleDeck();

        return $deck;
    }
}
