<?php

namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $collection = $attribute->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('attributeId', [
            'field' => 'attributeId',
            'label' => 'Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->addColumn('code', [
            'field' => 'code',
            'label' => 'Code',
            'type' => 'text'
        ]);

        $this->addColumn('entityTypeId', [
            'field' => 'entityTypeId',
            'label' => 'Entity Type',
            'type' => 'decimal'
        ]);

        $this->addColumn('backendType', [
            'field' => 'backendType',
            'label' => 'Backend Type',
            'type' => 'decimal'
        ]);

        $this->addColumn('inputType', [
            'field' => 'inputType',
            'label' => 'Input Type',
            'type' => 'decimal'
        ]);

        $this->addColumn('sortOrder', [
            'field' => 'sortOrder',
            'label' => 'Sort Order',
            'type' => 'decimal'
        ]);

        $this->addColumn('backendModel', [
            'field' => 'backendModel',
            'label' => 'Backend Model',
            'type' => 'decimal'
        ]);
        return $this;
    }

    public function prepareActions()
    {
        $this->addActions('edit', [
            'label' => 'Edit',
            'method' => 'getEditUrl',
            'class' => 'btn btn-primary'
        ]);
        $this->addActions('delete', [
            'label' => 'Delete',
            'method' => 'getDeleteUrl',
            'class' => 'btn btn-danger'
        ]);
        return $this;
    }

    public function prepareButtons()
    {
        $this->addButtons('Create', [
            'label' => 'Create',
            'method' => 'getCreateUrl',
            'class' => 'btn btn-primary'
        ]);
    }

    public function getEditUrl($row)
    {
        return $this->getUrl()->getUrl('form', null, ['id' => $row->attributeId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->attributeId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "Attribute List";
    }
}
