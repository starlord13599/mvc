<?php

namespace Block\Admin\Cmspages;

use Block\Core\Template;

class Grid extends Template
{
    protected $cmspages = null;

    public function __construct()
    {
        $this->templateName  = './View/admin/cmspages/grid.php';
    }

    public function setCmsPages($cmspages = null)
    {
        if (!$cmspages) {
            $cmspages = \Mage::getModel('Model\CmsPages');
            $cmspages = $cmspages->fetchAll();

            if ($cmspages) {
                $cmspages = $cmspages->getData();
            }
        }

        $this->cmspages = $cmspages;
        return $this;
    }

    public function getCmsPages()
    {
        if (!$this->cmspages) {
            $this->setCmsPages();
        }

        return $this->cmspages;
    }
}
