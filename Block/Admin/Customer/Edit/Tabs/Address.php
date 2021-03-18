<?php

namespace Block\Admin\Customer\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');


class Address extends Template
{
    use Traits;
    protected $billing = null;
    protected $shipping = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/customer/edit/tabs/address.php');
    }

    public function setBillingAddress()
    {
        $billing = \Mage::getModel('Model\Customer\Address');
        $query = "SELECT  *  FROM `customer_address`
                    WHERE `customerId` = {$this->getTableRow()->customerId}
                        AND `addresstype`='billing'";

        $data = $billing->fetchRow($query);

        if ($data) {
            $this->billing = $data;
            return $this;
        }

        $this->billing = $billing;
        return $this;
    }

    public function setShippingAddress()
    {
        $shipping = \Mage::getModel('Model\Customer\Address');
        $query = "SELECT  *  FROM `customer_address`
                    WHERE `customerId` = {$this->getTableRow()->customerId}
                        AND `addresstype`='shipping'";

        $data = $shipping->fetchRow($query);

        if ($data) {
            $this->shipping = $data;
            return $this;
        }

        $this->shipping = $shipping;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->billing) {
            $this->setBillingAddress();
        }

        return $this->billing;
    }

    public function getShippingAddress()
    {
        if (!$this->shipping) {
            $this->setShippingAddress();
        }

        return $this->shipping;
    }
}
