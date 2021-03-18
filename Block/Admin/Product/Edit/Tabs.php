<?php

namespace Block\Admin\Product\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('Product', ['label' => 'Product Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Form']);
        $this->addTab('Media', ['label' => 'Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
        $this->addTab('GroupPrice', ['label' => 'Group Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
        $this->addTab('Attribute', ['label' => 'Attribute', 'block' => 'Block\Admin\Product\Edit\Tabs\Attribute']);
        $this->setDefaultTab('Product');
        return $this;
    }
}
