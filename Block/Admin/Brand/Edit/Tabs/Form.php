<?php

namespace Block\Admin\Brand\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Form extends Template
{
    use Traits;
    protected $brand = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/brand/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ((int) $this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Brand';
        }
        return 'Create Brand';
    }
}
