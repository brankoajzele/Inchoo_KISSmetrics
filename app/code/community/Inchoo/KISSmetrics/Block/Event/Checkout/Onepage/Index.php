<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Block_Event_Checkout_Onepage_Index extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/kissmetrics/event/checkout/onepage/index.phtml');
    }

    public function getJsonCartInfo() {
        return $this->helper('inchoo_kissmetrics')->getUtf8CleanJsonArray($this->helper('inchoo_kissmetrics')->getCartInfo());
    }

}
