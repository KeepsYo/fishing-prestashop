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
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

define('BFC_SHORT_MODULE_NAME', 'belvg_fc_');

require_once _PS_MODULE_DIR_ . 'belvg_fastcheckout/includer.php';

class belvg_fastcheckout extends PaymentModule
{

    protected $_templates = array('productAdminTab' =>
            'views/admin/productOrdersTab.tpl', );

    const PREFIX = 'fast_'; //uses in configuration

    protected $_moduleParams = array(
        'shipping' => '',
        'payment' => '',
    );

    /**
     * belvg_fastcheckout::__construct()
     * 
     * @return void
     */
    public function __construct()
    {
        $this->name = 'belvg_fastcheckout';
        $this->tab = 'checkout';
        $this->version = '2.1.6.1';
        $this->author = 'BelVG';
        $this->need_instance = 0;
        $this->module_key = "bf3e32cf77a104eb48a50d0b361978e0";
        $this->bootstrap = TRUE;

        parent::__construct();

        $this->displayName = $this->l('Fast Checkout');
        $this->description = $this->l('This way checkout allows your customer make checkout in zero step :) Package for PrestaShop v.1.6.x');
    }

    /**
     * belvg_fastcheckout::_setModuleParam()
     * 
     * @param mixed $param
     * @param mixed $value
     * @return bool
     */
    protected function _setModuleParam($param, $value)
    {
        return Configuration::updateValue(BFC_SHORT_MODULE_NAME . $param, abs((int)$value), FALSE, FALSE, FALSE);
    }

    /**
     * belvg_fastcheckout::_getModuleParam()
     * 
     * @param mixed $param
     * @return mixed
     */
    protected function _getModuleParam($param)
    {
        return Configuration::get(BFC_SHORT_MODULE_NAME . $param);
    }

    /**
     * belvg_fastcheckout::getTemplate()
     * 
     * @param mixed $id
     * @return mixed
     */
    public function getTemplate($id)
    {
        if (isset($this->_templates[$id])) {
            return $this->_templates[$id];
        }

        return FALSE;
    }

    /**
     * belvg_fastcheckout::install()
     * 
     * @return bool
     */
    public function install()
    {
        if (!parent::install() or
            //!Configuration::updateValue('PS_GUEST_CHECKOUT_ENABLED', 1) OR
            !$this->registerHook('actionValidateOrder') or !$this->registerHook('paymentReturn') or
            !$this->registerHook('displayAdminOrder') or !$this->registerHook('displayHeader') or
            !$this->registerHook('actionAdminOrdersListingFieldsModifier')) {
            return FALSE;
        }

        if (!$this->installConfiguration()) {
            return FALSE;
        }

        include (dirname(__file__) . '/init/install_sql.php');
        foreach ($sql as $s) {
            if (!Db::getInstance()->Execute($s)) {
                return FALSE;
            }
        }

        include (dirname(__file__) . '/init/update_sql.php');
        foreach ($sql as $s) {
            if (!Db::getInstance()->Execute($s)) {
                return FALSE;
            }
        }

        $new_tab = new Tab();
        $new_tab->class_name = 'AdminFastCheckoutFields';
        $new_tab->id_parent = Tab::getCurrentParentId();
        $new_tab->module = $this->name;
        $languages = Language::getLanguages();
        foreach ($languages as $language) {
            $tab_name = $language['iso_code'] != 'ru' ? "Belvg Fast Checkout Fields" : "[Belvg] Поля быстрого заказа";
            $new_tab->name[$language['id_lang']] = $tab_name;
        }

        $new_tab->add();

        //Add �Processing FastCheckout� to order statuses;
        $sql = 'SELECT id_order_state FROM `' . _DB_PREFIX_ . 'order_state_lang`
            WHERE name = \'FastCheckout\'';
        $issetFastCheckout = Db::getInstance()->getValue($sql);

        if (!$issetFastCheckout) {
            $data = array(
                'invoice' => 0,
                'send_email' => 1,
                'color' => '#FFDD99',
                'unremovable' => 0,
                'hidden' => 0,
                'logable' => 1,
                'delivery' => 0);
            Db::getInstance()->insert('order_state', $data, FALSE, TRUE, Db::REPLACE);
            $lastID = Db::getInstance()->Insert_ID();
            $languages = Language::getLanguages();
            foreach ($languages as $language) {
                $data = array(
                    'id_order_state' => $lastID,
                    'id_lang' => $language['id_lang'],
                    'template' => 'fastcheckout',
                    'name' => 'FastCheckout');
                Db::getInstance()->insert('order_state_lang', $data, FALSE, TRUE, Db::REPLACE);
            }

            if (!Configuration::updateValue(BFC_SHORT_MODULE_NAME . 'status_id', $lastID)) {
                return FALSE;
            }

            copy(dirname(__file__) . '/images/status.gif', dirname(__file__) .
                '/../../img/os/' . $lastID . '.gif');
            Belvg_FileHelper::copy_directory(dirname(__file__) . '/mails', dirname(__file__) .
                '/../../mails');
        }

        return TRUE;
    }

