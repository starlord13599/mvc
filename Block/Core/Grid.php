<?php

namespace Block\Core;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $collection = null;
    protected $columns = [];
    protected $actions = [];
    protected $buttons = [];
    protected $session = null;

    public function __construct()
    {
        $this->setTemplate('./View/core/grid.php');
        $this->prepareColumns();
        $this->prepareActions();
        $this->prepareButtons();
    }

    public function prepareCollection()
    {
        return $this;
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;
        return $this;
    }

    public function getCollection()
    {
        if (!$this->collection) {
            $this->prepareCollection();
        }

        return $this->collection;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function addColumn($key, $value)
    {
        $this->columns[$key] = $value;
        return $this;
    }

    public function prepareColumns()
    {
        return $this;
    }

    public function getFieldValue($row, $value)
    {
        return $row->$value;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function addActions($key, $value)
    {
        $this->actions[$key] = $value;
        return $this;
    }

    public function prepareActions()
    {
        return $this;
    }

    public function getMethodUrl($row = null, $methodName = null)
    {
        return $this->$methodName($row);
    }

    public function getEditUrl($row)
    {
        return $this;
    }

    public function getDeleteUrl($row)
    {
        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function addButtons($key, $value)
    {
        $this->buttons[$key] = $value;
        return $this;
    }

    public function prepareButtons()
    {
        return $this;
    }

    public function getCreateUrl()
    {
        return $this;
    }

    public function getTitle()
    {
        return "Module List";
    }

    public function setSession()
    {
        $this->session = \Mage::getModel('Model\Admin\Session');
        return $this;
    }

    public function getSession()
    {
        if (!$this->session) {
            $this->setSession();
        }

        return $this->session;
    }
}
