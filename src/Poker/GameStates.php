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
    case None = 0;
    case NewGame = 10;
    case ChooseDealer = 20;
    case PreFlop = 30;
    case Flop = 40;
    case Turn = 50;
    case River = 60;
    case Showdown = 70;
    case EndGame = 80;

    public function stateText(): string
    {
        return match($this) {
            GameStates::None            => 'Inget spel pågår',
            GameStates::NewGame         => 'Nytt spel',
            GameStates::ChooseDealer    => 'Välj croupier',
            GameStates::PreFlop         => 'Pre-flop',
            GameStates::Flop            => 'Flop',
            GameStates::Turn            => 'Turn',
            GameStates::River           => 'River',
            GameStates::Showdown        => 'Showdown',
            GameStates::EndGame         => 'Spel slut',
        };
    }
}
