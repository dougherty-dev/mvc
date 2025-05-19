<?php

/**
 * GameBeginController test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Helpers\GetDeck;

/**
 * Test cases for class GameBeginController.
 */
class GetDeckTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testGameGetDeck(): void
    {
        $cls = new GetDeck();
        $this->assertInstanceOf("\App\Poker\Helpers\GetDeck", $cls);
    }
}
