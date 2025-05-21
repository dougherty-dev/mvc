<?php

/**
 * SetNewDealerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Poker;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Poker\Round\SetNewDealer;
use App\Poker\Round\EndGame;
use App\Poker\Round\Folds;
use App\Poker\Round\BettingLoop;
use App\Poker\Round\NewDealerFuncs;

/**
 * SetNewDealerTest class.
 */
class SetNewDealerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testSetNewDealer(): void
    {
        $setNewDealer = new SetNewDealer();
        $this->assertInstanceOf("\App\Poker\Round\SetNewDealer", $setNewDealer);

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
