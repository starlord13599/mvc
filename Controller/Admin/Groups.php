<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Groups extends Admin
{
    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Groups\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $content->addChild($grid);

        $this->renderLayout();
    }

    public function formAction()
    {
        $edit = \Mage::getBlock('Block\Admin\Groups\Edit');

        $groups = \Mage::getModel('Model\Groups');

        if ($id = (int) $this->getRequest()->getGet('id')) {
            $groups = $groups->load($id);

            if (!$groups) {
                throw new \Exception("Record Not Found");
            }
        }

        $edit->setTableRow($groups);

        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $content->addChild($edit);

        $this->renderLayout();
    }

    public function addAction()
    {
        try {
            $group = \Mage::getModel('Model\Groups');
            if ($this->getRequest()->isPost()) {
                if ($id = (int)$this->getRequest()->getGet('id')) {
                    $result = $group->load($id);
                    if (!$result) {
                        throw new \Exception("Unable to Find record");
                    }
                }

                $group->setData($this->getRequest()->getPost('groups'));


                if ($group->save()) {
                    $this->getMessage()->setSuccess('Inserted Successfully');
                    $this->redirect('grid', null, null, true);
                } else {
                    $this->getMessage()->setFailure('unable to insert');
                    $this->redirect('grid', null, null, true);
                };

                die;
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);
            die;
        }
    }

    public function deleteAction()
    {
        try {
            $group = \Mage::getModel('Model\Groups');

            if ($id = (int) $this->getRequest()->getGet('id')) {
                $result = $group->load($id);
                if (!$result) {
                    throw new \Exception('record not found');
                }
            }

            $group->load($id);
            $group->delete();
            $this->getMessage()->setSuccess('Deleted Successfully');
            $this->redirect('grid', null, null, true);
            die;
        } catch (\Exception $e) {
            $this->getMessage()->setSuccess($e->getMessage());
            $this->redirect('grid', null, null, true);
            die;
        }
    }
}
