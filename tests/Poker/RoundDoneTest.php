<?php

/**
 * DealOrderTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Poker;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ObjectManager;
use App\Poker\Round\DealerLottery;
use App\Poker\Round\BeginSetBadges;
use App\Poker\Round\RoundDone;
use App\Poker\Round\BettingOrder;
use App\Poker\Round\HumanPlayer;
use App\Poker\Round\SetNewDealer;
use App\Poker\Round\ResetRound;
use App\Poker\Round\CheckBadges;
use App\Poker\Round\SetBadges;
use App\Poker\Round\PrepareNextRound;

/**
 * Test cases for class RoundDone.
 */
class RoundDoneTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testHelpers(): void
    {
        $cls = new HumanPlayer();
        $this->assertInstanceOf("\App\Poker\Round\HumanPlayer", $cls);

        $cls = new BettingOrder();
        $this->assertInstanceOf("\App\Poker\Round\BettingOrder", $cls);

        $cls = new RoundDone();
        $this->assertInstanceOf("\App\Poker\Round\RoundDone", $cls);

        $cls = new DealerLottery();
        $this->assertInstanceOf("\App\Poker\Round\DealerLottery", $cls);

        $cls = new BeginSetBadges();
        $this->assertInstanceOf("\App\Poker\Round\BeginSetBadges", $cls);

        $cls = new SetNewDealer();
        $this->assertInstanceOf("\App\Poker\Round\SetNewDealer", $cls);

        $cls = new ResetRound();
        $this->assertInstanceOf("\App\Poker\Round\ResetRound", $cls);

        $cls = new CheckBadges();
        $this->assertInstanceOf("\App\Poker\Round\CheckBadges", $cls);

        $cls = new SetBadges();
        $this->assertInstanceOf("\App\Poker\Round\SetBadges", $cls);

        $cls = new PrepareNextRound();
        $this->assertInstanceOf("\App\Poker\Round\PrepareNextRound", $cls);
    }
}
