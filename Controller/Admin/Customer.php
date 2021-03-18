<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Customer extends Admin
{

    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\Customer\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }


    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\Customer\Edit');
            $customer = \Mage::getModel('Model\Customer');

            if ($id = (int) $this->getRequest()->getGet('id')) {
                $customer = $customer->load($id);

                if (!$customer) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($customer);

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

                $customer = \Mage::getModel('Model\Customer');
                $id = (int)$this->getRequest()->getGet('id');

                if ($id) {
                    $result = $customer->load($id);
                    if (!$result) {
                        throw new \Exception('record not found');
                    }
                    $customer->updatedDate = date('Y-m-d H:i:s');
                } else {
                    $customer->createdDate = date('Y-m-d H:i:s');
                    $customer->updatedDate = date('Y-m-d H:i:s');
                }

                $customer->setData($this->getRequest()->getPost('customer'));

                if (!$customer->save()) {
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

                $customerId = (int) $this->getRequest()->getGet('id');
                $customer = \Mage::getModel('Model\Customer');

                if ($customerId) {
                    $result = $customer->load($customerId);
                }

                if (!$result) {
                    throw new \Exception("record Not found");
                }


                if ($customer->delete()) {
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
