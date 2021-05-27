<?php

namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $payment = \Mage::getModel('Model\Payment');
        $collection = $payment->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('methodId', [
            'field' => 'methodId',
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

        $this->addColumn('status', [
            'field' => 'status',
            'label' => 'Status',
            'type' => 'decimal'
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
        return $this->getUrl()->getUrl('form', null, ['id' => $row->methodId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->methodId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "Payment List";
    }
}
