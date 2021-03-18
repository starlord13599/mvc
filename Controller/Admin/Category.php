<?php

namespace Controller\Admin;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Category extends Admin
{

    public function gridAction()
    {
        $grid  = \Mage::getBlock('Block\Admin\Category\Grid');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid);

        $this->renderLayout();
    }


    public function formAction()
    {
        try {
            $edit = \Mage::getBlock('Block\Admin\Category\Edit');
            $category = \Mage::getModel('Model\Category');

            if ($id = (int) $this->getRequest()->getGet('id')) {
                $category = $category->load($id);

                if (!$category) {
                    throw new \Exception("Record Not Found");
                }
            }

            $edit->setTableRow($category);

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
        try {
            $category = \Mage::getModel('Model\Category');
            if ($this->getRequest()->isPost()) {


                if ($categoryId = $this->getRequest()->getGet('id')) {
                    $category->load($categoryId);

                    if (!$category) {
                        throw new \Exception("Unable to load");
                    }
                };
                $categoryPathId = $category->pathId;

                $data = $this->getRequest()->getPost('category');
                $category->setData($data);
                $category->save();

                $category->updatePathId();

                $category->updateChildrenPathIds($categoryPathId);

                $this->getMessage()->setSuccess('Inserted Suucessfully');
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
            $category = \Mage::getModel('Model\Category');

            if (!$this->getRequest()->isPost()) {

                if ($categoryId = $this->getRequest()->getGet('id')) {
                    $category->load($categoryId);

                    if (!$category) {
                        throw new \Exception("Unable to load");
                    }
                };

                $pathId = $category->pathId;
                $parentId = $category->parentId;
                $category->updateChildrenPathIds($pathId, $parentId);
                $category->delete();

                $this->getMessage()->setSuccess('Deleted Suucessfully');
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
