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

require_once (_PS_MODULE_DIR_ . "belvg_fastcheckout/belvg_fastcheckout.php");

class FastCheckoutFields extends ObjectModel
{
    public $id_belvg_fc_fields;

    public $id_shop;

    public $validate;

    public $name;

    public $admin_name;

    public $is_require;

    public static $definition = array(
        'table' => 'belvg_fc_fields',
        'primary' => 'id_belvg_fc_fields',
        'multilang' => TRUE,
        'fields' => array(
            'validate' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'IsGenericName',
                'size' => 32,
                'required' => TRUE),
            'name' => array(
                'type' => self::TYPE_STRING,
                'lang' => TRUE,
                'validate' => 'IsGenericName',
                'size' => 32,
                'required' => TRUE),
            'admin_name' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'IsGenericName',
                'size' => 32,
                'required' => TRUE),
            'is_require' => array(
                'type' => self::TYPE_BOOL,
                'validate' => 'isBool',
                'required' => FALSE),
            ));

    /**
     * FastCheckoutFields::__construct()
     * 
     * @param mixed $id
     * @param mixed $id_lang
     * @param mixed $id_shop
     * @return void
     */
    public function __construct($id = NULL, $id_lang = NULL, $id_shop = NULL)
    {
        Shop::addTableAssociation('belvg_fc_fields', array('type' => 'shop'));

        parent::__construct($id, $id_lang, $id_shop);
    }


    /**
     * FastCheckoutFields::add()
     * 
     * @param bool $autodate
     * @param bool $null_values
     * @return bool
     */
    public function add($autodate = TRUE, $null_values = FALSE)
    {
        $this->id_shop = Context::getContext()->shop->id;
        $this->admin_name = str_replace(" ", "_", $this->admin_name);
        foreach ($this->name as $key => $name) {
            $this->name[$key] = trim($name);
        }
        
        $return = $this->addDb();
        if (!$return) {
            return FALSE;
        }

        $return &= parent::add($autodate, $null_values);

        return $return;
    }

    /**
     * FastCheckoutFields::update()
     * 
     * @param bool $null_values
     * @return bool
     */
    public function update($null_values = FALSE)
    {
        $old_name = Db::getInstance()->getValue('SELECT admin_name FROM `' . _DB_PREFIX_ .
            'belvg_fc_fields` WHERE id_belvg_fc_fields = ' . (int)$this->id);
        
        $this->admin_name = str_replace(" ", "_", $this->admin_name);
        foreach ($this->name as $key => $name) {
            $this->name[$key] = trim($name);
        }
        
        $return = $this->updateDb($old_name);
        if (!$return) {
            return FALSE;
        }

        $return &= parent::update($null_values);
        return $return;
    }

    /**
     * FastCheckoutFields::delete()
     * 
     * @return bool
     */
    public function delete()
    {
        $return = TRUE;
        $return &= $this->deleteDb();
        $return &= parent::delete();
        return $return;
    }

    /**
     * FastCheckoutFields::addDb()
     * 
     * @return bool
     */
    protected function addDb()
    {
        try {
            if (!Db::getInstance()->execute('ALTER TABLE `' . _DB_PREFIX_ .
                'belvg_fc_fields_order_data` ADD `' . $this->admin_name . '` TEXT NULL ')) {
                return FALSE;
            }
        } catch (exception $e) {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * FastCheckoutFields::updateDb()
     * 
     * @param mixed $old_name
     * @return bool
     */
    protected function updateDb($old_name)
    {
        try {
            if (!Db::getInstance()->execute('ALTER TABLE  `' . _DB_PREFIX_ .
                'belvg_fc_fields_order_data` CHANGE  `' . $old_name . '`  `' . $this->
                admin_name . '` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL')) {
                return FALSE;
            }
        } catch (exception $e) {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * FastCheckoutFields::deleteDb()
     * 
     * @return bool
     */
    protected function deleteDb()
    {
        
        $this->admin_name = Db::getInstance()->getValue('SELECT admin_name FROM `' . _DB_PREFIX_ .
            'belvg_fc_fields` WHERE id_belvg_fc_fields = ' . (int)$this->id);

        try {
            if (!Db::getInstance()->execute('ALTER TABLE `' . _DB_PREFIX_ .
                'belvg_fc_fields_order_data` DROP `' . $this->admin_name . '`')) {
                return FALSE;
            }
        } catch (exception $e) {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * FastCheckoutFields::getData()
     * 
     * @return array
     */
    public static function getData()
    {
        $sql = 'SELECT fc_f.*, fc_fl.name FROM `' . _DB_PREFIX_ . 'belvg_fc_fields` fc_f
                JOIN `' . _DB_PREFIX_ .
            'belvg_fc_fields_lang` fc_fl ON (fc_f.id_belvg_fc_fields = fc_fl.id_belvg_fc_fields AND id_lang = ' . (int)
            Context::getContext()->language->id . ')
                JOIN `' . _DB_PREFIX_ .
            'belvg_fc_fields_shop` fc_fs ON (fc_f.id_belvg_fc_fields = fc_fs.id_belvg_fc_fields)
                WHERE fc_fs.id_shop = ' . (int)Context::getContext()->shop->id . '
            ORDER BY fc_f.`id_belvg_fc_fields` ASC';

        $fields = Db::getInstance()->ExecuteS($sql);
        foreach ($fields as &$field) {
            $field['render'] = self::getRender($field);
        }

        return $fields;
    }

    /**
     * FastCheckoutFields::getRender()
     * 
     * @param mixed $field
     * @return text
     */
    public static function getRender($field)
    {
        Context::getContext()->smarty->assign(array('belvg_field' => $field, ));
        $module = new belvg_fastcheckout();
        $file = _PS_MODULE_DIR_ . "belvg_fastcheckout/belvg_fastcheckout.php";

        $return = '';
        switch ($field['validate']) {
            case "isAnything":
                $return = $module->display($file, 'views/frontend/render/isAnything.tpl');
                break;

            case "isBool":
                $return = $module->display($file, 'views/frontend/render/isBool.tpl');
                break;

            default:
                $return = $module->display($file, 'views/frontend/render/default.tpl');
                break;
        }
        
        return $return;
    }

    /**
     * FastCheckoutFields::getFrontendLabelByAdminName()
     * 
     * @param mixed $key
     * @param mixed $id_lang
     * @param mixed $id_shop
     * @return array
     */
    public static function getFrontendLabelByAdminName($key, $id_lang, $id_shop)
    {
        $sql = 'SELECT fc_fl.name FROM `' . _DB_PREFIX_ . 'belvg_fc_fields` fc_f
                JOIN `' . _DB_PREFIX_ .
            'belvg_fc_fields_lang` fc_fl ON (fc_f.id_belvg_fc_fields = fc_fl.id_belvg_fc_fields AND id_lang = ' . (int)
            $id_lang . ')
                JOIN `' . _DB_PREFIX_ .
            'belvg_fc_fields_shop` fc_fs ON (fc_f.id_belvg_fc_fields = fc_fs.id_belvg_fc_fields)
                WHERE 1 AND admin_name = "' . $key . '" AND fc_fs.id_shop = ' . (int)
            $id_shop;

        return Db::getInstance()->getValue($sql);
    }

    public static function checkIsCart($id_cart)
    {
        return Db::getInstance()->getValue('SELECT id_belvg_fc_fields_data
            FROM `' . _DB_PREFIX_ . 'belvg_fc_fields_order_data`
            WHERE is_cart = 1 AND id_order = ' . (int)$id_cart);
    }

    public static function getDataByIdCart($id_cart)
    {
        return Db::getInstance()->getRow('SELECT *
            FROM `' . _DB_PREFIX_ . 'belvg_fc_fields_order_data`
            WHERE 1 AND id_order = ' . (int)$id_cart);
    }

}
