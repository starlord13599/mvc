<?php

namespace Block\Core\Edit;

use Block\Core\Template;


class Tabs extends Template
{
    protected $tabs = [];
    protected $defaultTab = null;
    protected $tableRow = null;

    public function __construct()
    {
        $this->setTemplate('View/core/edit/tabs.php');
        $this->prepareTabs();
    }

    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function prepareTabs()
    {
        return $this;
    }

    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setDefaultTab($value)
    {
        $this->defaultTab = $value;
        return $this;
    }


    public function setTabs(array $tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function addTab($key, $value = [])
    {
        $this->tabs[$key] = $value;
    }

    public function getTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }

        return $this->tabs[$key];
    }

    public function removeTab($key)
    {
        if (array_key_exists($key, $this->tabs)) {
            unset($this->tabs[$key]);
        }
        return $this;
    }
}
