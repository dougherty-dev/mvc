<?php

/**
 * Poker game controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Helpers;

use Doctrine\Persistence\ManagerRegistry;
use App\Poker as Poker;
use App\Entity as Entity;

/**
 * The PokerFetchCommunityController class.
 * @SuppressWarnings("StaticAccess")
 */
class PokerFetchPlayers
{
    /**
     * Helper method for populating the Player class from DB.
     * This is done before every new game action.
     * @return Poker\Player[] $players
     */
    public function fetchPlayers(ManagerRegistry $doctrine): array
    {
        $players = [];

        $results = $doctrine->getManager()
            ->getRepository(Entity\Players::class)
            ->findAll();

        foreach ($results as $res) {
            $player = new Poker\Player();
            $player->getHand()->addToHand(array_map('intval', $res->getHand()));

            $player->setHandle((int) $res->getHandle())
                ->setCash((int) $res->getCash())
                ->setBet((int) $res->getBet())
                ->setLatestAction((int) $res->getLatestAction())
                ->setDealer((bool) $res->isDealer())
                ->setSmallBlind((bool) $res->isSmallBlind())
                ->setBigBlind((bool) $res->isBigBlind())
                ->setState(Poker\PlayerStates::tryFrom($player->getLatestAction()) ?? Poker\PlayerStates::from(0))
                ->setStateText($player->getState()->stateText());

            $players[] = $player;
        }

        return $players;
    }
}
