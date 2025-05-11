<?php

/**
 * Poker log test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\Log;
use DateTime;

/**
 * Test cases for class Log.
 */
class LogTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $log = new Log(new DateTime(), "");
        $this->assertInstanceOf("\App\Poker\Log", $log);
    }
}
