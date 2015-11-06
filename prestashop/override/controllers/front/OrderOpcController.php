<?php

/*
 * 2007-2013 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 * @category   Belvg
 * @package    Belvg_FastCheckout
 * @author    Alexander Simonchik <support@belvg.com>
 * @site
 * @copyright  Copyright (c) 2010 - 2013 BelVG LLC. (http://www.belvg.com)
 * @license    http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt
 *
 */

class OrderOpcController extends OrderOpcControllerCore
{
    public function __construct()
    {
        parent::__construct();

        require_once _PS_MODULE_DIR_ . 'belvg_fastcheckout/includer.php';

        $this->belvg_fastcheckout = new belvg_fastcheckout();
        $this->customer_fc_fields = array();
        $this->shipping_step = Configuration::get('belvg_fc_shipping');
        $this->payment_step = Configuration::get('belvg_fc_payment');
        $this->step = (int)(Tools::getValue('step'));
    }

    public function initContent()
    {
        if (!$this->getStatus()) {
            return parent::initContent();
        }

        global $isVirtualCart;

        parent::initContent();

        if ($this->nbProducts) {
            $this->context->smarty->assign('virtual_cart', $isVirtualCart);
        }

        $this->_assignSummaryInformations();
        if (!empty($this->context->customer)) {
            $this->context->smarty->assign(array('step_customer' => $this->context->
                customer, ));
        }

        $fastcheckout_fields = FastCheckoutFields::getData();

        $this->context->smarty->assign(array(
            'fastcheckout_fields' => $fastcheckout_fields,
            'fastcheckout_additional_steps' => FastCheckoutFields::checkIsCart(Context::getContext()->cart->id),
            'fastcheckout_shipping_step' => $this->shipping_step,
            'fastcheckout_payment_step' => $this->payment_step,
            'isLogged' => (bool)($this->context->customer->id && Customer::customerIdExistsStatic((int)$this->context->cookie->id_customer)),
            'opc' => TRUE,
        ));
        if (!$this->nbProducts) {
            $this->context->smarty->assign('empty', 1);
        }

        $this->setTemplate(_PS_MODULE_DIR_ . 'belvg_fastcheckout/views/frontend/orderProcess.tpl');

        $this->context->smarty->assign(array(
            'currencySign' => $this->context->currency->sign,
            'currencyRate' => $this->context->currency->conversion_rate,
            'currencyFormat' => $this->context->currency->format,
            'currencyBlank' => $this->context->currency->blank,
        ));
    }

    public function postProcess()
    {
        if (!$this->getStatus()) {
            return parent::postProcess();
        }

        $return = parent::postProcess();
        if (Tools::isSubmit('belvg_fastcheckout')) {
            $fastcheckout_fields = FastCheckoutFields::getData();
            //validate
            foreach ($fastcheckout_fields as $field) {
                $value = Tools::getValue("customer_fc_" . $field['admin_name']);
                $this->customer_fc_fields[$field['admin_name']] = pSQL(trim($value));
                if (($field['is_require'] && ($value == NULL || !Validate::$field['validate']($value))) || (!$field['is_require'] && $value != NULL && !Validate::$field['validate']($value))) {
                    $this->errors[] = Tools::displayError('You must register valid ') . $field['name'];
                }
            }

            if (empty($this->errors)) {
                if (!isset($this->context->customer->id)) {
                    if (isset($this->customer_fc_fields['email'])) {
                        $customer = new Customer();
                        $customer = $customer->getByEmail($this->customer_fc_fields['email']);
                    }

                    if (!is_object($customer) || !$customer->id) {
                        $customer = new Customer();
                        $customer->firstname = (isset($this->customer_fc_fields['firstname']) && !empty($this->customer_fc_fields['firstname']) && Validate::isName($this->customer_fc_fields['firstname'])) ? $this->customer_fc_fields['firstname'] :
                            'Firstname';
                        $customer->lastname = (isset($this->customer_fc_fields['lastname']) && !empty($this->customer_fc_fields['lastname']) && Validate::isName($this->customer_fc_fields['lastname'])) ? $this->customer_fc_fields['lastname'] :
                            'Lastname';
                        $customer->email = (isset($this->customer_fc_fields['email']) && !empty($this->customer_fc_fields['email']) && Validate::isEmail($this->customer_fc_fields['email'])) ? $this->customer_fc_fields['email'] :
                            'guest@yahoo.com';
                        $customer->passwd = Tools::encrypt(Tools::passwdGen());
                        $customer->active = 1;
                        $customer->is_guest = 0;

                        if (!$customer->add()) {
                            $this->errors[] = Tools::displayError('Error while create new customer account');
                            return FALSE;
                        }
                    }

                    $this->context->cookie->id_customer = (int)($customer->id);
                    $this->context->cookie->customer_lastname = $customer->lastname;
                    $this->context->cookie->customer_firstname = $customer->firstname;
                    $this->context->cookie->logged = 1;
                    $customer->logged = 1;
                    $this->context->cookie->is_guest = $customer->isGuest();
                    $this->context->cookie->passwd = $customer->passwd;
                    $this->context->cookie->email = $customer->email;
                    // Add customer to the context
                    $this->context->customer = $customer;
                } else {
                    $customer = new Customer($this->context->customer->id);
                }

                $this->context->cart->id_customer = $customer->id;
                $this->context->cart->secure_key = $customer->secure_key;
                if (!$this->context->cart->update()) {
                    $this->errors[] = Tools::displayError('An error occurred while updating your cart.');
                    return FALSE;
                }

                if (!$this->shipping_step && !$this->payment_step) {
                    $this->customer_fc_fields['id_order'] = $this->context->cart->id;
                    $this->customer_fc_fields['is_cart'] = 1; //TEMPORARY SAVE INFO

                    $this->fastWriteOrderInfo();

                    $this->fastPlaceOrder($customer);
                } else {
                    $this->customer_fc_fields['id_order'] = $this->context->cart->id;
                    $this->customer_fc_fields['is_cart'] = 1; //TEMPORARY SAVE INFO

                    $this->fastWriteOrderInfo();

                    $this->assignSmartyVarsForAdditSteps();
                }
            }
        } elseif (Tools::isSubmit('belvg_fastcheckout_2')) {
            if (Tools::getIsset('delivery_option')) {
                if ($this->validateDeliveryOption(Tools::getValue('delivery_option'))) {
                    $this->context->cart->setDeliveryOption(Tools::getValue('delivery_option'));
                }
            }

            //$this->customer_fc_fields = FastCheckoutFields::getDataByIdCart($this->context->cart->id);
            //$this->customer_fc_fields['is_cart'] = 0; //PLACE ORDER

            $this->fastPlaceOrder();
        } else {
            if (FastCheckoutFields::checkIsCart(Context::getContext()->cart->id)) {
                $this->assignSmartyVarsForAdditSteps();
            }
        }

        return $return;
    }

