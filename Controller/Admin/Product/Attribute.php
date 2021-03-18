<?php

namespace Controller\Admin\Product;

use Controller\Core\Admin;

\Mage::getController('Controller\Core\Admin');

class Attribute extends Admin
{
    public function addAction()
    {

        if ($this->getRequest()->isPost()) {
            $product = \Mage::getModel('Model\Product');
            $id = (int)$this->getRequest()->getGet('id');

            if ($id) {
                $product->load($id);

                if (!$product) {
                    throw new \Exception('Not Found');
                }
            }

            $attributeData = $this->getRequest()->getPost('product');

            $product->setData($attributeData);
            $product->save();
            $this->redirect('form', 'Admin\Product', ['tabs' => 'Attribute'], false);
        }
    }
}
