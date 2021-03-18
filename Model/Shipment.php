<?php

namespace Model;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');

class Shipment extends Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('shipment method');
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
