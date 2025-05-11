<?php

/**
 * Poker reset controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\PokerResetController;

/**
 * Test cases for class PokerProcessController.
 */
class PokerResetControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testPokerResetController(): void
    {
        $this->assertInstanceOf("\App\Controller\Poker\PokerResetController", new PokerResetController());
    }

    /**
     * Reset DB.
     */
    private function resetDB(): KernelBrowser
    {
        $client = static::createClient();
        $client->request('POST', '/proj/reset/post');
        return $client;
    }

    /**
     * Test reset DB.
     */
    public function testResetDB(): void
    {
        $client = $this->resetDB();
        $client->request('POST', '/proj/reset/post');
        $this->assertResponseRedirects("/proj/poker");

    }
}
