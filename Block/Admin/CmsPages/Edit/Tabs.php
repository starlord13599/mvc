<?php

namespace Block\Admin\CmsPages\Edit;


\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Cmspages\Edit\Tabs\Form']);
        $this->setDefaultTab('Form');
        return $this;
    }
}
