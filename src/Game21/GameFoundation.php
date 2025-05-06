<?php

/**
 * Game class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

/** Numerical constants. */
define('CARDSUIT', 13);
define('TWENTY_ONE', 21);
define('WILD_MIN', 1);
define('WILD_MAX', 14);
define('BANK_MAX', 17);
define('BANK_MAX_PERCENTAGE_INTELLIGENCE', 60);
define('DECK_MAX', 51);
define('BALANCE_DEFAULT', 100);

/** Define basic methods for the Game class. */
class GameFoundation
{
    public const STATES = [
        'player_initiates' => '⇦ Spelare inleder',
        'player_bets' => '⇦ Spelare satsar',
        'player_draws' => '⇦ Spelare drar',
        'player_busted' => 'Spelare tjock',
        'bank_busted' => 'Bank tjock',
        'player_wins' => 'Spelare vinner',
        'bank_wins' => 'Bank vinner',
        'game_over' => 'Spel slut'
    ];

    /** Magic get. */
    public function __get(string $key): mixed
    {
        return $this->$key;
    }

    /** Magic isset. */
    public function __isset(string $key): bool
    {
        return isset($this->$key);
    }

    /** Magic set. */
    public function __set(string $key, mixed $value)
    {
        $this->$key = $value;
    }
}
