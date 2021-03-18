<?php

namespace Model;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');

class Customer extends Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customer');
        $this->setPrimaryKey('customerId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE => "Enable",
            self::STATUS_DISABLE => "Disable"
        ];
    }
}
