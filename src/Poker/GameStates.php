<?php

/**
 * Enum GameStates.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * The GameStates enumeration.
 */
enum GameStates: int
{
    case None       = 0;
    case NewGame    = 10;
    case PreFlop    = 20;
    case Flop       = 30;
    case Turn       = 40;
    case River      = 50;
    case Showdown   = 60;
    case EndGame    = 70;

    public function stateText(): string
    {
        return match($this) {
            GameStates::None            => 'Inget spel pågår.',
            GameStates::NewGame         => 'Nytt spel. Croupier utsedd.',
            GameStates::PreFlop         => 'Pre-flop. Satsa.',
            GameStates::Flop            => 'Flop. Satsa.',
            GameStates::Turn            => 'Turn. Satsa.',
            GameStates::River           => 'River. Satsa.',
            GameStates::Showdown        => 'Showdown.',
            GameStates::EndGame         => 'Spel slut.',
        };
    }

    public function betCost(): int
    {
        return match($this) {
            GameStates::None            => 0,
            GameStates::NewGame         => 0,
            GameStates::PreFlop         => 4,
            GameStates::Flop            => 4,
            GameStates::Turn            => 8,
            GameStates::River           => 8,
            GameStates::Showdown        => 0,
            GameStates::EndGame         => 0,
        };
    }
}