    protected function assignSmartyVarsForAdditSteps() {
        if ($this->isLogged) {
            // ADDRESS & CARRIER
            if ($this->shipping_step) {
                $this->_assignAddress();
                $this->_assignCarrier();
            }

            // PAYMENT
            if ($this->payment_step) {
                $this->_assignPayment();
            }
        }
    }

    protected function fastPlaceOrder($customer = NULL) {
        $total = (float)($this->context->cart->getOrderTotal(TRUE, Cart::BOTH));
        if (!$customer) {
            $customer = new Customer($this->context->customer->id);
        }

        $this->belvg_fastcheckout->validateOrder($this->context->cart->id, Configuration::get('belvg_fc_status_id'),
            $total, $this->belvg_fastcheckout->displayName, NULL, array(), (int)$this->context->currency->id, FALSE,
            $customer->secure_key);

        $order = new Order($this->belvg_fastcheckout->currentOrder);

        $this->customer_fc_fields['id_order'] = $order->id;

        //$this->fastWriteOrderInfo(); move to hookActionValidateOrder

        Tools::redirect('index.php?controller=order-confirmation&id_cart=' . $this->context->cart->id .
        '&id_module=' . $this->belvg_fastcheckout->id . '&id_order=' . $this->belvg_fastcheckout->
            currentOrder . '&key=' . $customer->secure_key);
    }

    protected function fastWriteOrderInfo() {
        if ($this->customer_fc_fields['is_cart']) {
            $fast_id = FastCheckoutFields::checkIsCart($this->customer_fc_fields['id_order']);
            if ($fast_id) {
                return Db::getInstance()->update('belvg_fc_fields_order_data', $this->customer_fc_fields, 'id_belvg_fc_fields_data = ' . (int)$fast_id);
            }
        }

        $result = Db::getInstance()->insert('belvg_fc_fields_order_data', $this->customer_fc_fields, FALSE, TRUE, Db::REPLACE);

        return $result;
    }

    protected function getStatus($moduleName = 'belvg_fastcheckout') {
        return (Module::isEnabled($moduleName));
    }

    public function setMedia()
    {
        parent::setMedia();

        if ($this->context->getMobileDevice() == FALSE) {
            // Adding CSS style sheet
            $this->addCSS(_THEME_CSS_DIR_ . 'order-opc.css');
            // Adding JS files
            $this->addJS(_THEME_JS_DIR_ . 'order-opc.js');
            $this->addJqueryPlugin('scrollTo');
        } else {
            $this->addJS(_THEME_MOBILE_JS_DIR_ . 'opc.js');
        }

        $this->addJS(_THEME_JS_DIR_ . 'tools/statesManagement.js');
        $this->addJS(_THEME_JS_DIR_ . 'order-address.js');
    }

    protected function _assignAddress()
    {
        if (!$this->getStatus() || Configuration::get('belvg_fc_shipping')) {
            return parent::_assignAddress();
        }
    }

}
