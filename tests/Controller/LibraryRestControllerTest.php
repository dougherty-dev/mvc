<?php

/**
 * Library process controller test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\LibraryResetController;

/** Test cases for class LibraryProcessController. */
class LibraryResetControllerTest extends WebTestCase
{
    /** Test instantiation of the class itself. */
    public function testLibraryResetController(): void
    {
        $this->assertInstanceOf("\App\Controller\LibraryResetController", new LibraryResetController());
    }
}
