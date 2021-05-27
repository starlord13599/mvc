<?php


namespace Block\Customer\Home\Home;

use Block\Core\Template;


class Slider extends  Template
{

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home/slider.php');
    }
}
