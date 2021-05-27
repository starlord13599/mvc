<?php

namespace Controller\Admin\Product;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends Admin
{
    public function gridAction()
    {
    }

    public function addAction()
    {
        $dir = 'media/products/';
        $tmpName = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];

        if (!file_exists("$dir{$this->getRequest()->getGet('id')}")) {
            mkdir("$dir{$this->getRequest()->getGet('id')}", 0777, true);
        }

        $result = move_uploaded_file($tmpName, "$dir{$this->getRequest()->getGet('id')}/{$fileName}");

        if ($result) {

            $productMedia = \Mage::getModel('Model\Product\Media');

            $productMedia->image = "$dir{$this->getRequest()->getGet('id')}/{$fileName}";
            $productMedia->productId = $this->getRequest()->getGet('id');
            $productMedia->save();
            $this->redirect('form', 'admin\product');
        }
    }

    public function updateAction()
    {
        echo "<pre>";
        $productMedia = \Mage::getModel('Model\Product\Media');
        $data = $this->getRequest()->getPost();
        $fields = ['base', 'thumb', 'small'];

        foreach ($fields as $f) {
            foreach ($data as $dk => $d) {
                if (!array_key_exists($f, $d)) {
                    $data[$dk][$f] = 0;
                }
            }
        }

        foreach ($data as $k => $d) {
            $productMedia->load($k);
            $productMedia->setData($d);
            $productMedia->save();
        }

        $this->redirect('form', 'admin\product');
    }

    public function deleteAction()
    {
        $response = [
            'status' => 'success'
        ];
        $productMedia = \Mage::getModel('Model\Product\Media');


        $ids = $this->getRequest()->getPost('ids');
        foreach ($ids as $id) {
            $id = (int)$id;
            if (is_int($id)) {
                $productMedia->load($id);
                $image = $productMedia->getData('image');
                $productMedia->delete();

                unlink($image);
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
