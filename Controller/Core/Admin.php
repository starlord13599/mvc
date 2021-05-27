<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Controller\Core\Abstracts');



class Admin extends Abstracts
{

    protected $session = null;

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {

            $layout = \Mage::getBlock('block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage()
    {
        $this->admin_message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }

    public function setSession()
    {
        $this->session = \Mage::getModel('Model\Admin\Session');
        return $this;
    }

    public function getSession()
    {
        if (!$this->session) {
            $this->setSession();
        }

        return $this->session;
    }
}
