<?php

namespace Block\Customer\Layout;

use Block\Core\Template;

class Header extends Template
{
    protected $category  = null;

    public function __construct()
    {
        $this->setTemplate("View/customer/layout/header.php");
    }


    public function setCategories()
    {
        $category = \Mage::getModel('Model\Category');
        $query = "SELECT * FROM `category` WHERE `parentId` = 0";
        $category = $category->fetchAll($query);

        if ($category) {
            $category = $category->getData();
        }

        $this->category = $category;
        return $this;
    }

    public function getCategories()
    {
        if (!$this->category) {
            $this->setCategories();
        }
        return $this->category;
    }
}
