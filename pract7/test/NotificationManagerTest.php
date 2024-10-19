<?php

use \PHPUnit\Framework\TestCase;
use Alexander\Pract7\NotificationManager;
use Alexander\Pract7\EmailNotification;

class NotificationManagerTest extends TestCase
{
    public function testNotManagerNotEmpty()
    {
        $NotManager = new NotificationManager();

        $emailNotification = new EmailNotification();
        $emailNotification->setTheme("black");

        $NotManager->sendNotification($emailNotification, "Hello via Email");

        $this->assertNotEmpty($NotManager->getNotificationHistory());
    }

    public function testNotManagerNotEmptyLogFile()
    {
        $NotManager = new NotificationManager();

        $logFile = "notification.log";

        $file = fopen($logFile, "r");

        $this->assertFileExists($logFile);

        $content = fread($file, filesize($logFile));

        $this->assertNotEmpty($content);
        fclose($file);
    }
}
?>