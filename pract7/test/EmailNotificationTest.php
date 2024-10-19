<?php

use \PHPUnit\Framework\TestCase;
use Alexander\Pract7\EmailNotification;

class EmailNotificationTest extends TestCase
{
    public function testSendMessageSame()
    {
        $emailNot = new EmailNotification();

        $emailNot->setTheme("emailTheme");
        $this->assertSame($emailNot->getTheme(), "emailTheme");
    }

    public function testEmailNotificationInstanceOf()
    {
        $emailNot = new EmailNotification();

        $this->assertInstanceOf(EmailNotification::class, $emailNot);
    }
}

?>