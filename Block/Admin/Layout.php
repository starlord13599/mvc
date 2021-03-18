<?php

namespace Block\Admin;


class Layout extends \Block\Core\Layout
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/layout.php');
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'), 'footer');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Right'), 'right');
    }
}
