<?php

/**
 * FindAllHandsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Helpers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Helpers\FindAllHands;
use App\Poker\Helpers\AIPlayer;
use App\Poker\Helpers\PlayerBetFunctions;

/**
 * FindAllHandsTest class.
 */
class FindAllHandsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testFindAllHands(): void
    {
        $cls = new FindAllHands();
        $this->assertInstanceOf("\App\Poker\Helpers\FindAllHands", $cls);

        $cls = new AIPlayer();
        $this->assertInstanceOf("\App\Poker\Helpers\AIPlayer", $cls);

        $cls = new PlayerBetFunctions();
        $this->assertInstanceOf("\App\Poker\Helpers\PlayerBetFunctions", $cls);
    }
}
