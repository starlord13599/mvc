<?php

namespace Block\Admin\Payment\Edit\Tabs;

use Block\Core\Edit\Traits;
use Block\Core\Template;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');

class Form extends Template
{
    use Traits;
    protected $payment = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/payment/edit/tabs/form.php');
    }

    public function getTitle()
    {
        if ((int) $this->getUrl()->getRequest()->getGet('id')) {
            return 'Update Payment';
        }
        return 'Create Payment';
    }
}
