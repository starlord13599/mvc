<?php

namespace Block\Admin\Groups\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;


\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Form extends Template
{
    use Traits;
    public function __construct()
    {
        $this->setTemplate('View/admin/groups/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ($this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Group';
        }
        return 'Create Group';
    }
}
