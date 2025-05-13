<?php

/**
 * Poker game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use App\Poker as Poker;
use App\Entity as Entity;

/**
 * The PokerFetchCommunityController class.
 * @SuppressWarnings("StaticAccess")
 */
class PokerFetchCommunityController
{
    /**
     * Helper method for populating the Community class from DB.
     * This is done before every new game action.
     */
    public function fetchCommunity(ManagerRegistry $doctrine): Poker\Community
    {
        $res = $doctrine->getManager()->getRepository(Entity\Community::class)->findAll()[0];

        $community = new Poker\Community();

        $community->getDeck()->addToDeck(array_map('intval', $res->getDeck()));
        $community->getDiscarded()->addToDeck(array_map('intval', $res->getDiscarded()));
        $community->getHand()->addToHand(array_map('intval', $res->getHand()));

        $community->setStatus((int) $res->getStatus())
            ->setPot((int) $res->getPot())
            ->setRaises((int) $res->getRaises())
            ->setState(Poker\GameStates::tryFrom($community->getStatus()) ?? Poker\GameStates::tryFrom(0))
            ->setStateText($community->getState()->stateText());

        return $community;
    }
}
