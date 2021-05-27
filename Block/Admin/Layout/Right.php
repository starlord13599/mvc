<?php

namespace Block\Admin\Layout;

use Block\Core\Template;


class Right extends Template
{

    public function __construct()
    {
        $this->setTemplate('View/core/layout/right.php');
    }
}