    public function installConfiguration()
    {
        foreach ($this->_moduleParams as $param => $value) {
            if (!self::_setModuleParam($param, $value)) {
                $this->_errors[] = $this->l('Configuration error: [' . $param . '] = ' . $value);
                return FALSE;
            }
        }

        Configuration::updateValue('PS_ORDER_PROCESS_TYPE', 1); //SET ONE STEP CHECKOUT

        return TRUE;
    }

    /**
     * belvg_fastcheckout::uninstall()
     * 
     * @return bool
     */
    public function uninstall()
    {
        $idTabs = array();
        $idTabs[] = Tab::getIdFromClassName('AdminFastCheckoutFields');
        foreach ($idTabs as $idTab) {
            if ($idTab) {
                $tab = new Tab($idTab);
                $tab->delete();
            }
        }

        include (dirname(__file__) . '/init/uninstall_sql.php');
        foreach ($sql as $s) {
            if (!Db::getInstance()->Execute($s)) {
                return FALSE;
            }
        }

        if (!parent::uninstall()) {
            return FALSE;
        }

        return TRUE;
    }

    protected function postProcess()
    {
        if (Tools::isSubmit('submitUpdate')) {
            $warnings = '';
            $data = $_POST;
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    self::_setModuleParam($key, $value);
                }
            }

            if (empty($warnings)) {
                Tools::redirectAdmin('index.php?tab=AdminModules&conf=4&configure=' . $this->
                    name . '&token=' . Tools::getAdminToken('AdminModules' . (int)(Tab::
                    getIdFromClassName('AdminModules')) . (int)$this->context->employee->id));
            }

