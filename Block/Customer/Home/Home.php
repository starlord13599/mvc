<?php


namespace Block\Customer\Home;

use Block\Core\Template;


class Home extends  Template
{

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home.php');
    }
}
