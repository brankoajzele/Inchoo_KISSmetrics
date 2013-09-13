<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Block_Event_Catalog_Product_View extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/kissmetrics/event/catalog/product/view.phtml');
    }

    public function getCurrentProduct() {
        return Mage::registry('current_product');
    }

    public function getProductInfo() {
        $product = $this->getCurrentProduct();

        return array(
            'id' => $product->getId(),
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'currency_code' => Mage::app()->getStore()->getCurrentCurrencyCode(),
            'store_id' => Mage::app()->getStore()->getId(),
        );
    }

    public function getJsonProductInfo() {
        return $this->helper('inchoo_kissmetrics')->getUtf8CleanJsonArray($this->getProductInfo());
    }

}
