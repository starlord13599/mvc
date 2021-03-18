<?php

namespace Model\Core;

\Mage::loadFileByClassName('Model\Core\Session');

class Message extends Session
{
    public function __construct()
    {
        parent::__construct();
        $this->setNameSpace('core');
    }

    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function setFailure($message)
    {
        $this->failure = $message;
        return $this;
    }

    public function getFailure()
    {
        return $this->failure;
    }
}
