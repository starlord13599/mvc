<?php

namespace Block\Admin\Product\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class GroupPrice extends Template
{
    use Traits;
    protected $customerGroup = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/products/edit/tabs/groupprice.php');
    }

    public function getCustomerGroup()
    {

        $groups = \Mage::getModel('Model\Product\GroupPrice');

        $query = "SELECT cg.* , pgp.productId ,pgp.entityId, pgp.price as `groupPrice`,
        if(p.price IS NULL,(SELECT `price` FROM `products` WHERE productId = '{$this->getTableRow()->productId}'),p.price) as price
        FROM`customer_grp` as `cg`
            LEFT JOIN `product_group_price` as `pgp`
                ON cg.groupId = pgp.CustomerGroupId
                    AND pgp.productId = '{$this->getTableRow()->productId}'
            LEFT JOIN `products` as p
                ON pgp.productId = p.productId";

        return $groups->fetchAll($query)->getData();
    }
}
