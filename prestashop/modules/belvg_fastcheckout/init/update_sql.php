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

$sql = array();

$sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields` VALUES(1, \'firstname\', \'isName\', 1)';
$sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields` VALUES(2, \'lastname\', \'isName\', 1)';
$sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields` VALUES(3, \'email\', \'isEmail\', 1)';
$sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields` VALUES(4, \'phone\', \'isPhoneNumber\', 0)';
$sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields` VALUES(5, \'note\', \'isAnything\', 0)';


$languages = Language::getLanguages(FALSE);
foreach ($languages as $key => $language) {
    $name = $language['iso_code'] != 'ru' ? "Firstname" : "Имя";
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_lang` VALUES(1, ' . $language['id_lang'] .
        ', "' . $name . '")';
    $lastname = $language['iso_code'] != 'ru' ? "Lastname" : "Фамилия";
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_lang` VALUES(2, ' . $language['id_lang'] .
        ', "' . $lastname . '")';
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_lang` VALUES(3, ' . $language['id_lang'] .
        ', "Email")';
    $name = $language['iso_code'] != 'ru' ? "Phone" : "Телефон";
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_lang` VALUES(4, ' . $language['id_lang'] .
        ', "' . $name . '")';
    $name = $language['iso_code'] != 'ru' ? "Note" : "Дополнительно";
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_lang` VALUES(5, ' . $language['id_lang'] .
        ', "' . $name . '")';
}

$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ .
    'belvg_fc_fields_order_data` ADD `firstname` TEXT NULL ';
$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ .
    'belvg_fc_fields_order_data` ADD `lastname` TEXT NULL ';
$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ .
    'belvg_fc_fields_order_data` ADD `email` TEXT NULL ';
$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ .
    'belvg_fc_fields_order_data` ADD `phone` TEXT NULL ';
$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ .
    'belvg_fc_fields_order_data` ADD `note` TEXT NULL ';

$shops = Shop::getShops();
foreach ($shops as $key => $shop) {
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_shop` VALUES(1, ' . $shop['id_shop'] .
        ')';
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_shop` VALUES(2, ' . $shop['id_shop'] .
        ')';
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_shop` VALUES(3, ' . $shop['id_shop'] .
        ')';
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_shop` VALUES(4, ' . $shop['id_shop'] .
        ')';
    $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'belvg_fc_fields_shop` VALUES(5, ' . $shop['id_shop'] .
        ')';
}
