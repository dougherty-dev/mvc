<?php

/**
 * FetchPlayers class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Entity\Players;

/**
 * The FetchPlayers class.
 * @SuppressWarnings("StaticAccess")
 */
class FetchPlayers
{
    /**
     * Helper method for populating the Player class from DB.
     * This is done before every new game action.
     * @return Player[] $players
     */
    public function fetchPlayers(ObjectManager $entityManager): array
    {
        $players = [];

        $results = $entityManager->getRepository(Players::class)->findBy([], ['handle' => 'ASC']);

        foreach ($results as $res) {
            $player = new Player();
            $player->getHand()->addToHand(array_map('intval', $res->getHand()));

            $player->setId((int) $res->getId())
                ->setHandle((int) $res->getHandle())
                ->setCash((int) $res->getCash())
                ->setBet((int) $res->getBet())
                ->setLatestAction((int) $res->getLatestAction())
                ->setDealer((bool) $res->isDealer())
                ->setSmallBlind((bool) $res->isSmallBlind())
                ->setBigBlind((bool) $res->isBigBlind())
                ->setState(PlayerStates::tryFrom($player->getLatestAction()) ?? PlayerStates::from(0))
                ->setStateText($player->getState()->stateText());

            $players[] = $player;
        }

        return $players;
    }
}
