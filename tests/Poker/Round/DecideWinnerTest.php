<?php

/**
 * DecideWinnerTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Poker\Round\CommunityCards;
use App\Poker\Helpers\FetchCommunity;
use App\Poker\Helpers\FetchPlayers;
use App\Poker\Helpers\UpdateCommunity;
use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\Hand;
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

        $client = static::createClient();
        $client->request('POST', '/proj/reset');

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $community = (new FetchCommunity())->fetchCommunity($entityManager); // @phpstan-ignore-line
        $players = (new FetchPlayers())->fetchPlayers($entityManager); // @phpstan-ignore-line
        $updatePlayer = new UpdatePlayer($entityManager); // @phpstan-ignore-line
        $updateCommunity = new UpdateCommunity($entityManager); // @phpstan-ignore-line

        $session = $client->getRequest()->getSession();

        $hand = new Hand();
        $hand->addToHand([12, 34, 2, 22, 18]);
        $community->setHand($hand);

        foreach ([[1, 45], [51, 0], [4, 33]] as $key => $arr) {
            $hand = new Hand();
            $hand->addToHand($arr);
            $players[$key]->setHand($hand);
        }

        $decideWinner->evaluateHands($session, $players, $community, $updatePlayer, $updateCommunity);

        $players[0]->setState(PlayerStates::Out);
        $decideWinner->evaluateHands($session, $players, $community, $updatePlayer, $updateCommunity);

        Request::create(
            "/proj/poker/reset",
            "POST"
        );

    }
}