            foreach ($warnings as $warning) {
                $this->_html .= '<div class="alert warn">' . $warning . '</div>';
            }
        }
    }

    private function initToolbar()
    {
        $this->toolbar_btn['save'] = array('href' => '#', 'desc' => $this->l('Save'));
        return $this->toolbar_btn;
    }

    private function initForm()
    {
        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->identifier = $this->identifier;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->
                name;
        $helper->toolbar_scroll = TRUE;
        $helper->toolbar_btn = $this->initToolbar();
        $helper->title = $this->displayName;
        $helper->submit_action = 'submitUpdate';

        $this->fields_form[0]['form'] = array(
            'tinymce' => TRUE,
            'legend' => array('title' => $this->l('Settings'), 'image' => $this->_path .
            'logo.gif'),
            'submit' => array(
                'name' => 'submitUpdate',
                'title' => $this->l('   Save   '),
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->l('Shipping step:'),
                    'name' => 'shipping',
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => array(
                        array(
                            'id' => 'shipping_on',
                            'value' => 1,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'shipping_off',
                            'value' => 0,
                            'label' => $this->l('No')
                        )
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Payment step:'),
                    'name' => 'payment',
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => array(
                        array(
                            'id' => 'payment_on',
                            'value' => 1,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'payment_off',
                            'value' => 0,
                            'label' => $this->l('No')
                        )
                    )
                ),
            ),
        );

        return $helper;
    }

    public function getContent()
    {
        $this->postProcess();
        $helper = $this->initForm();
        foreach ($this->fields_form as $field_form) {
            foreach ($field_form['form']['input'] as $input) {
                $helper->fields_value[$input['name']] = $this->_getModuleParam($input['name']);
            }
        }

        $this->_html .= $helper->generateForm($this->fields_form);

        return $this->_html;
    }

    /**
     * belvg_fastcheckout::hookDisplayAdminOrder()
     * 
     * @param mixed $params
     * @return text
     */
    public function hookDisplayAdminOrder($params)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ .
            'belvg_fc_fields_order_data` WHERE id_order = ' . (int)$params['id_order'];
        $belvg_fast_checkout_data = Db::getInstance()->getRow($sql);
        $orderObj = new Order($params['id_order']);
        $admin_fields = array();

        if (!empty($belvg_fast_checkout_data)) {
            foreach ($belvg_fast_checkout_data as $key => &$data_item) {
                $frontend_name = FastCheckoutFields::getFrontendLabelByAdminName($key, $orderObj->
                    id_lang, $orderObj->id_shop);
                if (!empty($frontend_name)) {
                    $admin_fields[] = array(
                        'frontend_name' => $frontend_name,
                        'key' => $key,
                        'value' => $data_item,
                        );
                }
            }

            $this->context->smarty->assign('belvg_fc_data', $admin_fields);

            return $this->display(__file__, $this->getTemplate('productAdminTab'));
        }
        
        return "";
    }

    /**
     * belvg_fastcheckout::hookDisplayHeader()
     * 
     * @param mixed $params
     * @return null
     */
    public function hookDisplayHeader($params)
    {
        $this->context->controller->addCSS(($this->_path) . 'css/belvg_fastcheckout.css',
            'all');
    }

    /**
     * belvg_fastcheckout::hookPaymentReturn()
     * 
     * @param mixed $params
     * @return text
     */
    public function hookPaymentReturn($params)
    {
        if (!$this->active || !($params['objOrder'] instanceof Order)) {
            return FALSE;
        }

        $state = $params['objOrder']->getCurrentState();
        if ($state == $this->_getModuleParam('status_id')) {
            $this->smarty->assign(array(
                'total_to_pay' => Tools::displayPrice($params['total_to_pay'], $params['currencyObj'], FALSE),
                //'fastcheckoutDetails' => Tools::nl2br($this->details),
                //'fastcheckoutAddress' => Tools::nl2br($this->address),
                'status' => 'ok',
                'id_order' => $params['objOrder']->id));
            if (isset($params['objOrder']->reference) && !empty($params['objOrder']->
                reference)) {
                $this->smarty->assign('reference', $params['objOrder']->reference);
            }
        } else {
            $this->smarty->assign('status', 'failed');
        }

        return $this->display(__file__, 'payment_return.tpl');
    }

    public function hookActionValidateOrder($params)
    {
        $_customer_fc_fields = FastCheckoutFields::getDataByIdCart($params['cart']->id);
        $_customer_fc_fields['is_cart'] = 0; //PLACE ORDER
        $_customer_fc_fields['id_order'] = (int)$params['order']->id;
        if ($_customer_fc_fields['is_cart']) {
            $fast_id = FastCheckoutFields::checkIsCart($_customer_fc_fields['id_order']);
            if ($fast_id) {
                return Db::getInstance()->update('belvg_fc_fields_order_data', $_customer_fc_fields, 'id_belvg_fc_fields_data = ' . (int)$fast_id);
            }
        }

        $result = Db::getInstance()->insert('belvg_fc_fields_order_data', $_customer_fc_fields, FALSE, TRUE, Db::REPLACE);

        return $result;
    }

    public function hookActionAdminOrdersListingFieldsModifier($params)
    {
        $params['join'] = '
            LEFT JOIN `' . _DB_PREFIX_ . 'customer` c ON (c.`id_customer` = a.`id_customer`)
            LEFT JOIN `' . _DB_PREFIX_ . 'address` address ON address.id_address = a.id_address_delivery
            LEFT JOIN `' . _DB_PREFIX_ . 'country` country ON address.id_country = country.id_country
            LEFT JOIN `' . _DB_PREFIX_ . 'country_lang` country_lang ON (country.`id_country` = country_lang.`id_country` AND country_lang.`id_lang` = ' . (int)$this->context->language->id . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'order_state` os ON (os.`id_order_state` = a.`current_state`)
            LEFT JOIN `' . _DB_PREFIX_ . 'order_state_lang` osl ON (os.`id_order_state` = osl.`id_order_state` AND osl.`id_lang` = ' . (int)$this->context->language->id . ')';
    }

}
