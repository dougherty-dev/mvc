<?php

/**
 * Log class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Hand;

/**
 * Properties and methods for the Log class.
 */
class Log
{
    public function __construct(
        public \DateTime $time,
        public string $event = "",
    ) {
    }
}
