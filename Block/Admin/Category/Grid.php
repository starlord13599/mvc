<?php

namespace Block\Admin\Category;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $categories = null;
    protected $templateName = null;
    protected $categoryOptions = null;


    public function __construct()
    {
        $this->templateName  = './View/admin/category/grid.php';
    }

    public function setCategories($categories = null)
    {
        if (!$categories) {
            $categories = \Mage::getModel('Model\Category');
            $categories = $categories->fetchAll();

            if ($categories) {
                $categories = $categories->getData();
            }
        }

        $this->categories = $categories;
        return $this;
    }

    public function getCategories()
    {
        if (!$this->categories) {
            $this->setCategories();
        }

        return $this->categories;
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
