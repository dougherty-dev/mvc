<?php

/**
 * Log test class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use RangeException;
use App\Entity\Log;
use DateTime;

/** Test cases for class Log. */
class LogTest extends TestCase
{
    /**
     * Construct object with argument and verify that the object has the expected properties.
     */
    public function testCreateObject(): void
    {
        $log = new Log();
        $this->assertInstanceOf("\App\Entity\Log", $log);

        $id = rand(0, 1000);
        $log->setId($id);
        $getId = $log->getId();
        $this->assertEquals($id, $getId);

        $event = md5(strval(mt_rand()));
        $log->setEvent($event);
        $getEvent = $log->getEvent();
        $this->assertEquals($event, $getEvent);

        $time = new DateTime('@' . mt_rand(1, time()));
        $log->setTime($time);
        $getTime = $log->getTime();
        $this->assertEquals($time, $getTime);
    }
}
