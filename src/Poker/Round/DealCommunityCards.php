<?php

/**
 * DealCommunityCards class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker as Poker;
use App\Poker\Card;
use App\Poker\Player;
use App\Entity\Community;
use App\Entity\Players;

/**
 * The DealCommunityCards class.
 */
class DealCommunityCards
{
    /**
     * Burn one card, deal three, one and one community cards respectively.
     */
    public function deal(
        ObjectManager $entityManager,
        Poker\Community &$community
    ): void {

        $burnCard = $community->getDeck()->drawCard();

        $discardedCards = $community->getDiscarded();
        $discardedCards->addToDeck([$burnCard->getValue()]);

        $numberOfCards = $community->getState()->communityCards();
        $communityCards = $community->getDeck()->drawCards($numberOfCards);

        $cards = $community->getHand();
        array_map(fn ($card): null => $cards->addCard(new Card($card)), $communityCards->handIntValues());

        $entityCommunity = $entityManager->getRepository(Community::class)->findAll()[0];
        $entityCommunity->setDeck($community->getDeck()->deckIntValues());
        $entityCommunity->setHand($community->getHand()->handIntValues());
        $entityCommunity->setDiscarded($community->getDiscarded()->deckIntValues());

        $entityManager->persist($entityCommunity);
        $entityManager->flush();
    }
}
