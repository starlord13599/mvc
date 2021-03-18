<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Admin extends \Controller\Core\Admin
{


    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\Admin\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }


    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\Admin\Edit');

            $admin = \Mage::getModel('Model\Admin');


            if ($id = (int) $this->getRequest()->getGet('id')) {
                $admin = $admin->load($id);

                if (!$admin) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($admin);

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

                $admin = \Mage::getModel('Model\Admin');
                $id = (int)$this->getRequest()->getGet('id');
                if ($id) {
                    $result = $admin->load($id);
                    if (!$result) {
                        throw new \Exception('record not found');
                    }
                } else {
                    $admin->createdDate = date('Y-m-d H:i:s');
                }
                $admin->setData($this->getRequest()->getPost('admin'));

                if (!$admin->save()) {
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

                $adminId = (int) $this->getRequest()->getGet('id');
                $admin = \Mage::getModel('Model\Admin');

                if ($adminId) {
                    $result = $admin->load($adminId);
                }

                if (!$result) {
                    throw new \Exception("record Not found");
                }


                if ($admin->delete()) {
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
