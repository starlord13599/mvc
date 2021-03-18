<?php

namespace Block\Customer\Layout;

use Block\Core\Template;


class Right extends Template
{

    public function __construct()
    {
        $this->setTemplate('View/customer/layout/right.php');
    }
}
