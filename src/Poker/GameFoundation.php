<?php

/**
 * Game foundation class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * Define basic access methods for the Game class.
 */
class GameFoundation
{
    public Community $community;
    /** @var Player[] */
    public array $players = [];
    public Log $log;
}
