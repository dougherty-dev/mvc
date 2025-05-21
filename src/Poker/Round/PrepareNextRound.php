<?php

/**
 * PrepareNextRound class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Doctrine\Persistence\ObjectManager;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Helpers\GetDeck;
use App\Entity\Community;
use App\Poker\PlayerStates;
use App\Poker\Player;
use App\Poker as Poker;

/**
 * The GameNextController class.
 */
class PrepareNextRound
{
    /**
     * Saving data to database before next round.
     * @param Player[] $players
     */
    public function save(
        ObjectManager $entityManager,
        array $players,
        Poker\Community $community,
        UpdatePlayer $updatePlayer
    ): void {
        $entityCommunity = $entityManager->getRepository(Community::class)->findAll()[0];

        $deckHelper = new GetDeck();
        $deck = $deckHelper->getDeck($entityCommunity);
        $deck->resetDeck();
        $deck->shuffleDeck();

        $entityCommunity->setStatus($community->getState()->nextState()->value)
            ->setDeck($deck->deckIntValues())
            ->setDiscarded([])
            ->setHand([]);

        $entityManager->persist($entityCommunity);
        $entityManager->flush();

        foreach ($players as $player) {
            if ($player->getState() != PlayerStates::Out) {
                $player->setState(PlayerStates::None);
                $updatePlayer->saveState($player->getId(), PlayerStates::None->value);
            }
        }

        array_map(fn ($player): null => $updatePlayer->saveHand($player->getId(), []), $players);
    }
}
