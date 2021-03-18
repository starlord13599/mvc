<?php

namespace Controller\Admin\Attribute;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Option extends Admin
{
    public function addAction()
    {
        echo "<pre>";

        $postData = $this->getRequest()->getPost();
        $option = \Mage::getModel('Model\Attribute\Option\Option');
        $attributeId = (int) $this->getRequest()->getGet('id');

        if (array_key_exists('exist', $postData)) {

            foreach ($postData['exist'] as $id =>  $data) {
                $option->load($id);
                $option->setData($data);
                $option->save();
                $option->unsetData();
            }
        }
        if (array_key_exists('new', $postData)) {

            $final = array_combine($postData['new']['name'], $postData['new']['sortOrder']);

            foreach ($final as $name => $sortOrder) {
                $option->name = $name;
                $option->attributeId = $attributeId;
                $option->sortOrder = $sortOrder;
                $option->save();
                $option->unsetData();
            }
        }

        $this->redirect('form', 'Admin\Attribute',  ['tabs' => 'Option']);
    }
}
