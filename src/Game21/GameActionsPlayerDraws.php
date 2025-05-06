<?php

/**
 * Game actions extension class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Game21\GameActionsStats;
use App\Game21\GameActionsDeck;

/**
 * Action methods for the game.
 */
class GameActionsPlayerDraws extends Game
{
    private GameActionsStats $gaStats;
    private GameActionsDeck $gaDeck;

    /**
     * Common routines before bank and player moves
     */
    public function playerDrawsBefore(int $id, GameActions &$gameActions): void
    {
        $this->gaDeck = new GameActionsDeck();
        $this->gaDeck->checkDeck($gameActions);

        $gameActions->players[$id]->hand->addCard($gameActions->deck->drawCard());
        $gameActions->players[$id]->__set('score', $gameActions->players[$id]->handScore->bestScore($gameActions->players[$id]->hand));

        $this->gaStats = new GameActionsStats();
        $cardStats = $this->gaStats->cardStats($id, $gameActions->players, $gameActions->deck);
        $gameActions->__set('cardStats', $cardStats);
    }

    /**
     * Common routines after bank and player moves
     */
    public function playerDrawsAfter(int $id, GameActions &$gameActions): void
    {
        $this->gaDeck->checkDeck($gameActions);
        $cardStats = $this->gaStats->cardStats($id, $gameActions->players, $gameActions->deck);
        $gameActions->__set('cardStats', $cardStats);
    }
}
