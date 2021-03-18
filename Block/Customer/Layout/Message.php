<?php

namespace Block\Customer\Layout;

use Block\Core\Template;

class Message extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/customer/layout/message.php");
    }
}
