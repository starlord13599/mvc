<?php

namespace Block\Admin\Category\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Form extends Template
{
    use Traits;
    protected $category = null;
    protected $categoryOptions = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/category/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ((int) $this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Product';
        }
        return 'Create Product';
    }

    public function getCategoryOptions()
    {

        $query = "SELECT `categoryId`,`name`
                FROM `{$this->getTableRow()->getTableName()}`
                WHERE `name` NOT LIKE '{$this->getTableRow()->name}/%'";

        $options = $this->getTableRow()->fetchPairs($query);

        $query = "SELECT `categoryId`,`pathId`
                FROM `{$this->getTableRow()->getTableName()}`
                WHERE `pathId` NOT LIKE '{$this->getTableRow()->pathId}=%'";

        $this->categoryOptions = $this->getTableRow()->fetchPairs($query);


        if ($this->categoryOptions) {
            foreach ($this->categoryOptions as $categoryId => &$pathId) {
                $pathIds = explode('=', $pathId);

                foreach ($pathIds as $key => &$id) {
                    if (array_key_exists($id, $options)) {
                        $id = $options[$id];
                    }
                }
                $pathId = implode("/", $pathIds);
            }
        }

        $this->categoryOptions = ["0" => 'Root Category'] + $this->categoryOptions;

        return $this->categoryOptions;
    }
}
