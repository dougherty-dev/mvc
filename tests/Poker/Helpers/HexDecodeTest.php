<?php

/**
 * HexDecodeTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Helpers\HexDecode;

/**
 * HexDecodeTest class.
 */
class HexDecodeTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testHexDecode(): void
    {
        $cls = new HexDecode();
        $this->assertInstanceOf("\App\Poker\Helpers\HexDecode", $cls);
    }
}
