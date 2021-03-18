<?php

namespace Block\Admin\Payment;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $payments = null;
    protected $templateName = null;


    public function __construct()
    {
        $this->templateName  = './View/admin/payment/grid.php';
    }

    public function setPayments($payments = null)
    {
        if (!$payments) {
            $payments = \Mage::getModel('Model\Payment');
            $payments = $payments->fetchAll();

            if ($payments) {
                $payments = $payments->getData();
            }
        }

        $this->payments = $payments;
        return $this;
    }

    public function getPayments()
    {
        if (!$this->payments) {
            $this->setPayments();
        }

        return $this->payments;
    }
}
