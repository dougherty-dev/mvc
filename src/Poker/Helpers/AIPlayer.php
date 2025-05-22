<?php

/**
 * AIPlayer class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Player;
use App\Poker\PlayerStates;

/**
 * The AIPlayer class.
 * @SuppressWarnings("StaticAccess")
 */
class AIPlayer
{
    public const SUITED = [
        ['♥️K', '♥️2'], ['♥️K', '♥️3'], ['♥️K', '♥️4'], ['♥️Q', '♥️6'], ['♥️Q', '♥️7'], ['♥️J', '♥️8'], ['♥️J', '♥️9'],
        ['♠️K', '♠️2'], ['♠️K', '♠️3'], ['♠️K', '♠️4'], ['♠️Q', '♠️6'], ['♠️Q', '♠️7'], ['♠️J', '♠️8'], ['♠️J', '♠️9'],
        ['♦️K', '♦️2'], ['♦️K', '♦️3'], ['♦️K', '♦️4'], ['♦️Q', '♦️6'], ['♦️Q', '♦️7'], ['♦️J', '♦️8'], ['♦️J', '♦️9'],
        ['♠️K', '♠️2'], ['♠️K', '♠️3'], ['♠️K', '♠️4'], ['♠️Q', '♠️6'], ['♠️Q', '♠️7'], ['♠️J', '♠️8'], ['♠️J', '♠️9'],
    ];

    /**
     * Computer betting.
     */
    public function checkFold(
        Player $player
    ): bool {
        $hand = $player->getHand();

        $handFaceValues = $hand->handFaceValues();
        $handSymbolValues = $hand->handSymbolValues();
        $handSuites = array_map(fn (string $card): string => mb_substr($card, 0, 1), $hand->handSymbolValues());

        $pair = ($handFaceValues[0] === $handFaceValues[1]);
        $inSuite = ($handSuites[0] === $handSuites[1]);
        $suited = in_array([$handSymbolValues[0], $handSymbolValues[1]], self::SUITED);

        $goodCondition = $pair || $inSuite || $suited;

        return !$goodCondition;
    }
}
