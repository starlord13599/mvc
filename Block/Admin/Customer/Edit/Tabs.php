<?php

namespace Block\Admin\Customer\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('Customer Information', ['label' => 'Customer Information', 'block' => 'Block\Admin\Customer\Edit\Tabs\Form']);
        $this->addTab('Address', ['label' => 'Address', 'block' => 'Block\Admin\Customer\Edit\Tabs\Address']);
        $this->setDefaultTab('Customer Information');
        return $this;
    }
}
