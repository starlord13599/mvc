<?php

namespace Model\Product;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');


class Media extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('media');
        $this->setPrimaryKey('mediaId');
    }
}
