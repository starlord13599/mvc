<?php

namespace Model\Attribute\Option;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');

class Option extends Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('attributeoption');
        $this->setPrimaryKey('optionId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE => "Enable",
            self::STATUS_DISABLE => "Disable"
        ];
    }
}
