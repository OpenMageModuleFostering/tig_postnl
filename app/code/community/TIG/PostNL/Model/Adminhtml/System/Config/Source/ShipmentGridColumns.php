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
class TIG_PostNL_Model_Adminhtml_System_Config_Source_ShipmentGridColumns
{
    /**
     * Returns an option array for optional shipment grid columns
     *
     * @return array
     */
    public function toOptionArray()
    {
        $helper = Mage::helper('postnl');
        $columns = array(
            array(
                'value' => 'parcel_count',
                'label' => $helper->__('Number of Parcels')
            ),
            array(
                'value' => 'shipping_description',
                'label' => $helper->__('Shipping Method')
            ),
            array(
                'value' => 'shipment_type',
                'label' => $helper->__('Shipment Type')
            ),
            array(
                'value' => 'product_code',
                'label' => $helper->__('Shipping Product')
            ),
            array(
                'value' => 'extra_cover_amount',
                'label' => $helper->__('Extra Cover')
            ),
            array(
                'value' => 'confirm_date',
                'label' => $helper->__('Send Date')
            ),
            array(
                'value' => 'delivery_date',
                'label' => $helper->__('Delivery Date')
            ),
            array(
                'value' => 'confirm_status',
                'label' => $helper->__('Confirm Status')
            ),
            array(
                'value' => 'labels_printed',
                'label' => $helper->__('Labels Printed')
            ),
            array(
                'value' => 'return_labels_printed',
                'label' => $helper->__('Return Labels Printed')
            ),
            array(
                'value' => 'is_parcelware_exported',
                'label' => $helper->__('Exported to Parcelware')
            ),
            array(
                'value' => 'barcode',
                'label' => $helper->__('Barcode')
            ),
            array(
                'value' => 'shipping_phase',
                'label' => $helper->__('Shipping Phase')
            ),
            array(
                'value' => 'return_phase',
                'label' => $helper->__('Return Phase')
            ),
        );

        return $columns;
    }
}
