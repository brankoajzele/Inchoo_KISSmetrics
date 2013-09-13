<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Helper_Data extends Mage_Core_Helper_Data {

    const CONFIG_ACTIVE = 'inchoo_kissmetrics/settings/active';
    const CONFIG_API_KEY = 'inchoo_kissmetrics/settings/api_key';

    public function isModuleEnabled($moduleName = null) {
        if (Mage::getStoreConfig(self::CONFIG_ACTIVE) == '0') {
            return false;
        }

        return parent::isModuleEnabled($moduleName = null);
    }

    public function getApiKey($store = null) {
        return Mage::getStoreConfig(self::CONFIG_API_KEY, $store);
    }

    public function getUtf8CleanJsonArray($arr) {
        array_walk_recursive($arr, function(&$item, $key) {
                    if (is_string($item)) {
                        $item = htmlentities($item, ENT_NOQUOTES);
                    }
                });

        $json = json_encode($arr);
        $rson = html_entity_decode($json);

        return $rson;
    }

    public function getCartInfo() {
        $cart = Mage::getModel('checkout/cart');
        $quote = $cart->getQuote();

        if ($quote && $quote->getId()) {
            return array(
                'items_count' => $cart->getItemsCount(),
                'items_qty' => $cart->getItemsQty(),
                'customer_id' => ($quote->getCustomerId()) ? $quote->getCustomerId() : 0,
                'grand_total' => $quote->getGrandTotal(),
                'base_grand_total' => $quote->getBaseGrandTotal(),
                'subtotal' => $quote->getSubtotal(),
                'base_subtotal' => $quote->getBaseSubtotal(),
                'store_id' => $quote->getStoreId(),
                'currency_code' => Mage::app()->getStore()->getCurrentCurrencyCode(),
            );
        }

        return array();
    }

}