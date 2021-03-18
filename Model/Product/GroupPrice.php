<?php

namespace Model\Product;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');


class GroupPrice extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('product_group_price');
        $this->setPrimaryKey('entityId');
    }
}
