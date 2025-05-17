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
        return match ($this) {
            GameStates::None        => 'Inget spel pågår.',
            GameStates::NewGame     => 'Ny runda.',
            GameStates::PreFlop     => 'Preflop. Satsa.',
            GameStates::Flop        => 'Flop. Satsa.',
            GameStates::Turn        => 'Turn. Satsa.',
            GameStates::River       => 'River. Satsa.',
            GameStates::Showdown    => 'Showdown.',
            GameStates::EndGame     => 'Spel slut.'
        };
    }

    public function betCost(): int
    {
        return match ($this) {
            GameStates::None        => 0,
            GameStates::NewGame     => 0,
            GameStates::PreFlop     => 4,
            GameStates::Flop        => 4,
            GameStates::Turn        => 8,
            GameStates::River       => 8,
            GameStates::Showdown    => 0,
            GameStates::EndGame     => 0
        };
    }

    public function communityCards(): int
    {
        return match ($this) {
            GameStates::None        => 0,
            GameStates::NewGame     => 0,
            GameStates::PreFlop     => 0,
            GameStates::Flop        => 3,
            GameStates::Turn        => 1,
            GameStates::River       => 1,
            GameStates::Showdown    => 0,
            GameStates::EndGame     => 0
        };
    }

    public function nextState(): GameStates
    {
        return match ($this) {
            GameStates::None        => GameStates::NewGame,
            GameStates::NewGame     => GameStates::PreFlop,
            GameStates::PreFlop     => GameStates::Flop,
            GameStates::Flop        => GameStates::Turn,
            GameStates::Turn        => GameStates::River,
            GameStates::River       => GameStates::Showdown,
            GameStates::Showdown    => GameStates::NewGame,
            GameStates::EndGame     => GameStates::None
        };
    }
}
