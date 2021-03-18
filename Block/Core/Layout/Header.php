<?php

namespace Block\Core\Layout;

use Block\Core\Template;

class Header extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/core/layout/header.php");
    }
}
