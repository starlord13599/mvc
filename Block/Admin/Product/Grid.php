<?php

namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $session = $this->getSession();
        $products = \Mage::getModel('Model\Product');

        $id = $session->productId;
        $name = $session->name;
        $price = $session->price;

        $session->destroy();

        $query = "SELECT * FROM `products`
             WHERE 
             `productId` LIKE '%{$id}%'
                AND `name` LIKE '%{$name}%'
                AND `price` LIKE '%{$price}%'";

        $collection = $products->fetchAll($query);
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('productId', [
            'field' => 'productId',
            'label' => 'Product Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Product Name',
            'type' => 'text'
        ]);

        $this->addColumn('price', [
            'field' => 'price',
            'label' => 'Product Price',
            'type' => 'number'
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
        return $this->getUrl()->getUrl('form', null, ['id' => $row->productId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete', null, ['id' => $row->productId]);
    }

    public function getCreateUrl()
    {
        return $this->getUrl()->getUrl('form');
    }

    public function getTitle()
    {
        return "Product List";
    }
}
