<?php

namespace Block\Admin\Groups;

\Mage::getBlock('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Groups\Edit\Tabs'));
    }

    public function getTitle()
    {
        if ($this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Group';
        }
        return 'Create Group';
    }
}
