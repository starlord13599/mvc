<?php

namespace Block\Admin\Layout;

use Block\Core\Template;



class Content extends Template
{
    public function __construct()
    {
        $this->setTemplate("View/core/layout/content.php");
    }
}
