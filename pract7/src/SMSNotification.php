<?php

namespace Alexander\Pract7;

use Alexander\Pract7\AbstractNotification;
use Alexander\Pract7\SmsNotificationException;

class SMSNotification extends AbstractNotification
{
    const max_length = 160;
    public function send($message)
    {
        if (empty($message)) {
            $this->status = "message is empty";
            throw new SmsNotificationException("error: message is empty");
        }

        if (strlen($message) >= self::max_length) {
            $this->status = "exceeded the length";
            throw new SmsNotificationException("error: exceeded the length");
        }

        $this->status = "sms sent successfully";
        $this->timestamp = date('Y-m-d H:i:s');
    }

    public function getType()
    {
        return "sms";
    }
}
?>