<?php

namespace Block\Admin\Layout;

use Block\Core\Template;



class Footer extends Template
{

    public function __construct()
    {
        $this->setTemplate('View/core/layout/footer.php');
    }
}
