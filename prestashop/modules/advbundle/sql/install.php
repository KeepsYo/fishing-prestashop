<?php
/**
* 2007-2014 PrestaShop
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
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2014 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'advanced_bundle_tmp`;
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'advanced_bundle_tmp` (
  `id_tmp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `serialize` LONGTEXT NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE='._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8;';

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'advanced_bundle`;
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'advanced_bundle` (
  `id_pack` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_discount_type` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `id_product` int(11) NOT NULL,
  `allow_remove_item` tinyint(1) NOT NULL,
  `all_percent_discount` float NOT NULL,
  `all_price_amount` float NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pack`),
  KEY `id_discount_type` (`id_discount_type`)
) ENGINE='._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8;';

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'advanced_bundle_attributes`;
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'advanced_bundle_attributes` (
  `id_product` int(11) NOT NULL,
  `id_product_attribute` int(11) NOT NULL,
  `hash` text NOT NULL,
  `id_specific` int(11) NOT NULL,
  `attributes` text NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_pack` int(11) NOT NULL,
  UNIQUE KEY `id_product` (`id_product`,`id_product_attribute`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'advanced_bundle_product`;
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'advanced_bundle_product` (
  `id_product` int(11) unsigned NOT NULL,
  `id_pack` int(11) unsigned NOT NULL,
  `position` int(11) unsigned NOT NULL,
  `id_attribute_default` int(11) NOT NULL,
  `amount` float NOT NULL,
  `disc_type` varchar(64) NOT NULL,
  `qty_item` int(11) NOT NULL,
  `custom_combination` tinyint(1) NOT NULL,
  `include_comb` text NOT NULL,
  KEY `pack` (`position`),
  KEY `id_product` (`id_product`,`id_pack`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query)
	if (!empty($query))
		if (Db::getInstance()->execute($query) == false)
			return false;