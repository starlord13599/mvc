<?php

namespace Model;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    const BACKEND_TYPE_VARCHAR = 'VARCHAR(20)';
    const BACKEND_TYPE_INT = 'INT(11)';
    const BACKEND_TYPE_DECIMAL = 'Decimal';
    const BACKEND_TYPE_TEXT = 'Text';

    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_DROPDOWN = 'dropdown';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_CHECKBOX = 'checkbox';

    const ENTITY_TYPE_CUSTOMER = 'Customer';
    const ENTITY_TYPE_PRODUCT = 'Product';


    public function __construct()
    {
        parent::__construct();
        $this->setTableName('attribute');
        $this->setPrimaryKey('attributeId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE => "Enable",
            self::STATUS_DISABLE => "Disable"
        ];
    }

    public function getBackendTypeOptions()
    {
        return [
            self::BACKEND_TYPE_VARCHAR => 'VARCHAR',
            self::BACKEND_TYPE_INT => 'Int',
            self::BACKEND_TYPE_DECIMAL => 'Decimal',
            self::BACKEND_TYPE_TEXT => 'Text',
        ];
    }

    public function getInputTypeOptions()
    {
        return [
            self::INPUT_TYPE_TEXT => 'text',
            self::INPUT_TYPE_SELECT => 'select',
            self::INPUT_TYPE_DROPDOWN => 'dropdown',
            self::INPUT_TYPE_CHECKBOX => 'checkbox',
        ];
    }
    public function getEntityTypes()
    {
        return [
            self::ENTITY_TYPE_CUSTOMER => 'customer',
            self::ENTITY_TYPE_PRODUCT => 'product',
        ];
    }

    public function getOptions()
    {
        $option = \Mage::getModel('Model\Attribute\Option\Option');
        $query = "SELECT * FROM `attributeoption` WHERE `attributeId` = {$this->attributeId}";
        $result = $option->fetchAll($query);

        if (!$result) {
            return null;
        }

        return $result->getData();
    }

    public function alterColumn()
    {
        $query = "ALTER TABLE {$this->backendModel}
                ADD
                `{$this->name}` {$this->backendType} ";

        $this->alter($query);

        return $this;
    }
}
