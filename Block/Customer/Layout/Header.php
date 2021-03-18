<?php

namespace Block\Customer\Layout;

use Block\Core\Template;

class Header extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/customer/layout/header.php");
    }
}
