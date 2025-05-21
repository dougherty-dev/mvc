<?php

/**
 * PlayerBetFunctions class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Helpers\PlayerBetFunctions;

/**
 * PlayerBetFunctionsTest class.
 */
class PlayerBetFunctionsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPlayerBetFunctions(): void
    {
        $cls = new PlayerBetFunctions();
        $this->assertInstanceOf("\App\Poker\Helpers\PlayerBetFunctions", $cls);
    }
}
