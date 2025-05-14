<?php

/**
 * PokerGameBeginController test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker\Helpers;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\Helpers\PokerGameGetDeck;

/**
 * Test cases for class PokerGameBeginController.
 */
class PokerGameGetDeckTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testPokerGameGetDeck(): void
    {
        $cls = new PokerGameGetDeck();
        $this->assertInstanceOf("\App\Controller\Poker\Helpers\PokerGameGetDeck", $cls);
    }
}
