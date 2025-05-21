<?php

/**
 * PermuteHandsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Round\PermuteHands;
use App\Poker\Round\CheckBadges;
use App\Poker\Round\CollectBets;
use App\Poker\Round\DecideWinner;
use App\Poker\Round\EndGame;
use App\Poker\Round\Folds;
use App\Poker\Round\BettingLoop;
use App\Poker\Round\NewDealerFuncs;

/**
 * PermuteHandsTest class.
 */
class PermuteHandsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testPermuteHands(): void
    {
        $cls = new PermuteHands();
        $this->assertInstanceOf("\App\Poker\Round\PermuteHands", $cls);

        $cls = new CheckBadges();
        $this->assertInstanceOf("\App\Poker\Round\CheckBadges", $cls);

        $cls = new CollectBets();
        $this->assertInstanceOf("\App\Poker\Round\CollectBets", $cls);

        $cls = new DecideWinner();
        $this->assertInstanceOf("\App\Poker\Round\DecideWinner", $cls);

        $cls = new EndGame();
        $this->assertInstanceOf("\App\Poker\Round\EndGame", $cls);

        $cls = new Folds();
        $this->assertInstanceOf("\App\Poker\Round\Folds", $cls);

        $cls = new BettingLoop();
        $this->assertInstanceOf("\App\Poker\Round\BettingLoop", $cls);

        $cls = new NewDealerFuncs();
        $this->assertInstanceOf("\App\Poker\Round\NewDealerFuncs", $cls);
    }
}
