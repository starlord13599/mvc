<?php

namespace Block\Customer\Layout;

use Block\Core\Template;


class Left extends Template
{

    public function __construct()
    {
        $this->setTemplate('View/customer/layout/left.php');
    }
}
