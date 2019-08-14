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
 * to servicedesk@totalinternetgroup.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@totalinternetgroup.nl for more information.
 *
 * @copyright   Copyright (c) 2017 Total Internet Group B.V. (http://www.totalinternetgroup.nl)
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */

/**
 * Class TIG_PostNL_Block_Checkout_Widget_Dob
 *
 * @method setFieldIdFormat(String $value) $this
 * @method setFieldNameFormat(String $value) $this
 * @method setGenderFieldContents(String $value) $this
 * @method hasGenderFieldContents() bool
 * @method getGenderFieldContents() string
 */
class TIG_PostNL_Block_Checkout_Widget_Dob extends Mage_Customer_Block_Widget_Dob
{
    /**
     * @var null|TIG_PostNL_Helper_DeliveryOptions
     */
    protected $_helper = null;

    /**
     * @return TIG_PostNL_Helper_DeliveryOptions
     */
    protected function getDeliveryOptionsHelper()
    {
        if ($this->_helper === null) {
            $this->_helper = Mage::helper('postnl/deliveryOptions');
        }

        return $this->_helper;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        if (parent::isEnabled()) {
            return true;
        }

        return $this->isBirthdayCheckShipment();
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        if (parent::isRequired()) {
            return true;
        }

        return $this->isBirthdayCheckShipment();
    }

    /**
     * @return bool
     */
    protected function isBirthdayCheckShipment()
    {
        return
            $this->getDeliveryOptionsHelper()->canUseBirthdayCheckDelivery() &&
            $this->getDeliveryOptionsHelper()->quoteIsBirthdayCheck();
    }
}
