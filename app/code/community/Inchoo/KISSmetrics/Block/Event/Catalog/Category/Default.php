<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Block_Event_Catalog_Category_Default extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/kissmetrics/event/catalog/category/default.phtml');
    }

    public function getCurrentCategory() {
        return Mage::registry('current_category');
    }

    public function getCategoryInfo() {
        $category = $this->getCurrentCategory();

        return array(
            'id' => $category->getId(),
            'name' => $category->getName(),
            'display_mode' => $category->getDisplayMode(),
            'store_id' => $category->getStoreId(),
        );
    }

    public function getJsonCategoryInfo() {
        return $this->helper('inchoo_kissmetrics')->getUtf8CleanJsonArray($this->getCategoryInfo());
    }

}
