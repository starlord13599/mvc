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

            if (!array_key_exists('deal_item', $attributeData)) {
                $attributeData['deal_item'] = 0;
            }

            if (!array_key_exists('most_popular', $attributeData)) {
                $attributeData['most_popular'] = 0;
            }

            $product->setData($attributeData);

            $product->save();
            $this->redirect('form', 'Admin\Product', ['tabs' => 'Attribute'], false);
        }
    }
}
