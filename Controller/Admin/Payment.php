<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Payment extends Admin
{

    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\Payment\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }


    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\Payment\Edit');

            $payment = \Mage::getModel('Model\Payment');


            if ($id = (int) $this->getRequest()->getGet('id')) {
                $payment = $payment->load($id);

                if (!$payment) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($payment);

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

                $payment = \Mage::getModel('Model\Payment');
                $id = (int)$this->getRequest()->getGet('id');

                if ($id) {
                    $result = $payment->load($id);
                    if (!$result) {
                        throw new \Exception('record not found');
                    }
                } else {
                    $payment->createdDate = date('Y-m-d H:i:s');
                }
                $payment->setData($this->getRequest()->getPost('payment'));

                if (!$payment->save()) {
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

                $paymentId = (int) $this->getRequest()->getGet('id');
                $payment = \Mage::getModel('Model\Payment');

                if ($paymentId) {
                    $result = $payment->load($paymentId);
                }

                if (!$result) {
                    throw new \Exception("record Not found");
                }

                if ($payment->delete()) {
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
