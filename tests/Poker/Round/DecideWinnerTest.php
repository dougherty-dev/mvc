<?php

/**
 * DecideWinnerTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use App\Poker\Round\DecideWinner;

/**
 * DecideWinnerTest class.
 * @SuppressWarnings("StaticAccess")
 */
class DecideWinnerTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPermuteHands(): void
    {
        $decideWinner = new DecideWinner();
        $this->assertInstanceOf("\App\Poker\Round\DecideWinner", $decideWinner);

        Request::create(
            "/proj/poker/reset",
            "POST"
        );
    }
}
