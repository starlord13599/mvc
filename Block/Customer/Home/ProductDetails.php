<?php

namespace Block\Customer\Home;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class ProductDetails extends  Template
{
    use Traits;
    public function __construct()
    {
        $this->setTemplate('View/customer/home/productdetails.php');
    }
}
