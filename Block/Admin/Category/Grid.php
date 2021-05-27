<?php

namespace Block\Admin\Category;


\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    protected $categoryOptions = null;


    public function prepareCollection()
    {
        $category = \Mage::getModel('Model\Category');
        $collection = $category->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('categoryId', [
            'field' => 'categoryId',
            'label' => 'Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->addColumn('parentId', [
            'field' => 'parentId',
            'label' => 'Parent Id',
            'type' => 'text'
        ]);

        $this->addColumn('pathId', [
            'field' => 'pathId',
            'label' => 'Path Id',
            'type' => 'decimal'
        ]);

        $this->addColumn('status', [
            'field' => 'status',
            'label' => 'status',
            'type' => 'text'
        ]);

        $this->addColumn('image', [
            'field' => 'image',
            'label' => 'Image',
            'type' => 'text'
        ]);

        $this->addColumn('featured', [
            'field' => 'featured',
            'label' => 'Featured',
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
        return $this->getUrl()->getUrl('form', null, ['id' => $row->categoryId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->categoryId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "Category List";
    }

    public function getName($category)
    {
        $categoryModel = \Mage::getModel('Model\Category');

        if (!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`";
            $options = $categoryModel->fetchPairs($query);
        }

        $pathIds = explode("=", $category->pathId);
        foreach ($pathIds as $key => &$id) {
            if (array_key_exists($id, $options)) {
                $id = $options[$id];
            }
        }
        $name = implode("/", $pathIds);
        return $name;
    }
}
