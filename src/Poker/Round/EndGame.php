<?php

/**
 * EndGame class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\GameStates;

/**
 * The EndGame class.
 */
class EndGame
{
    /**
     * Check if players are out or game is over.
     * @param Player[] $players
     */
    public function checkStatus(
        SessionInterface $session,
        array &$players,
        Community &$community,
        UpdateCommunity $updateCommunity,
        UpdatePlayer $updatePlayer,
    ): void {
        foreach ($players as $player) {
            if ($player->getCash() <= 0) {
                $player->setState(PlayerStates::Out);
                $player->setStateText(PlayerStates::Out->stateText());
                $updatePlayer->saveState($player->getId(), PlayerStates::Out->value);
            }
        }

        $outStates = (int) array_sum(array_map(fn ($player): int => $player->getState() === PlayerStates::Out ? 1 : 0, $players));
        if ($outStates >= 2) {
            $community->setState(GameStates::EndGame);
            $updateCommunity->saveState(GameStates::EndGame->value);

            $playerCash = array_map(fn ($player): int => $player->getCash(), $players);
            $max = array_keys($playerCash, max(-1, ...$playerCash));
            $session->set("winner", "Spelare {$players[$max[0]]->getHandle()} vinner Texas Hold’em! ");
        }
    }
}
