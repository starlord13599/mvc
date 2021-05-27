<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Product extends Admin
{


    public function gridAction()
    {
        $grid  = \Mage::getBlock('block\admin\product\grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }

    public function formAction()
    {
        try {
            $product = \Mage::getModel('Model\Product');

            $edit = \Mage::getBlock('Block\Admin\Product\Edit');

            if ($id = (int) $this->getRequest()->getGet('id')) {
                $product = $product->load($id);

                if (!$product) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($product);

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

                $product = \Mage::getModel('Model\Product');
                $id = (int)$this->getRequest()->getGet('id');
                if ($id) {

                    $result = $product->load($id);
                    if (!$result) {
                        throw new \Exception("Record Not Found");
                    }

                    $product->updatedDate = date('Y-m-d H:i:s');
                } else {

                    $product->createdDate = date('Y-m-d H:i:s');
                    $product->updatedDate = date('Y-m-d H:i:s');
                }

                $product->setData($this->getRequest()->getPost('product'));


                if (!$product->save()) {
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

                $productId = (int) $this->getRequest()->getGet('id');
                $product = \Mage::getModel('Model\Product');

                if ($productId) {
                    $result = $product->load($productId);
                }

                if (!$result) {
                    throw new \Exception("Record Not Found");
                }

                if ($product->delete()) {
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


    public function testAction()
    {
        echo "<pre>";

        $session = $this->getSession();

        $postData = $this->getRequest()->getPost('filter');

        foreach ($postData as $key => $data) {
            $session->$key = $data;
        }

        $this->redirect('grid', null, null, true);
    }
}
