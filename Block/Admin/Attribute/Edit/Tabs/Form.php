<?php

namespace Block\Admin\Attribute\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Form extends Template
{
    use Traits;
    public function __construct()
    {
        $this->setTemplate('View/admin/attribute/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ((int) $this->getTableRow()->attributeId) {
            return 'Update Attribute';
        }
        return 'Create Attribute';
    }
}
