<?php

namespace Block\Admin\Cmspages;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $cmspages = \Mage::getModel('Model\CmsPages');
        $collection = $cmspages->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('pageId', [
            'field' => 'pageId',
            'label' => 'Id',
            'type' => 'number'
        ]);

        $this->addColumn('title', [
            'field' => 'title',
            'label' => 'Title',
            'type' => 'text'
        ]);

        $this->addColumn('identifier', [
            'field' => 'identifier',
            'label' => 'Identifier',
            'type' => 'text'
        ]);

        $this->addColumn('content', [
            'field' => 'content',
            'label' => 'Content',
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
        return $this->getUrl()->getUrl('form', null, ['id' => $row->pageId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->pageId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "CMS Pages";
    }
}
