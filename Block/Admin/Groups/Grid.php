<?php

namespace Block\Admin\Groups;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $groups = \Mage::getModel('Model\Groups');
        $collection = $groups->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('groupId', [
            'field' => 'groupId',
            'label' => 'Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->addColumn('value', [
            'field' => 'value',
            'label' => 'Value',
            'type' => 'text'
        ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'label' => 'Created Date',
            'type' => 'text'
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
        return $this->getUrl()->getUrl('form', null, ['id' => $row->groupId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->groupId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "Customer Group List";
    }
}
