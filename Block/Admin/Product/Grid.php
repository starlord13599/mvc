<?php

namespace Block\Admin\Product;

use Block\Core\Template;

// \Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $products = null;

    public function __construct()
    {
        $this->templateName  = './View/admin/products/grid.php';
    }

    public function setProducts($products = null)
    {
        if (!$products) {
            $product = \Mage::getModel('Model\Product');
            $products = $product->fetchAll();
            if ($products) {
                $products = $products->getData();
            }
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
