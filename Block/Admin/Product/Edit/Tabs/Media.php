<?php

namespace Block\Admin\Product\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Media extends Template
{
    use Traits;
    protected $medias = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/products/edit/tabs/media.php');
    }

    public function setMedias($medias = null)
    {
        if (!$medias) {
            $medias = \Mage::getModel('Model\Product\Media');
            $medias = $medias->fetchAll(null, "WHERE `productId`= {$this->getTableRow()->productId}");
        }

        if ($medias) {
            $medias = $medias->getData();
        }

        $this->media = $medias;
        return $this;
    }

    public function getMedias()
    {
        if (!$this->medias) {
            $this->setMedias();
        }

        return $this->media;
    }
}
