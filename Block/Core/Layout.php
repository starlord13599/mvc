<?php

namespace Block\Core;

\Mage::loadFileByClassName('block\core\template');
\Mage::loadFileByClassName('block\core\layout\content');
\Mage::loadFileByClassName('block\core\layout\header');
\Mage::loadFileByClassName('block\core\layout\footer');
\Mage::loadFileByClassName('block\core\layout\left');
\Mage::loadFileByClassName('block\core\layout\right');



class Layout extends Template
{

    public function __construct()
    {
        $this->setTemplate("View/core/layout/oneColumn.php");
    }
}
