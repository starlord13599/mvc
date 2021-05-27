<?php

namespace Model;

use Model\Core\Table;

\Mage::loadFileByClassName('Model\Core\Table');

class Category extends Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('category');
        $this->setPrimaryKey('categoryId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLE => "Enable",
            self::STATUS_DISABLE => "Disable"
        ];
    }

    public function updatePathId()
    {
        if (!$this->parentId) {
            $pathId = $this->categoryId;
        } else {
            $parent = \Mage::getModel('Model\Category')->load($this->parentId);
            $pathId = $parent->pathId . "=" . $this->categoryId;
        }

        $this->pathId =  $pathId;

        return $this->save();
    }

    public function updateChildrenPathIds($categoryPathId, $parentId = null)
    {
        $categoryPathId = $categoryPathId . "=";

        $query = "SELECT * FROM `category` WHERE `pathId` LIKE '{$categoryPathId}%' ORDER BY `pathId` ASC ";

        $categories = $this->getAdapter()->fetchAll($query);


        if ($categories) {
            foreach ($categories as $key => $row) {
                $row = \Mage::getModel('Model\Category')->load($row['categoryId']);
                if ($parentId != null) {
                    $row->parentId = $parentId;
                }
                $row->updatePathId();
            }
        }
    }

    public function getChildCategories()
    {
        $childcategory = \Mage::getModel('Model\Category');
        $query = "SELECT * FROM `category` WHERE `parentId` = {$this->categoryId}";

        $childcategory = $childcategory->fetchAll($query);

        if ($childcategory) {
            return $childcategory->getData();
        }

        return false;
    }
}
