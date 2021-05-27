<?php

namespace Block\Admin\Layout;

use Block\Core\Template;

class Message extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/core/layout/message.php");
    }
}
