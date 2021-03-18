<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Attribute extends Admin
{

    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\Attribute\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }


    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\Attribute\Edit');

            $attribute = \Mage::getModel('Model\Attribute');

            if ($id = (int)$this->getRequest()->getGet('id')) {
                $attribute = $attribute->load($id);

                if (!$attribute) {
                    throw new \Exception('record not found');
                }
            }

            $edit->setTableRow($attribute);

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

                $attribute = \Mage::getModel('Model\Attribute');
                $id = (int)$this->getRequest()->getGet('id');

                if ($id) {
                    $result = $attribute->load($id);
                    if (!$result) {
                        throw new \Exception('record not found');
                    }
                } else {
                }
                $attribute->setData($this->getRequest()->getPost('attribute'));

                if (!$attribute->save()) {
                    $this->getMessage()->setFailure('Unable to insert');
                } else {
                    $attribute->alterColumn();
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

                $attributeId = (int) $this->getRequest()->getGet('id');
                $attribute = \Mage::getModel('Model\Attribute');

                if ($attributeId) {
                    $result = $attribute->load($attributeId);
                }

                if (!$result) {
                    throw new \Exception("record Not found");
                }

                if ($attribute->delete()) {
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
