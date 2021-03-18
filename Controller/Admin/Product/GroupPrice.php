<?php

namespace Controller\Admin\Product;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class GroupPrice extends Admin
{
    public function gridAction()
    {
    }

    public function saveAction()
    {
        $productId = $this->getRequest()->getGet('id');
        $data = $this->getRequest()->getPost('groupPrice');

        foreach ($data['Old'] as $groupId => $price) {
            $query = "SELECT *  FROM `product_group_price` 
                        WHERE productId = '{$productId}' 
                            AND customerGroupId = '{$groupId}'";

            $groupPrice = \Mage::getModel('Model\Product\GroupPrice');
            $groupPrice->fetchRow($query);
            $groupPrice->price = $price;
            $groupPrice->save();
        }

        foreach ($data['New'] as $groupId => $price) {
            $groupPrice = \Mage::getModel('Model\Product\GroupPrice');
            $groupPrice->price = $price;
            $groupPrice->productId = $productId;
            $groupPrice->customerGroupId = $groupId;
            $groupPrice->save();
        }

        $this->redirect('form', 'admin\product');
    }
}
