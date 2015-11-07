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

require_once (dirname(__file__) . '/belvg_fastcheckout.php');
require_once (dirname(__file__) . '/classes/FastCheckoutFields.php');

class AdminFastCheckoutFields extends ModuleAdminController
{
    protected $_module = NULL;

    /**
     * AdminFastCheckoutFields::__construct()
     * 
     * @return void
     */
    public function __construct()
    {
        $this->context = Context::getContext();
        $this->table = 'belvg_fc_fields';
        $this->identifier = 'id_belvg_fc_fields';
        $this->className = 'FastCheckoutFields';
        $this->_defaultOrderBy = 'id_belvg_fc_fields';
        $this->lang = TRUE;
        $this->bootstrap = TRUE;

        $this->addRowAction('edit');
        $this->addRowAction('delete');

        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'),
                    'confirm' => $this->l('Delete selected items?')), );

        Shop::addTableAssociation($this->table, array('type' => 'shop'));
                    
        $this->fields_list = array(
            'id_belvg_fc_fields' => array(
                'title' => $this->l('ID'),
                'width' => 25,
                'align' => 'center',
                //'remove_onclick' => TRUE,
                ),
            'admin_name' => array(
                'title' => $this->l('Admin name'),
                'width' => 'auto',
                'filter_key' => 'admin_name',
                'align' => 'left',
                ),
            'name' => array(
                'title' => $this->l('Name'),
                'width' => 'auto',
                'filter_key' => 'name',
                'align' => 'left',
                ),
            'validate' => array(
                'title' => $this->l('Validate'),
                'filter_key' => 'validate',
                'align' => 'center',
                ),
            'is_require' => array(
                'title' => $this->l('Require'),
                'active' => 'status',
                'class' => 'fixed-width-xs',
                'type' => 'bool',
                'filter_key' => 'is_require',
                'align' => 'center',
                ),
            );

        parent::__construct();
    }

    /**
     * AdminFastCheckoutFields::l()
     * 
     * @param mixed $string
     * @return string
     */
    protected function l($string, $class = __CLASS__, $addslashes = FALSE, $htmlentities = TRUE)
    {
        if (is_null($this->_module)) {
            $this->_module = new belvg_fastcheckout();
        }

        return $this->_module->l($string, __class__);
    }

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();

        $ps_validate_type = array(
            array(
                'id' => 'isAnything',
                'name' => 'isAnything',
                ),
            array(
                'id' => 'isEmail',
                'name' => 'isEmail',
                ),
            array(
                'id' => 'isUnsignedInt',
                'name' => 'isUnsignedInt',
                ),
            array(
                'id' => 'isInt',
                'name' => 'isInt',
                ),
            array(
                'id' => 'isFloat',
                'name' => 'isFloat',
                ),
            array(
                'id' => 'isName',
                'name' => 'isName',
                ),
            array(
                'id' => 'isMessage',
                'name' => 'isMessage',
                ),
            array(
                'id' => 'isAddress',
                'name' => 'isAddress',
                ),
            array(
                'id' => 'isPhoneNumber',
                'name' => 'isPhoneNumber',
                ),
            array(
                'id' => 'isZipCodeFormat',
                'name' => 'isZipCodeFormat',
                ),
            array(
                'id' => 'isDate',
                'name' => 'isDate',
                ),
            array(
                'id' => 'isBool',
                'name' => 'isBool',
                ),
            array(
                'id' => 'isUrl',
                'name' => 'isUrl',
                ),
            array(
                'id' => 'isString',
                'name' => 'isString',
                ),
            );

        $this->fields_form = array(
            'tinymce' => TRUE,
            'legend' => array('title' => $this->l('Field'), 'image' =>
                    '../img/admin/tab-categories.gif'),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Admin name:'),
                    'name' => 'admin_name',
                    'id' => 'admin_name',
                    'required' => TRUE,
                    'hint' => $this->l('Invalid characters:') . ' <>;=#{}',
                    'size' => 32),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name:'),
                    'name' => 'name',
                    'id' => 'name',
                    'lang' => TRUE,
                    'required' => TRUE,
                    'hint' => $this->l('Invalid characters:') . ' <>;=#{}',
                    'size' => 32),
                array(
                    'type' => 'select',
                    'label' => $this->l('Validate type:'),
                    'name' => 'validate',
                    'required' => TRUE,
                    'options' => array(
                        'query' => $ps_validate_type,
                        'id' => 'id',
                        'name' => 'name'),
                    'desc' => $this->l('Choose the type of the validate')),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Require:'),
                    'name' => 'is_require',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => array(array(
                            'id' => 'require_on',
                            'value' => 1,
                            'label' => $this->l('Yes')), array(
                            'id' => 'require_off',
                            'value' => 0,
                            'label' => $this->l('No')))),
                ),
            'submit' => array('title' => $this->l('   Save   ')));

        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
                );
        }

        return parent::renderForm();
    }
    
    /**
     * AdminFastCheckoutFields::initHeader()
     * 
     * @return void
     */
    /* public function initHeader() {
        parent::initHeader();

        // Multishop
        $this->context->smarty->assign(array(
            'is_multishop' => FALSE,
        ));
    } */

}
