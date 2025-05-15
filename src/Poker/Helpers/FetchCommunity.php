<?php

/**
 * FetchCommunity class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Poker\GameStates;
use App\Poker\Community;
use App\Entity as Entity;

/**
 * The FetchCommunity class.
 * @SuppressWarnings("StaticAccess")
 */
class FetchCommunity
{
    /**
     * Helper method for populating the Community class from DB.
     * This is done before every new game action.
     */
    public function fetchCommunity(ObjectManager $entityManager): Community
    {
        $res = $entityManager->getRepository(Entity\Community::class)->findAll()[0];

        $community = new Community();

        $community->getDeck()->addToDeck(array_map('intval', $res->getDeck()));
        $community->getDiscarded()->addToDeck(array_map('intval', $res->getDiscarded()));
        $community->getHand()->addToHand(array_map('intval', $res->getHand()));

        $community->setStatus((int) $res->getStatus())
            ->setPot((int) $res->getPot())
            ->setRaises((int) $res->getRaises())
            ->setState(GameStates::tryFrom($community->getStatus()) ?? GameStates::from(0))
            ->setStateText($community->getState()->stateText());

        return $community;
    }
}
