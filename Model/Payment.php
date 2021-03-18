<?php

namespace Model;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');

class Payment extends Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('payment method');
        $this->setPrimaryKey('methodId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE => "Enable",
            self::STATUS_DISABLE => "Disable"
        ];
    }
}
