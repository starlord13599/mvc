<?php


namespace Block\Customer\Home\Home;

use Block\Core\Template;


class FeaturedCat extends  Template
{
    protected $categories = null;

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home/featuredCat.php');
    }

    public function setCategories()
    {
        $categories = \Mage::getModel('Model\Category');
        $query = "SELECT * FROM `category` WHERE `parentId` = 0 LIMIT 4";
        $categories = $categories->fetchAll($query);

        if ($categories) {
            $categories = $categories->getData();
        }

        $this->categories = $categories;
        return $this;
    }

    public function getCategories()
    {
        if (!$this->categories) {
            $this->setCategories();
        }
        return $this->categories;
    }
}
