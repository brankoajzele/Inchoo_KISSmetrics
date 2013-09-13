<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Block_Event_Checkout_Onepage_Success extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/kissmetrics/event/checkout/onepage/success.phtml');
    }

    public function getOrderInfo() {
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        $order = Mage::getSingleton('sales/order');
        $order->load($lastOrderId);

        if ($order && $order->getId()) {
            return $order->toArray();
        }

        return array();
    }

    public function getJsonOrderInfo() {
        return $this->helper('inchoo_kissmetrics')->getUtf8CleanJsonArray($this->getOrderInfo());
    }

}
