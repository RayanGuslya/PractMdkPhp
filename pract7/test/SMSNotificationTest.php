<?php

use \PHPUnit\Framework\TestCase;
use Alexander\Pract7\SMSNotification;

class SMSNotificationTest extends TestCase
{
    public function testSMSNotificationInstanceOf()
    {
        $SMSNot = new SMSNotification();

        $this->assertInstanceOf(SMSNotification::class, $SMSNot);
    }

}
?>