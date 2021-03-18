<?php

namespace Block\Customer;

\Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/customer/layout.php');
        $this->prepareChildren();
    }

    public function prepareChildren()
    {

        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Footer'), 'footer');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Right'), 'right');
    }
}
