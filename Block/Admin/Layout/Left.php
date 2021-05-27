<?php

namespace Block\Admin\Layout;

use Block\Core\Template;


class Left extends Template
{

    public function __construct()
    {
        $this->setTemplate('View/core/layout/left.php');
    }
}
