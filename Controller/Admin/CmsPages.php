<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class CmsPages extends Admin
{
    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\CmsPages\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }

    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\CmsPages\Edit');

            $cmspages = \Mage::getModel('Model\CmsPages');


            if ($id = (int) $this->getRequest()->getGet('id')) {
                $cmspages = $cmspages->load($id);

                if (!$cmspages) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($cmspages);

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

                $cmspage = \Mage::getModel('Model\CmsPages');
                $id = (int)$this->getRequest()->getGet('id');

                if ($id) {
                    $result = $cmspage->load($id);
                    if (!$result) {
                        throw new \Exception('record not found');
                    }
                } else {
                    $cmspage->createdDate = date('Y-m-d H:i:s');
                }
                $cmspage->setData($this->getRequest()->getPost('cmspage'));

                if (!$cmspage->save()) {
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

                $cmsId = (int) $this->getRequest()->getGet('id');
                $cmspage = \Mage::getModel('Model\CmsPages');

                if ($cmsId) {
                    $result = $cmspage->load($cmsId);
                }

                if (!$result) {
                    throw new \Exception("record Not found");
                }

                if ($cmspage->delete()) {
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
