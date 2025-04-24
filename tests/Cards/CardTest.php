<?php

/**
 * Card test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

use PHPUnit\Framework\TestCase;
use RangeException;

/** Test cases for class Card. */
class CardTest extends TestCase
{
    /** Construct object with argument and verify that the object has the expected properties. */
    public function testCreateObject(): void
    {
        foreach (range(0, 53) as $key) {
            $card = new Card($key);
            $this->assertInstanceOf("\App\Cards\Card", $card);

            $res = $card->getValue();
            $this->assertEquals($key, $res);
        }
    }

    /** Construct object with invalid argument. */
    public function testCreateObjectWithTooLargeArgument(): void
    {
        $this->expectException(RangeException::class);
        new Card(54);
    }

    /** Construct object with invalid argument. */
    public function testCreateObjectWithTooSmallArgument(): void
    {
        $this->expectException(RangeException::class);
        new Card(-1);
    }
}
