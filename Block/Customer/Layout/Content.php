<?php

namespace Block\Customer\Layout;

use Block\Core\Template;



class Content extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/customer/layout/content.php");
    }
}
