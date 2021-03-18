<?php

namespace Model\Customer;

\Mage::loadFileByClassName('model\core\message');

class Message extends \Model\Core\Message
{

    public function __construct()
    {
        parent::__construct();
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
