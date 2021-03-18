<?php

namespace Block\Customer\Home;

use Block\Core\Template;

class Login extends  Template
{
    public function __construct()
    {
        $this->setTemplate('View/customer/home/login.php');
    }
}
