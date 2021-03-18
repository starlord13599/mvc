<?php

namespace Block\Admin\Attribute\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        $this->addTab('Option', ['label' => 'Option', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
        $this->setDefaultTab('Form');
        return $this;
    }
}
