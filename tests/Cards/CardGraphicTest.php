<?php

/**
 * CardGraphic test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Cards;

use PHPUnit\Framework\TestCase;
use ReflectionObject;

/** Test cases for class CardGraphic. */
class CardGraphicTest extends TestCase
{
    /** Construct object with argument and verify that the object has the expected properties. */
    public function testCreateObject(): void
    {
        $card = new CardGraphic(5);
        $this->assertInstanceOf("\App\Cards\Cardgraphic", $card);

        $this->assertEquals($card->getValue(), 5);
    }

    /** Verify that method returns correct string values for card. */
    public function testStringValues(): void
    {
        $deck = CardGraphic::DECK_ARRAY;
        foreach (array_keys($deck) as $key) {
            $card = new CardGraphic($key);
            $res = $card->getStringValue();
            $this->assertEquals($deck[$key], $res);
        }
    }

    /** Verify that method returns correct text value for card. */
    public function testTextValues(): void
    {
        $card = new CardGraphic(0);
        $reflCard = new ReflectionObject($card);
        $suits = $reflCard->getConstant('SUIT');
        $faces = $reflCard->getConstant('FACES');
        $this->assertIsArray($suits);
        $this->assertIsArray($faces);

        $exp = [];
        foreach (array_slice($suits, 0, 4) as $suit) {
            foreach ($faces as $face) {
                $exp[] = "$suit $face";
            }
        }
        $exp[] = $suits[4];
        $exp[] = $suits[4];

        foreach (array_keys($exp) as $key) {
            $card = new CardGraphic($key);
            $res = $card->getTextValue();
            $this->assertEquals($exp[$key], $res);
        }
    }
}
