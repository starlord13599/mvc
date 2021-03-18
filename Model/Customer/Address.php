<?php

namespace Model\Customer;

use Model\Core\Table;

\Mage::getModel('Model\Core\Table');

class Address extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customer_address');
        $this->setPrimaryKey('addressId');
    }
}
