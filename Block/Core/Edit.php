<?php

namespace Block\Core;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Edit  extends Template
{

    use Traits;
    protected $tabs = null;
    protected $tabClass = null;

    public function __construct()
    {
        $this->setTemplate('View/core/edit.php');
    }

    public function setTabClass($tabClass = null)
    {
        if (!$tabClass) {
            $tabClass = $tabClass;
        }
        $this->tabClass = $tabClass;
        return $this;
    }

    public function getTabClass()
    {
        return $this->tabClass;
    }

    public function getTabs()
    {

        if (!$this->tabs) {
            $this->setTabs();
        }
        return $this->tabs;
    }

    public function setTabs($tabs = null)
    {
        if (!$tabs) {
            $tabs = $this->getTabClass();
        }
        $this->tabs = $tabs;
        return $this;
    }

    public function getTabContents()
    {
        $tab = $this->getRequest()->getGet('tabs', $this->getTabs()->getDefaultTab());
        $blockName =  $this->getTabs()->getTabs()[$tab]['block'];
        $block = \Mage::getBlock($blockName);
        $block->setTableRow($this->getTableRow());

        echo $block->toHtml();
    }

    public function getTabHtml()
    {

        return $this->getTabs()->toHtml();
    }
}
