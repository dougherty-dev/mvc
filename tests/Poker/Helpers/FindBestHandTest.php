<?php

/**
 * FindBestHandTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\Helpers\FindBestHand;
use App\Poker\Helpers\FindAllHands;
use App\Poker\Helpers\HexDecode;
use App\Poker\Helpers\PlayerBetFunctions;

/**
 * FindBestHandTest class.
 */
class FindBestHandTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testFindHand(): void
    {
        $cls = new FindBestHand();
        $this->assertInstanceOf("\App\Poker\Helpers\FindBestHand", $cls);

        $cls = new FindAllHands();
        $this->assertInstanceOf("\App\Poker\Helpers\FindAllHands", $cls);

        $cls = new HexDecode();
        $this->assertInstanceOf("\App\Poker\Helpers\HexDecode", $cls);

        $cls = new PlayerBetFunctions();
        $this->assertInstanceOf("\App\Poker\Helpers\PlayerBetFunctions", $cls);
    }
}
