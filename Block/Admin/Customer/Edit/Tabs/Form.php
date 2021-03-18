<?php

namespace Block\Admin\Customer\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;


\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Form extends Template
{
    use Traits;
    protected $customer = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/customer/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ($this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Customer';
        }
        return 'Create Customer';
    }

    public function getGroupOptions()
    {
        $customerGroup = \Mage::getModel('Model\Groups');
        $query = "SELECT `groupId`,`name` FROM `{$customerGroup->getTableName()}`";

        $data = $customerGroup->fetchPairs($query);

        return $data;
    }
}
