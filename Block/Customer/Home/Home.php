<?php


namespace Block\Customer\Home;

use Block\Core\Template;


class Home extends  Template
{
    protected $products = null;
    protected $categories = null;

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home.php');
    }

    public function setProducts()
    {
        $products = \Mage::getModel('Model\Product');
        $products = $products->fetchAll();

        if ($products) {
            $products = $products->getData();
        }

        $this->products = $products;
        return $this;
    }

    public function getProducts()
    {
        if (!$this->products) {
            $this->setProducts();
        }
        return $this->products;
    }

    public function setCategories()
    {
        $categories = \Mage::getModel('Model\Category');
        $query = "SELECT * FROM `category` WHERE `parentId` = 0";
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
