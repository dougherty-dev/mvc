<?php

/**
 * ResetControllerTest class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller\Poker;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\Poker\ResetController;

/**
 * Test cases for class ResetControllerTest.
 */
class ResetControllerTest extends WebTestCase
{
    /**
     * Test instantiation of the class itself.
     */
    public function testResetController(): void
    {
        $this->assertInstanceOf("\App\Controller\Poker\ResetController", new ResetController());
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
