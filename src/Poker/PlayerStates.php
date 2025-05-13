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
    case Passes = 10;
    case Calls  = 20;
    case Raises = 30;
    case Folds  = 40;
    case Out    = 50;

    public function stateText(): string
    {
        return match($this) {
            PlayerStates::None      => 'Väntar',
            PlayerStates::Passes    => 'Passar',
            PlayerStates::Calls     => 'Synar',
            PlayerStates::Raises    => 'Höjer',
            PlayerStates::Folds     => 'Lägger sig',
            PlayerStates::Out       => 'Ute',
        };
    }
}
