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
    case Waits  = 10;
    case Bets   = 20;
    case Passes = 30;
    case Calls  = 40;
    case Raises = 50;
    case Folds  = 60;
    case Out    = 70;

    public function stateText(): string
    {
        return match ($this) {
            PlayerStates::None      => '',
            PlayerStates::Waits     => 'Väntar',
            PlayerStates::Bets      => 'Satsar',
            PlayerStates::Passes    => 'Passar',
            PlayerStates::Calls     => 'Synar',
            PlayerStates::Raises    => 'Höjer',
            PlayerStates::Folds     => 'Lägger sig',
            PlayerStates::Out       => 'Ute'
        };
    }
}
