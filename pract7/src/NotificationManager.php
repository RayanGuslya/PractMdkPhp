<?php

namespace Alexander\Pract7;

use Alexander\Pract7\SendNotificationException;

class NotificationManager
{
    private $history = [];
    private $logFile = "notification.log";
    public function sendNotification(Notification $notification, $message)
    {
        try {
            $notification->send($message);
            $this->logStatus($notification);
            $this->history[] = [
                'type' => $notification->getType(),
                'status' => $notification->getStatus()
            ];
        } catch (SendNotificationException $e) {
            echo "error" . $e->getMessage() . '\n';
        }
    }

    public function getNotificationHistory()
    {
        return $this->history;
    }
    private function logStatus(Notification $notification)
    {
        $log = "status: " . $notification->getStatus() . " - " . "type: " . $notification->getType();
        file_put_contents($this->logFile, $log . PHP_EOL, FILE_APPEND);

    }
}
?>