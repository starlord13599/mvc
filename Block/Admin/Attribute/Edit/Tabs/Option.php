<?php

namespace Block\Admin\Attribute\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Option extends Template
{
    use Traits;
    public function __construct()
    {
        $this->setTemplate('View/admin/attribute/edit/tabs/option.php');
    }
}
