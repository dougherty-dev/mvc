<?php

/**
 * Enum PlayerStates.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * The PlayerStates enumeration.
 */
enum PlayerStates: int
{
    case None   = 0;
    case Bets   = 10;
    case Passes = 20;
    case Calls  = 30;
    case Raises = 40;
    case Folds  = 50;
    case Out    = 60;

    public function stateText(): string
    {
        return match ($this) {
            PlayerStates::None      => 'Väntar',
            PlayerStates::Bets      => 'Satsar',
            PlayerStates::Passes    => 'Passar',
            PlayerStates::Calls     => 'Synar',
            PlayerStates::Raises    => 'Höjer',
            PlayerStates::Folds     => 'Lägger sig',
            PlayerStates::Out       => 'Ute'
        };
    }
}
