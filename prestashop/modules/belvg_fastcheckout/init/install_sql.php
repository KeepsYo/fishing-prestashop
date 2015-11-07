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

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'belvg_fc_fields` (
            `id_belvg_fc_fields` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `admin_name` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
            `validate` VARCHAR( 32 ) NOT NULL ,
            `is_require` TINYINT(1) NOT NULL 
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'belvg_fc_fields_lang` (
            `id_belvg_fc_fields` INT( 11 ) UNSIGNED NOT NULL ,
            `id_lang` INT( 11 ) UNSIGNED NOT NULL ,
            `name` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
            INDEX (  `id_lang` ,  `name` )
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ .
    'belvg_fc_fields_lang` ADD PRIMARY KEY (  `id_belvg_fc_fields` ,  `id_lang` )';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'belvg_fc_fields_shop` (
            `id_belvg_fc_fields` INT( 11 ) UNSIGNED NOT NULL ,
            `id_shop` INT( 11 ) UNSIGNED NOT NULL ,
            PRIMARY KEY (  `id_belvg_fc_fields` ,  `id_shop` )
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ .
    'belvg_fc_fields_order_data` (
            `id_belvg_fc_fields_data` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
            `id_order` INT( 11 ) UNSIGNED NOT NULL ,
            `is_cart` TINYINT( 1 ) UNSIGNED NOT NULL ,
            PRIMARY KEY ( `id_belvg_fc_fields_data` ) ,
            INDEX ( `id_order` )
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
