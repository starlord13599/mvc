<?php

namespace Model\Core;


\Mage::loadFileByClassName('Model\Core\Adapter');

class Table
{
    protected $adapter = null;
    protected $data = [];
    protected $primaryKey = null;
    protected $tableName = null;

    public function __construct()
    {
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setAdapter()
    {
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
        return $this;
    }

    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    public function getData($data = null)
    {
        if (!$data) {
            return $this->data;
        }
        if (!array_key_exists($data, $this->data)) {

            return false;
        }
        return $this->data[$data];
    }

    public function unsetData()
    {
        $this->data = [];
        return $this;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function __get($value)
    {
        if (!array_key_exists($value, $this->data)) {
            return false;
        }
        return $this->data[$value];
    }

    public function fetchPairs($query)
    {
        return $this->getAdapter()->fetchPairs($query);
    }

    public function fetchAll($query = null, $condition = null)
    {
        $stmt = "SELECT * FROM `{$this->getTableName()}`";

        if ($query) {
            $stmt = $query;
        }


        if ($condition) {
            $stmt = "SELECT * FROM `{$this->getTableName()}`" . $condition;
        }

        $rows = $this->getAdapter()->fetchAll($stmt);

        if (!$rows) {
            return $rows;
        }
        foreach ($rows as $row => &$value) {
            $row = new $this;
            $value = $row->setData($value);
        }

        $collectionClassName = get_class($this) . '\Collection';
        $collection = \Mage::getModel($collectionClassName);
        $collection->setData($rows);

        return $collection;
    }

    public function fetchRow($query)
    {
        $data = $this->getAdapter()->fetchRow($query);
        if (!$data) {
            return $data;
        }
        $this->setData($data);

        return $this;
    }

    public function save()
    {

        if (array_key_exists($this->getPrimaryKey(), $this->getData())) {

            $temp_arr = [];

            foreach ($this->getData() as $key => $values) {
                $temp_arr[] = "`$key` = '$values'";
            }

            $stmt = "UPDATE `{$this->getTableName()}` SET " . implode(', ', $temp_arr) .
                " WHERE `{$this->getPrimaryKey()}` = '{$this->getData($this->getPrimaryKey())}' ";


            if (!($this->getAdapter()->update($stmt))) {

                return false;
            }

            $this->load($this->getData($this->getPrimaryKey()));

            return $this;
        }
        $stmt = "INSERT INTO `{$this->getTableName()}`
         ( " . implode(' , ', array_keys($this->data)) . ")
          VALUES ('" . implode("' , '", array_values($this->data)) . "')";

        $temp_id = $this->getAdapter()->insert($stmt);


        if (!$temp_id) {
            return false;
        }

        $this->load($temp_id);

        return $this;
    }

    public function load($id)
    {

        $stmt = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$id}'";
        $data = $this->getAdapter()->fetchRow($stmt);

        if (!$data) {
            return false;
        }

        $this->setData($data);

        return $this;
    }

    public function delete()
    {
        $stmt = "DELETE FROM `{$this->getTableName()}`
                WHERE
                `{$this->getPrimaryKey()}` = '{$this->getData($this->getPrimaryKey())}'";

        return $this->getAdapter()->delete($stmt);
    }

    public function alter($query)
    {
        return $this->getAdapter()->alter($query);
    }
}
