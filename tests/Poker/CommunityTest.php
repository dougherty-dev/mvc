<?php

/**
 * Poker community test class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Tests\Poker;

use PHPUnit\Framework\TestCase;
use App\Poker\Hand;
use App\Poker\Community;

/**
 * Test cases for class Community.
 */
class CommunityTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $community = new Community();
        $this->assertInstanceOf("\App\Poker\Community", $community);
        $this->assertTrue($community->__isset('status'));
        $this->assertTrue($community->__isset('deck'));
        $this->assertTrue($community->__isset('discarded'));
        $this->assertTrue($community->__isset('hand'));
        $this->assertTrue($community->__isset('pot'));
        $this->assertTrue($community->__isset('raises'));
    }

    /**
     * Test getter and setter
     */
    public function testGetterAndSetter(): void
    {
        $community = new Community();
        $status = $community->__get('status');
        $community->__set('status', 50);
        $this->assertNotEquals($status, $community->__get('status'));

        $pot = $community->__get('pot');
        $community->__set('pot', 50);
        $this->assertNotEquals($pot, $community->__get('pot'));

        $raises = $community->__get('raises');
        $community->__set('raises', 50);
        $this->assertNotEquals($raises, $community->__get('raises'));
    }
}
