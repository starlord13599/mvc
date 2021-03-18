<?php

namespace Block\Admin\Attribute;

use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends Template
{
    protected $attributes = null;


    public function __construct()
    {
        $this->templateName  = './View/admin/attribute/grid.php';
    }

    public function setAttributes($attributes = null)
    {
        if (!$attributes) {
            $attributes = \Mage::getModel('Model\Attribute');
            $attributes = $attributes->fetchAll();

            if ($attributes) {
                $attributes = $attributes->getData();
            }
        }

        $this->attributes = $attributes;
        return $this;
    }

    public function getAttributes()
    {
        if (!$this->attributes) {
            $this->setAttributes();
        }

        return $this->attributes;
    }
}
