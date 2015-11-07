<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

class OrderDetail extends OrderDetailCore
{
	public function createList(Order $order, Cart $cart, $id_order_state, $product_list, $id_order_invoice = 0, $use_taxes = true, $id_warehouse = 0)
	{
		require_once(_PS_MODULE_DIR_.'advbundle/classes/BundleMain.php');
		$id_lang = $this->context->language->id;
		$i = 1;
		$product_list_tmp = array();
		foreach ($product_list as $k => $product)
		{
			if ($id_pack = BundleMain::isBundle($product['id_product']))
			{
				unset($product_list[$k]);
				$comb_active = true;
				$batributes = Db::getInstance()->getRow('SELECT *
														FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
														WHERE `id_product` = '.$product['id_product'].'
														AND id_product_attribute = '.$product['id_product_attribute']);
				$values_db = explode('_', $batributes['attributes']);
				$array_db = array();
				foreach ($values_db as $val_db)
				{
					$val_db = explode(':', $val_db);
					$array_db[$val_db[0]] = $val_db[1];
				}

				$db_data = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_pack` = '.$id_pack);
				$object = new Product($db_data['id_product'], false, $id_lang);
				$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
																WHERE `id_pack` = '.$id_pack.' ORDER BY `position`');
				$list = array_keys($array_db);
				if (count($list) && $list > 1)
				{
					foreach ($pack_products as $key => &$pack_product)
					{
						if (in_array($pack_product['id_product'], $list))
							$pack_product['id_attribute_default'] = $array_db[$pack_product['id_product']] ? $array_db[$pack_product['id_product']] : 0;
						else
							unset($pack_products[$key]);
					}
				}

				$p_data = BundleMain::getFrontProductPack($db_data, $pack_products, true);
				$sql = new DbQuery();
				$sql->select('pl.`name`,
								p.`is_virtual`,
								p.`id_product`,
								p.`id_supplier`,
								pl.`description_short`,
								pl.`available_now`,
								pl.`available_later`,
								product_shop.id_shop,
								product_shop.`id_category_default`,
								product_shop.`on_sale`,
								product_shop.`ecotax`,
								product_shop.`additional_shipping_cost`,
								product_shop.`available_for_order`,
								product_shop.`price`,
								product_shop.`active`,
								product_shop.`unity`,
								product_shop.`unit_price_ratio`,
								p.`width`,
								p.`height`,
								p.`depth`,
								p.`weight`,
								p.`date_add`,
								p.`date_upd`,
								pl.`link_rewrite`,
								cl.`link_rewrite` AS category,
								product_shop.`wholesale_price`,
								product_shop.advanced_stock_management,
								IFNULL(sp.`reduction_type`, 0) AS reduction_type');
				$sql->from('product', 'p');
				$sql->innerJoin('product_shop', 'product_shop',
									'(product_shop.`id_shop` = product_shop.`id_shop`
									AND product_shop.`id_product` = p.`id_product`)
								');
				$sql->leftJoin('product_lang', 'pl', '
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl', 'product_shop.id_shop')
				);
				$sql->leftJoin('category_lang', 'cl', '
					product_shop.`id_category_default` = cl.`id_category`
					AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl', 'product_shop.id_shop')
				);
				$sql->leftJoin('specific_price', 'sp', 'sp.`id_product` = p.`id_product`');
				$sql->where('p.`id_product` IS NOT NULL');
				$sql->where('p.`id_product` IN ('.implode(',', array_keys($array_db)).')');
				$sql->orderBy('p.`date_add`, p.`id_product` ASC');
				$result = Db::getInstance()->executeS($sql);
				foreach ($result as &$res)
				{
					$attr_names = array();
					$combination_string = '';
					if ($array_db[$res['id_product']] > 0)
					{
						$comb = new Combination($array_db[$res['id_product']]);
						$combination_weight = $comb->weight;
						$attr_names = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
									SELECT al.*, agl.public_name
									FROM '._DB_PREFIX_.'product_attribute_combination pac
									LEFT JOIN '._DB_PREFIX_.'attribute_lang al ON (pac.id_attribute = al.id_attribute AND al.id_lang='.(int)$id_lang.')
									LEFT JOIN '._DB_PREFIX_.'attribute a ON (a.id_attribute = al.id_attribute)
									LEFT JOIN '._DB_PREFIX_.'attribute_group_lang agl ON (agl.id_attribute_group = a.id_attribute_group AND agl.id_lang='.(int)$id_lang.')
									WHERE pac.id_product_attribute = '.$array_db[$res['id_product']]);
						foreach ($attr_names as $an)
							$combination_string .= ' '.$an['public_name'].' - '.$an['name'].',';
						$combination_string = trim($combination_string, ',');
					}
					else
						$combination_weight = 0;

					$res['cart_quantity'] = $p_data['prices']['different_prices'][$res['id_product']]['qty'] * $product['cart_quantity'];
					$res['id_product_attribute'] = $array_db[$res['id_product']];
					$res['price'] = $p_data['prices']['different_prices'][$res['id_product']]['final_price_excl'];
					$res['price_wt'] = $p_data['prices']['different_prices'][$res['id_product']]['final_price'];
					if ($res['price'] < 0)
						$res['price'] = 0;
					if ($res['price_wt'] < 0)
						$res['price_wt'] = 0;
					$res['total_wt'] = Tools::ps_round($res['price_wt'] * $res['cart_quantity'], 2);
					$res['total'] = $res['price'] * $res['cart_quantity'];
					$res['name'] = trim($object->name.' ('.$i.') - '.$res['name'].($combination_string ? ' - '.$combination_string : ''));
					$res['weight_attribute'] = $res['weight'] + $combination_weight;
					$res['quantity'] = $res['stock_quantity'] = StockAvailable::getQuantityAvailableByProduct($res['id_product'], $res['id_product_attribute']);
					if ($res['quantity'] <= 0)
						$comb_active = false;
				}

				if ($batributes['id_cart'] == 0 && !$comb_active)
				{
					StockAvailable::setQuantity((int)$product['id_product'], $product['id_product_attribute'], 0, $this->context->shop->id);
					StockAvailable::setQuantity((int)$product['id_product'], 0, 100, $this->context->shop->id);
				}

				$product_list_tmp = array_merge($result, $product_list_tmp);
				unset($id_pack);
				unset($result);
				unset($array_db);
				$i++;
			}
		}

		$product_list = array_merge($product_list, $product_list_tmp);
		return parent::createList($order, $cart, $id_order_state, $product_list, $id_order_invoice, $use_taxes, $id_warehouse);
	}
}