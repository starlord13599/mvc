<?php

namespace Block\Admin\Admin\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Admin\Edit\Tabs\Form']);
        $this->setDefaultTab('Form');
        return $this;
    }
}
