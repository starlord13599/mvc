<?php

namespace Block\Admin\Customer;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $customers = null;
    protected $templateName = null;


    public function __construct()
    {
        $this->templateName  = './View/admin/customer/grid.php';
    }

    public function setCustomers($customers = null)
    {
        if (!$customers) {
            $customer = \Mage::getModel('Model\Customer');
            $customers = $customer->fetchAll();

            if ($customers) {
                $customers = $customers->getData();
            }
        }

        $this->customers = $customers;
        return $this;
    }

    public function getCustomers()
    {
        if (!$this->customers) {
            $this->setCustomers();
        }

        return $this->customers;
    }
}
