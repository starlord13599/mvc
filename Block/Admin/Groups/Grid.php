<?php

namespace Block\Admin\Groups;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');


class Grid extends Template
{

    protected $groups = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/groups/grid.php');
    }

    public function getGroups()
    {
        if (!$this->groups) {
            $this->setGroups();
        }

        return $this->groups;
    }

    public function setGroups($groups = null)
    {
        if (!$groups) {
            $groups = \Mage::getModel('Model\Groups');
            $groups = $groups->fetchAll()->getData();
        }

        $this->groups = $groups;
        return $this;
    }
}
