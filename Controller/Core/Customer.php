<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Controller\Core\Abstracts');


class Customer extends Abstracts
{

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {

            $layout = \Mage::getBlock('block\Customer\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage()
    {
        $this->admin_message = \Mage::getModel('Model\Customer\Message');
        return $this;
    }
}
