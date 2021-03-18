<?php

namespace Block\Admin\Shipment\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Shipment\Edit\Tabs\Form']);
        $this->setDefaultTab('Form');
        return $this;
    }
}
