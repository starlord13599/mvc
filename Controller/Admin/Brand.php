<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Brand extends Admin
{

    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\Brand\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }


    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\Brand\Edit');

            $brand = \Mage::getModel('Model\Brand');


            if ($id = (int) $this->getRequest()->getGet('id')) {
                $brand = $brand->load($id);

                if (!$brand) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($brand);

            $layout = $this->getLayout();

            $content = $layout->getChild('content');
            $content->addChild($edit);

            $this->renderLayout();
        } catch (\Exception $e) {
            echo 'Message:-' . $e->getMessage();
        }
    }

    public function addAction()
    {
        date_default_timezone_set('Asia/Kolkata');
        try {
            if ($this->getRequest()->isPost()) {

                $brand = \Mage::getModel('Model\Brand');
                $id = (int)$this->getRequest()->getGet('id');

                if ($id) {
                    $brand = $brand->load($id);
                    if (!$brand) {
                        throw new \Exception('record not found');
                    }

                    if ($image = $brand->brandImage) {
                        unlink($image);
                    }
                }
                $brand->setData($this->getRequest()->getPost('brand'));
                $brand->save();

                $dir = 'media/brands/';
                $tmpName = $_FILES['brand']['tmp_name']['brandImage'];
                $fileName = $_FILES['brand']['name']['brandImage'];

                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                $builtName = "{$dir}{$brand->brandId}_{$fileName}";

                $result = move_uploaded_file($tmpName, "{$builtName}");

                if ($result) {
                    $brand->brandImage = $builtName;
                }

                if (!$brand->save()) {
                    $this->getMessage()->setFailure('Unable to insert');
                } else {
                    $this->getMessage()->setSuccess('Inserted Successfully');
                }

                $this->redirect('grid', null, null, true);
                die;
            }
            throw new \Exception("Invalid Request");
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);
        }
    }

    public function deleteAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {

                $brandId = (int) $this->getRequest()->getGet('id');
                $brand = \Mage::getModel('Model\Brand');

                if ($brandId) {
                    $result = $brand->load($brandId);
                }

                if (!$result) {
                    throw new \Exception("record Not found");
                }
                $image = $brand->brandImage;

                if ($brand->delete() && unlink($image)) {
                    $this->getMessage()->setSuccess('Deleted Successfully');
                }

                $this->redirect('grid', null, null, true);
            } else {
                throw new \Exception('Invalid Request');
            }
        } catch (\Exception $e) {

            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);
        }
    }
}
