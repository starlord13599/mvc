<?php

namespace Model\Customer;

use Model\Core;

\Mage::loadFileByClassName('Model\Core\Session');

class Session extends Core\Session
{
    public function __construct()
    {
        parent::__construct();
        $this->setNameSpace('admin');
    }
}
