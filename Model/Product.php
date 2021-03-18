<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');


class Product extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('products');
        $this->setPrimaryKey('productId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE => "Enable",
            self::STATUS_DISABLE => "Disable"
        ];
    }

    public function getBaseImage()
    {
        $media = \Mage::getModel('Model\Product\Media');
        $query = "SELECT `mediaId`,`image` FROM `media`
                   WHERE `productId`= {$this->productId} AND `base`=1 ";

        $media = $media->fetchRow($query);
        if (!$media) {
            return false;
        }
        return $media->image;
    }
}
