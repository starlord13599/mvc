<?php

namespace Block\Admin\Product\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;


\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');


class Attribute extends Template
{

    use Traits;
    protected $attributes = null;
    public function __construct()
    {
        $this->setTemplate('View/admin/products/edit/tabs/attribute.php');
    }

    public function setAttributes()
    {
        $attributeModel = \Mage::getModel('Model\Attribute');
        $query = "SELECT *
            FROM `{$attributeModel->getTableName()}`
            WHERE `entityTypeId` = 'product'
                ORDER BY `sortOrder` ASC";
        $this->attributes = $attributeModel->fetchAll($query)->getData();
        return $this;
    }

    public function getAttributes()
    {
        if (!$this->attributes) {
            $this->setAttributes();
        }
        return $this->attributes;
    }
}
