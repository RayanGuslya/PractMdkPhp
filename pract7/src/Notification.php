<?php

namespace Alexander\Pract7;

interface Notification
{
    public function send($message);
    public function getStatus();
    public function getType();
}
?>