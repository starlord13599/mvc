<?php

namespace Block\Customer\Layout;

use Block\Core\Template;



class Footer extends Template
{

    public function __construct()
    {
        $this->setTemplate('View/customer/layout/footer.php');
    }
}
