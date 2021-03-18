<?php

namespace Controller;

use Controller\Core\Customer;

\Mage::loadFileByClassName('Controller\Core\Customer');

class Home extends Customer
{

    public function indexAction()
    {
        $grid = \Mage::getBlock('Block\Customer\Home\Home');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $content->addChild($grid);
        $this->renderLayout();
    }

    public function loginAction()
    {
        $grid = \Mage::getBlock('Block\Customer\Home\Login');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $content->addChild($grid);
        $this->renderLayout();
    }

    public function productdetailsAction()
    {
        $grid = \Mage::getBlock('Block\Customer\Home\ProductDetails');

        $product = \Mage::getModel('Model\Product');

        if ($id = (int) $this->getRequest()->getGet('id')) {
            $product = $product->load($id);

            if (!$product) {
                throw new \Exception("Record Not Found");
            }
        }

        $grid->setTableRow($product);


        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $content->addChild($grid);
        $this->renderLayout();
    }

    public function afterLogin()
    {
    }
}
