<?php

namespace Controller;

use Controller\Core\Customer;

\Mage::loadFileByClassName('Controller\Core\Customer');

class Home extends Customer
{

    public function indexAction()
    {
        $grid = \Mage::getBlock('Block\Customer\Home\Home');
        $slider = \Mage::getBlock('Block\Customer\Home\Home\Slider');
        $featuredCat = \Mage::getBlock('Block\Customer\Home\Home\FeaturedCat');
        $featuredPro = \Mage::getBlock('Block\Customer\Home\Home\FeaturedPro');
        $mostpopular = \Mage::getBlock('Block\Customer\Home\Home\MostPopular');

        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $content->addChild($grid);
        $content->addChild($slider);
        $content->addChild($featuredCat);
        $content->addChild($featuredPro);
        $content->addChild($mostpopular);

        $this->renderLayout();
    }
}
