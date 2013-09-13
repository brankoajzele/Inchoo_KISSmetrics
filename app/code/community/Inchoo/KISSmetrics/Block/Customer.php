<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Block_Customer extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/kissmetrics/customer.phtml');
    }

    public function getIdentify() {
        if ($this->helper('customer')->isLoggedIn()) {
            return Mage::getSingleton('customer/session')->getCustomer()->getId();
        }

        return 0;
    }

}
