<?php

namespace Alexander\Pract7;

use Alexander\Pract7\AbstractNotification;
use Exception;

class EmailNotification extends AbstractNotification
{
    private $theme;

    public function send($message)
    {
        if (empty($message)) {
            $this->status = "message is empty";
            throw new Exception("error: message is empty");
        }

        if (empty($this->theme)) {
            $this->status = "theme is empty";
            throw new Exception("error: theme is empty");
        }

        $this->status = "email sent successfully";
        $this->timestamp = date('Y-m-d H:i:s');
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
    }
    public function getTheme()
    {
        return $this->theme;
    }

    public function getType()
    {
        return "Email";
    }
}

?>