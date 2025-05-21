<?php

/**
 * DealCommunityCardsTest class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker\Round;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ManagerRegistry;
use App\Poker\Round\DealCommunityCards;
use App\Poker\Helpers\FetchCommunity;

/**
 * DealCommunityCardsTest class.
 */
class DealCommunityCardsTest extends WebTestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testDealCommunityCards(): void
    {
        $dealCommunityCards = new DealCommunityCards();
        $this->assertInstanceOf("\App\Poker\Round\DealCommunityCards", $dealCommunityCards);

        self::bootKernel();
        $container = static::getContainer();
        $registry = $container->get(ManagerRegistry::class);
        /** @phpstan-ignore-next-line */
        $entityManager = $registry->getManager();

        $community = (new FetchCommunity())->fetchCommunity($entityManager);
        $dealCommunityCards->deal($entityManager, $community);
    }
}
