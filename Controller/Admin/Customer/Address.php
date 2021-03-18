<?php

namespace Controller\Admin\Customer;

use Controller\Core\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Address extends Admin
{
    public function addAction()
    {
        try {
            if ($this->getRequest()->isPost()) {
                $id = (int) $this->getRequest()->getGet('id');
                if ($id) {
                    $customer = \Mage::getModel('Model\Customer')->load($id);

                    if (!$customer) {
                        throw new \Exception("Customer not found");
                    }
                }

                $addressData = $this->getRequest()->getPost('address');
                $addressModel = \Mage::getModel('Model\Customer\Address');


                if (array_key_exists('Old', $addressData)) {
                    foreach ($addressData['Old'] as $type => $address) {
                        $addressModel->load($address['id']);
                        $addressModel->setData($address);
                        $addressModel->save();
                        $addressModel->unsetData();
                    }
                }
                if (array_key_exists('New', $addressData)) {
                    foreach ($addressData['New'] as $type => $address) {

                        $addressModel->setData($address);
                        $addressModel->customerId = $id;
                        $addressModel->addresstype = $type;
                        $addressModel->save();
                        $addressModel->unsetData();
                    }
                }
                $this->redirect('form', 'admin\customer', ['tabs' => 'Address'], false);
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('form', 'admin\customer', ['tabs' => 'Address'], false);
        }
    }
}
