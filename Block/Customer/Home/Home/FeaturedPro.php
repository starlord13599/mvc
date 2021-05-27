<?php


namespace Block\Customer\Home\Home;

use Block\Core\Template;


class FeaturedPro extends  Template
{
    protected $products = null;

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home/featuredPro.php');
    }

    public function setProducts()
    {
        $products = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM `products` WHERE `most_popular` = 1 LIMIT 8";
        $products = $products->fetchAll($query);

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
}
