<?php

namespace Alexander\Pract7;

abstract class AbstractNotification implements Notification
{
    protected $status;
    protected $timestamp;

    public function getStatus()
    {
        return $this->timestamp . " " . $this->status;
    }
    abstract public function send($message);
}
?>