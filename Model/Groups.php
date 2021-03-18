<?php

namespace Model;

use Model\Core\Table;

\Mage::getModel('Model\Core\Table');

class Groups extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customer_grp');
        $this->setPrimaryKey('groupId');
    }
}
