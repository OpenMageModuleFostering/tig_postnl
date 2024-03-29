<?php
/**
 *                  ___________       __            __
 *                  \__    ___/____ _/  |_ _____   |  |
 *                    |    |  /  _ \\   __\\__  \  |  |
 *                    |    | |  |_| ||  |   / __ \_|  |__
 *                    |____|  \____/ |__|  (____  /|____/
 *                                              \/
 *          ___          __                                   __
 *         |   |  ____ _/  |_   ____ _______   ____    ____ _/  |_
 *         |   | /    \\   __\_/ __ \\_  __ \ /    \ _/ __ \\   __\
 *         |   ||   |  \|  |  \  ___/ |  | \/|   |  \\  ___/ |  |
 *         |___||___|  /|__|   \_____>|__|   |___|  / \_____>|__|
 *                  \/                           \/
 *                  ________
 *                 /  _____/_______   ____   __ __ ______
 *                /   \  ___\_  __ \ /  _ \ |  |  \\____ \
 *                \    \_\  \|  | \/|  |_| ||  |  /|  |_| |
 *                 \______  /|__|    \____/ |____/ |   __/
 *                        \/                       |__|
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@tig.nl for more information.
 *
 * @copyright   Copyright (c) 2015 Total Internet Group B.V. (http://www.tig.nl)
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
class TIG_PostNL_Block_Adminhtml_Widget_Grid_Column_Renderer_ShippingDescription
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Text
{
    /**
     * Additional column names used
     */
    const SHIPPING_METHOD_COLUMN = 'shipping_method';
    const PRODUCT_CODE_COLUMN    = 'product_code';

    /**
     * Renders the column value as a Yes or No value
     *
     * @param Varien_Object $row
     *
     * @return string
     */
    public function render(Varien_Object $row)
    {
        /**
         * The shipment was not shipped using PostNL
         */
        $shippingMethod = $row->getData(self::SHIPPING_METHOD_COLUMN);
        if (!Mage::helper('postnl/carrier')->isPostnlShippingMethod($shippingMethod)) {
            return '';
        }

        /**
         * Check if any data is available
         */
        $value = $row->getData($this->getColumn()->getIndex());
        if (is_null($value) || $value === '') {
            return parent::render($row);
        }

        /**
         * Get this row's product code and join it to this cell.
         */
        $productCode = $this->getProductCode($row);
        $renderedvalue = '<strong>'
                       . parent::render($row)
                       . '</strong><br />'
                       . $productCode;

        return $renderedvalue;
    }

    /**
     * Get product_code column contents.
     *
     * @param Varien_Object $row
     *
     * @return string
     *
     * @see Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Options::render()
     */
    public function getProductCode(Varien_Object $row)
    {
        $options = $this->getColumn()->getOptions();
        $showMissingOptionValues = (bool)$this->getColumn()->getShowMissingOptionValues();

        $value = '';
        if (empty($options) || !is_array($options)) {
            return $value;
        }

        $value = $row->getData(self::PRODUCT_CODE_COLUMN);
        if (is_array($value)) {
            $res = array();
            foreach ($value as $item) {
                if (isset($options[$item])) {
                    $res[] = $this->escapeHtml($options[$item]);
                }
                elseif ($showMissingOptionValues) {
                    $res[] = $this->escapeHtml($item);
                }
            }
            return implode(', ', $res);
        } elseif (isset($options[$value])) {
            return $this->escapeHtml($options[$value]);
        }

        return $this->escapeHtml($value);
    }
}
