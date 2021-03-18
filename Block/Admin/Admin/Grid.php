<?php

namespace Block\Admin\Admin;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $admins = null;
    // protected $templateName = null;


    public function __construct()
    {
        $this->setTemplate('./View/admin/admin/grid.php');
    }

    public function setAdmins($admins = null)
    {
        if (!$admins) {
            $admins = \Mage::getModel('Model\Admin');
            $admins = $admins->fetchAll();
            if ($admins) {
                $admins = $admins->getData();
            }
        }

        $this->admins = $admins;
        return $this;
    }

    public function getAdmins()
    {
        if (!$this->admins) {
            $this->setAdmins();
        }

        return $this->admins;
    }
}
