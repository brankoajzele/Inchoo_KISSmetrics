<?php

/**
 * @category    Inchoo
 * @package     Inchoo_KISSmetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_KISSmetrics_Block_Event_CatalogSearch_Advanced_Result extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/kissmetrics/event/catalogsearch/advanced/result.phtml');
    }

    public function getSearchQueries() {
        $params = $this->getRequest()->getParams();
        $queries = array();

        foreach ($params as $k => $v) {
            if (!empty($v)) {
                $queries[$k] = $v;
            }
        }

        return $queries;
    }

    public function getJsonSearchQueries() {
        return $this->helper('inchoo_kissmetrics')->getUtf8CleanJsonArray($this->getSearchQueries());
    }

}
