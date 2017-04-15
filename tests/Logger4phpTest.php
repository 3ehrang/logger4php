<?php
namespace I3ehrang\Logger4php;

use PHPUnit_Framework_TestCase;

class Logger4phpTest extends PHPUnit_Framework_TestCase {

    public function testLogger4phpHasLogger()
    {
        $logger = new Logger4php();
        $this->assertTrue($logger->hasLogger());
    }

}