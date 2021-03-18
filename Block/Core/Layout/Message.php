<?php

namespace Block\Core\Layout;

use Block\Core\Template;

class Message extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/core/layout/message.php");
    }
}
