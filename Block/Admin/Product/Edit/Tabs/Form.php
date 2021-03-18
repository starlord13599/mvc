<?php

namespace Block\Admin\Product\Edit\Tabs;

use Block\Core\Template;
use Block\Core\Edit\Traits;

\Mage::loadFileByClassName('block\core\template');
\Mage::loadFileByClassName('block\core\Edit\Traits');

class Form extends Template
{

    use Traits;
    public function __construct()
    {
        $this->setTemplate('View/admin/products/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ((int) $this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Product';
        }
        return 'Create Product';
    }
}
