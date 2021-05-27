<?php

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $customer = \Mage::getModel('Model\Customer');
        $collection = $customer->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('customerId', [
            'field' => 'customerId',
            'label' => 'Id',
            'type' => 'number'
        ]);

        $this->addColumn('firstName', [
            'field' => 'firstName',
            'label' => 'First Name',
            'type' => 'text'
        ]);

        $this->addColumn('phone', [
            'field' => 'phone',
            'label' => 'Phone',
            'type' => 'text'
        ]);

        $this->addColumn('email', [
            'field' => 'email',
            'label' => 'Email',
            'type' => 'decimal'
        ]);

        $this->addColumn('status', [
            'field' => 'status',
            'label' => 'Status',
            'type' => 'text'
        ]);

        $this->addColumn('groupId', [
            'field' => 'groupId',
            'label' => 'Group Id',
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
        return $this->getUrl()->getUrl('form', null, ['id' => $row->customerId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->customerId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "Customer List";
    }
}
