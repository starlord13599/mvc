<?php

namespace Block\Admin\Shipment;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $shipments = null;
    // protected $templateName = null;


    public function __construct()
    {
        $this->setTemplate('./View/Admin/shipment/grid.php');
        // $this->templateName  = ;
    }

    public function setShipments($shipments = null)
    {
        if (!$shipments) {
            $shipments = \Mage::getModel('Model\Shipment');
            $shipments = $shipments->fetchAll();

            if ($shipments) {
                $shipments = $shipments->getData();
            }
        }

        $this->shipments = $shipments;
        return $this;
    }

    public function getShipments()
    {
        if (!$this->shipments) {
            $this->setShipments();
        }

        return $this->shipments;
    }
}
