<?php

namespace Block\Admin\Layout;

use Block\Core\Template;

class Header extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/core/layout/header.php");
    }
}
