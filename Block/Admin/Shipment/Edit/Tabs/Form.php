<?php

namespace Block\Admin\Shipment\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\traits');

class Form extends Template
{
    use Traits;
    public function __construct()
    {
        $this->setTemplate('View/admin/shipment/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ($id = (int) $this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Shipment';
        }
        return 'Create Shipment';
    }
}
