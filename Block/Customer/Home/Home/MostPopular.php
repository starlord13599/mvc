<?php


namespace Block\Customer\Home\Home;

use Block\Core\Template;


class MostPopular extends  Template
{
    protected $products = null;

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home/mostpopular.php');
    }

    public function setProducts()
    {
        $products = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM `products` WHERE `deal_item` = 1 LIMIT 8";
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
