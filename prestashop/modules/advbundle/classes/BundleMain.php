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

class BundleMain extends ObjectModel
{
	public $id;
	public $active = 1;
	public $id_currency;
	public $original_price;
	public $bundle_price;
	public $date_from;
	public $date_to;
	public $description;
	public $other;
	public $id_discount_type;
	public $nb_products;
	public $category;
	public $id_product;
	public $products;
	public $pack_name;
	public static $definition = array(
		'table' => 'advanced_bundle',
		'primary' => 'id_pack',
		'fields' => array(
			'active' => 				array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'id_currency' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'id_product' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'bundle_price' => 			array('type' => self::TYPE_FLOAT, 'required' => true),
			'original_price' => 		array('type' => self::TYPE_FLOAT, 'required' => true),
			'date_from' => 				array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
			'date_to' => 				array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
			'position' => 				array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'id_discount_type' => 		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
		),
	);

	public function __construct($id = null, $id_lang = null, $full = false)
	{
		if ($id_lang == null || $id_lang == '')
			$id_lang = Context::getContext()->language->id;

		$parent = parent::__construct($id);
		if ($full)
		{
			$product = Db::getInstance()->getRow('SELECT `id_category_default`, `reference`
													FROM `'._DB_PREFIX_.'product` WHERE `id_product` = '.$this->id_product);

			$this->category = Db::getInstance()->getValue('SELECT `name`
															FROM `'._DB_PREFIX_.'category_lang`
															WHERE `id_category` = '.$product['id_category_default'].' AND `id_lang` = '.$id_lang);

			$products = Db::getInstance()->ExecuteS('SELECT `id_product` FROM `'._DB_PREFIX_.'advanced_bundle_product` WHERE `id_pack` = '.$this->id);
			$this->nb_products = count($products);
			$this->reference = $product['reference'];
			foreach ($products as $prod)
			{
				$name = Db::getInstance()->getValue('SELECT `name`
													FROM `'._DB_PREFIX_.'product_lang`
													WHERE `id_product` = '.$prod['id_product'].' AND `id_lang` = '.$id_lang);

				$this->products .= ((($this->nb_products) > 1) ? ' + ' : '').$name;
			}

			$this->products = trim($this->products, ' + ');
			$this->pack_name = Db::getInstance()->getValue('SELECT `name`
															FROM `'._DB_PREFIX_.'product_lang`
															WHERE `id_product` = '.$this->id_product.' AND `id_lang` = '.$id_lang);
		}

		return $parent;
	}

	public static function getBundleProductNames($id_pack)
	{
		$name_array = array();
		$names = Db::getInstance()->ExecuteS('SELECT pl.name, bp.qty_item, pl.id_product
											FROM `'._DB_PREFIX_.'advanced_bundle_product` bp
											LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (bp.id_product = pl.id_product AND pl.id_lang = '.(int)Context::getContext()->language->id.')
											WHERE `id_pack` = '.(int)$id_pack.' ORDER BY `position`');

		foreach ($names as $name)
			$name_array[$name['id_product']] = $name;

		return $name_array;
	}

	public static function getBundleProducts($id)
	{
		$data_array = array();
		$data = Db::getInstance()->ExecuteS('SELECT bp.`id_product`
											FROM `'._DB_PREFIX_.'advanced_bundle_product` bp
											LEFT JOIN `'._DB_PREFIX_.'advanced_bundle` bm ON (bp.id_pack = bm.id_pack)
											WHERE bm.`id_product` = '.(int)$id.' ORDER BY bp.`position`');

		foreach ($data as $d)
			$data_array[] = $d['id_product'];

		return $data_array;
	}

	public static function getBundlePrices($pack_data, $incl = array(), $first = true, $admin = false)
	{
		$original_incl = 0;
		$original_excl = 0;
		$final_excl = 0;
		$final_incl = 0;

		$original_incl_mod = 0;
		$original_excl_mod = 0;
		$final_excl_mod = 0;
		$final_incl_mod = 0;

		$disc_excl = 0;
		$disc_incl = 0;
		$percent = 0;
		$prod_price = array();
		$currency_now = Context::getContext()->currency;

		if (count($pack_data['products']))
		{
			switch ($pack_data['id_discount_type'])
			{
				case 0:
					foreach ($pack_data['products'] as $product)
					{
						if (isset($product['combinations']) && count($product['combinations']))
						{
							foreach ($product['combinations'] as $comb)
								if ($comb['default_on'])
								{
									$original_incl += $comb['price_incl'] * $product['qty_item'];
									$original_excl += $comb['price_excl'] * $product['qty_item'];
									if (!$admin && !$first && in_array($product['id_product'], $incl))
									{
										$original_incl_mod += $comb['price_incl'] * $product['qty_item'];
										$original_excl_mod += $comb['price_excl'] * $product['qty_item'];
									}

									$prod_price[$product['id_product']] = array(
										'original_price' => $comb['price_incl'],
										'final_price' => $comb['price_incl'],
										'final_price_excl' => $comb['price_excl'],
										'discount' => 0,
										'qty' => $product['qty_item']
									);
								}
						}
						else
						{
							$price_incl = Product::getPriceStatic($product['id_product'], true, null, 6, null, false, false);
							$price_excl = Product::getPriceStatic($product['id_product'], false, null, 6, null, false, false);
							$original_incl += $price_incl * $product['qty_item'];
							$original_excl += $price_excl * $product['qty_item'];
							if (!$admin && !$first && in_array($product['id_product'], $incl))
							{
								$original_incl_mod += $price_incl * $product['qty_item'];
								$original_excl_mod += $price_excl * $product['qty_item'];
							}

							$prod_price[$product['id_product']] = array(
								'original_price' => $price_incl,
								'final_price' => $price_incl,
								'final_price_excl' => $price_excl,
								'discount' => 0,
								'qty' => $product['qty_item']
							);
						}
					}

					$final_incl = $original_incl;
					$final_excl = $original_excl;

					$final_incl_mod = $original_incl_mod;
					$final_excl_mod = $original_excl_mod;
					break;
				case 1:
					$percent = $pack_data['all_percent_discount'];
					$discount = $percent / 100;
					foreach ($pack_data['products'] as $product)
					{
						if (isset($product['combinations']) && count($product['combinations']))
						{
							foreach ($product['combinations'] as $comb)
								if ($comb['default_on'])
								{
									$original_incl += $comb['price_incl'] * $product['qty_item'];
									$original_excl += $comb['price_excl'] * $product['qty_item'];
									if (!$admin && !$first && in_array($product['id_product'], $incl))
									{
										$original_incl_mod += $comb['price_incl'] * $product['qty_item'];
										$original_excl_mod += $comb['price_excl'] * $product['qty_item'];
									}

									$prod_price[$product['id_product']] = array(
										'original_price' => $comb['price_incl'],
										'final_price' => $comb['price_incl'] - ($comb['price_incl'] * $discount),
										'final_price_excl' => $comb['price_excl'] - ($comb['price_excl'] * $discount),
										'discount' => 0,
										'qty' => $product['qty_item']
									);
								}
						}
						else
						{
							$price_incl = Product::getPriceStatic($product['id_product'], true, null, 6, null, false, false);
							$price_excl = Product::getPriceStatic($product['id_product'], false, null, 6, null, false, false);
							$original_incl += $price_incl * $product['qty_item'];
							$original_excl += $price_excl * $product['qty_item'];
							if (!$admin && !$first && in_array($product['id_product'], $incl))
							{
								$original_incl_mod += $price_incl * $product['qty_item'];
								$original_excl_mod += $price_excl * $product['qty_item'];
							}

							$prod_price[$product['id_product']] = array(
								'original_price' => $price_incl,
								'final_price' => $price_incl - ($price_incl * $discount),
								'final_price_excl' => $price_excl - ($price_excl * $discount),
								'discount' => 00,
								'qty' => $product['qty_item']
							);
						}
					}

					$final_incl = $original_incl - ($original_incl * $discount);
					$final_excl = $original_excl - ($original_excl * $discount);

					$final_incl_mod = $original_incl_mod - ($original_incl_mod * $discount);
					$final_excl_mod = $original_excl_mod - ($original_excl_mod * $discount);

					break;
				case 2:
					foreach ($pack_data['products'] as $product)
					{
						if (isset($product['combinations']) && count($product['combinations']))
						{
							foreach ($product['combinations'] as $comb)
								if ($comb['default_on'])
								{
									$original_incl += $comb['price_incl'] * $product['qty_item'];
									$original_excl += $comb['price_excl'] * $product['qty_item'];
									$prod_price[$product['id_product']] = array(
										'original_price' => $comb['price_incl'],
										'final_price' => $comb['price_incl'],
										'final_price_excl' => $comb['price_excl'],
										'discount' => 00,
										'qty' => $product['qty_item']
									);
								}
						}
						else
						{
							$price_incl = Product::getPriceStatic($product['id_product'], true, null, 6, null, false, false);
							$price_excl = Product::getPriceStatic($product['id_product'], false, null, 6, null, false, false);
							$original_incl += $price_incl * $product['qty_item'];
							$original_excl += $price_excl * $product['qty_item'];
							$prod_price[$product['id_product']] = array(
								'original_price' => $price_incl,
								'final_price' => $price_incl,
								'final_price_excl' => $price_excl,
								'discount' => 0,
								'qty' => $product['qty_item']
							);
						}
					}

					$discount = Tools::convertPriceFull($pack_data['all_price_amount'], null, $currency_now);
					$final_incl = $original_incl - $discount;
					$final_excl = $original_excl - $discount;
					break;
				case 3:
					foreach ($pack_data['products'] as $product)
					{
						if (isset($product['combinations']) && count($product['combinations']))
						{
							foreach ($product['combinations'] as $comb)
								if ($comb['default_on'])
								{
									$original_incl += $comb['price_incl'] * $product['qty_item'];
									$original_excl += $comb['price_excl'] * $product['qty_item'];
									if (!$admin && !$first && in_array($product['id_product'], $incl))
									{
										$original_incl_mod += $comb['price_incl'] * $product['qty_item'];
										$original_excl_mod += $comb['price_excl'] * $product['qty_item'];
									}

									if ($product['disc_type'] == 'amount')
									{
										$product['amount'] = Tools::convertPriceFull($product['amount'], null, $currency_now);
										if ($comb['price_excl'] <= $product['amount'])
										{
											$prod_price[$product['id_product']] = array(
												'original_price' => $comb['price_incl'],
												'final_price' => 0,
												'final_price_excl' => 0,
												'discount' => 100,
												'qty' => $product['qty_item']
											);
										}
										else
										{
											$final_excl += ($comb['price_excl'] - $product['amount']) * $product['qty_item'];
											$final_incl += ($comb['price_incl'] - $product['amount']) * $product['qty_item'];
											if (!$admin && !$first && in_array($product['id_product'], $incl))
											{
												$final_excl_mod += ($comb['price_excl'] - $product['amount']) * $product['qty_item'];
												$final_incl_mod += ($comb['price_incl'] - $product['amount']) * $product['qty_item'];
											}

											$prod_price[$product['id_product']] = array(
												'original_price' => $comb['price_incl'],
												'final_price' => $comb['price_incl'] - $product['amount'],
												'final_price_excl' => $comb['price_excl'] - $product['amount'],
												'discount' => 0,
												'qty' => $product['qty_item']
											);
										}
									}
									elseif ($product['disc_type'] == 'percent')
									{
										$final_excl += ($comb['price_excl'] - ($comb['price_excl'] * $product['amount'] / 100)) * $product['qty_item'];
										$final_incl += ($comb['price_incl'] - ($comb['price_incl'] * $product['amount'] / 100)) * $product['qty_item'];
										if (!$admin && !$first && in_array($product['id_product'], $incl))
										{
											$final_excl_mod += ($comb['price_excl'] - ($comb['price_excl'] * $product['amount'] / 100)) * $product['qty_item'];
											$final_incl_mod += ($comb['price_incl'] - ($comb['price_incl'] * $product['amount'] / 100)) * $product['qty_item'];
										}

										$prod_price[$product['id_product']] = array(
											'original_price' => $comb['price_incl'],
											'final_price' => $comb['price_incl'] - ($comb['price_incl'] * $product['amount'] / 100),
											'final_price_excl' => $comb['price_excl'] - ($comb['price_excl'] * $product['amount'] / 100),
											'discount' => 00,
											'qty' => $product['qty_item']
										);
									}
								}
						}
						else
						{
							$price_incl = Product::getPriceStatic($product['id_product'], true, null, 6, null, false, false);
							$price_excl = Product::getPriceStatic($product['id_product'], false, null, 6, null, false, false);
							$original_incl += $price_incl * $product['qty_item'];
							$original_excl += $price_excl * $product['qty_item'];
							if (!$admin && !$first && in_array($product['id_product'], $incl))
							{
								$original_incl_mod += $price_incl * $product['qty_item'];
								$original_excl_mod += $price_excl * $product['qty_item'];
							}

							if ($product['disc_type'] == 'amount')
							{
								$product['amount'] = Tools::convertPriceFull($product['amount'], null, $currency_now);
								if ($price_excl <= $product['amount'])
								{
									$prod_price[$product['id_product']] = array(
										'original_price' => $price_incl,
										'final_price' => 0,
										'final_price_excl' => 0,
										'discount' => 100,
										'qty' => $product['qty_item']
									);
								}
								else
								{
									$final_excl += ($price_excl - $product['amount']) * $product['qty_item'];
									$final_incl += ($price_incl - $product['amount']) * $product['qty_item'];
									if (!$admin && !$first && in_array($product['id_product'], $incl))
									{
										$final_excl_mod += ($price_excl - $product['amount']) * $product['qty_item'];
										$final_incl_mod += ($price_incl - $product['amount']) * $product['qty_item'];
									}

									$prod_price[$product['id_product']] = array(
										'original_price' => $price_incl,
										'final_price' => $price_incl - $product['amount'],
										'final_price_excl' => $price_excl - $product['amount'],
										'discount' => 0,
										'qty' => $product['qty_item']
									);
								}
							}
							elseif ($product['disc_type'] == 'percent')
							{
								$final_excl += ($price_excl - ($price_excl * $product['amount'] / 100)) * $product['qty_item'];
								$final_incl += ($price_incl - ($price_incl * $product['amount'] / 100)) * $product['qty_item'];
								if (!$admin && !$first && in_array($product['id_product'], $incl))
								{
									$final_excl_mod += ($price_excl - ($price_excl * $product['amount'] / 100)) * $product['qty_item'];
									$final_incl_mod += ($price_incl - ($price_incl * $product['amount'] / 100)) * $product['qty_item'];
								}

								$prod_price[$product['id_product']] = array(
									'original_price' => $price_incl,
									'final_price' => $price_incl - ($price_incl * $product['amount'] / 100),
									'final_price_excl' => $price_excl - ($price_excl * $product['amount'] / 100),
									'discount' => 0,
									'qty' => $product['qty_item']
								);
							}
						}
					}

					break;
			}

			foreach ($prod_price as &$pp)
				$pp['discount'] = 100 - (($pp['final_price'] / $pp['original_price']) * 100);

			if (!$admin && !$first && $final_incl_mod != $final_incl && $pack_data['id_discount_type'] != 2)
			{
				$final_incl = $final_incl_mod;
				$final_excl = $final_excl_mod;
				$original_incl = $original_incl_mod;
				$original_excl = $original_excl_mod;
			}

			$disc_excl = $original_excl - $final_excl;
			$disc_incl = $original_incl - $final_incl;
			$percent = 100 - (($final_incl / $original_incl) * 100);

			if (!$admin && $final_incl < 0)
			{
				foreach ($prod_price as &$pp)
				{
					$pp['final_price_excl'] = 0;
					$pp['final_price'] = 0;
					$pp['discount'] = 100;
				}

				$final_incl = $final_excl = 0;
				$percent = 100;
			}

			$prices = array(
				'original_incl' => $original_incl,
				'original_excl' => $original_excl,
				'final_incl' => $final_incl,
				'final_excl' => $final_excl,
				'disc_incl' => $disc_incl,
				'disc_excl' => $disc_excl,
				'percent_disc' => number_format($percent, 2),
				'different_prices' => $prod_price
			);
			// Tools::d($prices);
		}
		else
		{
			$prices = array(
				'original_incl' => $original_incl,
				'original_excl' => $original_excl,
				'final_incl' => $final_incl,
				'final_excl' => $final_excl,
				'disc_incl' => $disc_incl,
				'disc_excl' => $disc_excl,
				'percent_disc' => number_format($percent, 2)
			);
		}

		return $prices;
	}

	public static function getPostData($ids_product, $full = false)
	{
		$products = array();
		if (count($ids_product))
		{
			foreach ($ids_product as $k => $id_product)
			{
				$ipa = Tools::getValue('def_combination_'.$id_product, 0);
				$products[$k]['id_product'] = $id_product;
				$products[$k]['qty_item'] = Tools::getValue('bundle_quantity_'.$id_product);
				$products[$k]['amount'] = Tools::getValue('bundle_reduction_amount_'.$id_product);
				$products[$k]['disc_type'] = Tools::getValue('bundle_disc_type_'.$id_product);
				if ($full)
				{
					$products[$k]['id_attribute_default'] = $ipa;
					$products[$k]['custom_combination'] = Tools::getValue('custom_combination_'.(int)$id_product);
					$products[$k]['include_comb'] = serialize(Tools::getValue('include_comb_'.(int)$id_product));
				}
				else
				{
					if ($ipa > 0)
					{
						$products[$k]['combinations'][0]['id_product_attribute'] = $ipa;
						$products[$k]['combinations'][0]['default_on'] = true;
						$products[$k]['combinations'][0]['price_incl'] = Product::getPriceStatic($id_product, true, $ipa, 6, null, false, false);
						$products[$k]['combinations'][0]['price_excl'] = Product::getPriceStatic($id_product, false, $ipa, 6, null, false, false);
					}
				}
			}
		}

		return $products;
	}

	public static function getBundleValue($list)
	{
		$data = array();
		$main_data = array();
		$main_data['id_pack'] = Tools::getValue('bundle_id_pack', 0);
		$main_data['allow_remove_item'] = Tools::getValue('allow_remove_item');
		$main_data['id_discount_type'] = Tools::getValue('id_discount_type');
		$main_data['all_percent_discount'] = Tools::getValue('all_percent_discount');
		$main_data['all_price_amount'] = Tools::getValue('all_price_amount');
		foreach ($list as $row)
		{
			$data[$row]['id_product'] = (int)$row;
			$data[$row]['def_comb'] = Tools::getValue('def_combination_'.(int)$row);
			$data[$row]['custom_combination'] = Tools::getValue('custom_combination_'.(int)$row);
			$data[$row]['disc_type'] = Tools::getValue('bundle_disc_type_'.(int)$row);
			$data[$row]['reduction_amount'] = Tools::getValue('bundle_reduction_amount_'.(int)$row);
			$data[$row]['include_comb'] = Tools::getValue('include_comb_'.(int)$row);
			$data[$row]['quantity'] = Tools::getValue('bundle_quantity_'.(int)$row);
		}

		return array('main_data' => $main_data, 'data' => $data);
	}

	public static function getAdminLink($controller, $with_token = true)
	{
		$id_lang = Context::getContext()->language->id;
		$params = $with_token ? array('token' => Tools::getAdminTokenLite($controller)) : array();
		return Dispatcher::getInstance()->createUrl($controller, $id_lang, $params, false);
	}

	public static function getBundleDataNew($pack_data, $pack_products, $admin = true, $first = false)
	{
		$comb_array = array();
		$include_ids = Tools::getValue('incl_ids', array());
		$allow_add = true;
		$new_version = false;
		if (_PS_VERSION_ >= '1.6.0.0')
			$new_version = true;
		elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ < '1.6.0.0')
			$new_version = false;

		foreach ($pack_products as &$product)
		{
			$def_id = 0;
			$product['error'] = '';
			$colors = array();
			$groups = array();
			$combinations = array();
			$combination_images = array();
			$context = Context::getContext();
			$module = Module::getInstanceByName('advbundle');
			$object = new Product($product['id_product'], false, $context->language->id);
			$id_image = Db::getInstance()->getValue('SELECT `id_image` FROM `'._DB_PREFIX_.'image` WHERE `cover` = 1 AND `id_product` = '.$object->id);
			$sale = Db::getInstance()->getValue('SELECT `quantity` FROM `'._DB_PREFIX_.'product_sale` WHERE `id_product` = '.$object->id);
			$images = $object->getImages((int)$context->cookie->id_lang);
			$attributes_groups = $object->getAttributesGroups($context->language->id);
			$icomb = unserialize($product['include_comb']);
			$combination_images = $object->getCombinationImages($context->language->id);
			if (is_array($attributes_groups) && $attributes_groups)
			{
				foreach ($attributes_groups as $row)
				{
					if (!$admin && $product['custom_combination'])
						if (!in_array($row['id_product_attribute'], $icomb))
							continue;

					$def_id = $product['id_attribute_default'];
					if (isset($row['is_color_group']) && $row['is_color_group']
					&& (isset($row['attribute_color']) && $row['attribute_color'])
					|| (file_exists(_PS_COL_IMG_DIR_.$row['id_attribute'].'.jpg')))
					{
						$colors[$row['id_attribute']]['value'] = $row['attribute_color'];
						$colors[$row['id_attribute']]['name'] = $row['attribute_name'];
						if (!isset($colors[$row['id_attribute']]['attributes_quantity']))
							$colors[$row['id_attribute']]['attributes_quantity'] = 0;
						$colors[$row['id_attribute']]['attributes_quantity'] += (int)$row['quantity'];
					}
					if (!isset($groups[$row['id_attribute_group']]))
						$groups[$row['id_attribute_group']] = array(
							'group_name' => $row['group_name'],
							'name' => $row['public_group_name'],
							'group_type' => $row['group_type'],
							'default' => -1,
						);

					$groups[$row['id_attribute_group']]['attributes'][$row['id_attribute']] = $row['attribute_name'];
					if ($row['id_product_attribute'] == $product['id_attribute_default'])
						$groups[$row['id_attribute_group']]['default'] = (int)$row['id_attribute'];
					if (!isset($groups[$row['id_attribute_group']]['attributes_quantity'][$row['id_attribute']]))
						$groups[$row['id_attribute_group']]['attributes_quantity'][$row['id_attribute']] = 0;
					$groups[$row['id_attribute_group']]['attributes_quantity'][$row['id_attribute']] += (int)$row['quantity'];

					$combinations[$row['id_product_attribute']]['id_product_attribute'] = $row['id_product_attribute'];
					$combinations[$row['id_product_attribute']]['attributes_values'][$row['id_attribute_group']] = $row['attribute_name'];
					if ($admin)
						$combinations[$row['id_product_attribute']]['attributes'][] = array($row['group_name'], $row['attribute_name'], $row['id_attribute']);
					else
						$combinations[$row['id_product_attribute']]['attributes'][] = (int)$row['id_attribute'];
					$combinations[$row['id_product_attribute']]['price'] = (float)$row['price'];
					$combinations[$row['id_product_attribute']]['price_incl']
						= Product::getPriceStatic($object->id, true, $row['id_product_attribute'], 6, null, false, false);
					$combinations[$row['id_product_attribute']]['price_excl']
						= Product::getPriceStatic($object->id, false, $row['id_product_attribute'], 6, null, false, false);
					$combinations[$row['id_product_attribute']]['ecotax'] = (float)$row['ecotax'];
					$combinations[$row['id_product_attribute']]['weight'] = (float)$row['weight'];
					$combinations[$row['id_product_attribute']]['quantity'] = (int)$row['quantity'];
					$combinations[$row['id_product_attribute']]['ean13'] = '';
					$combinations[$row['id_product_attribute']]['reference'] = $row['reference'];
					$combinations[$row['id_product_attribute']]['unit_impact'] = $row['price'];
					$combinations[$row['id_product_attribute']]['minimal_quantity'] = $row['minimal_quantity'];
					$combinations[$row['id_product_attribute']]['default_on'] = false;
					$combinations[$row['id_product_attribute']]['id_image'] = (int)$combination_images[$row['id_product_attribute']][0]['id_image'];

					if (($def_id < 1) && !$first && $product['custom_combination'])
					{
						$product['error'] = $module->getErrorsClass('combination');
						$def_id = BundleMain::getDefaultAttribute($object->id, $pack_data['id_pack']);
					}

					if ($def_id < 1)
						$def_id = Product::getDefaultAttribute($object->id);

					$product['id_attribute_default'] = $def_id;

					if ($product['id_attribute_default'] > 0)
					{
						if ($product['id_attribute_default'] == $row['id_product_attribute'])
							$combinations[$row['id_product_attribute']]['default_on'] = true;
					}
					else
						$combinations[$row['id_product_attribute']]['default_on'] = $row['default_on'];

					if ($def_id == $row['id_product_attribute'])
					{
						if ($combinations[$row['id_product_attribute']]['id_image'] > 1)
							$id_image = $combinations[$row['id_product_attribute']]['id_image'];

						if ($row['quantity'] < $product['qty_item'])
						{
							$product['error'] = $module->getErrorsClass('combination_qty');
							if (in_array($product['id_product'], $include_ids) || $first)
								$allow_add = false;
						}
					}

					if ($row['available_date'] != '0000-00-00')
					{
						$combinations[$row['id_product_attribute']]['available_date'] = $row['available_date'];
						$combinations[$row['id_product_attribute']]['date_formatted'] = Tools::displayDate($row['available_date']);
					}
					else
						$combinations[$row['id_product_attribute']]['available_date'] = 0;
				}

				if (!Product::isAvailableWhenOutOfStock($object->out_of_stock) && Configuration::get('PS_DISP_UNAVAILABLE_ATTR') == 0)
				{
					foreach ($groups as &$group)
						foreach ($group['attributes_quantity'] as $key => &$quantity)
							if ($quantity <= 0)
								unset($group['attributes'][$key]);

					foreach ($colors as $key => $color)
						if ($color['attributes_quantity'] <= 0)
							unset($colors[$key]);
				}

				foreach ($combinations as $id_product_attribute => $comb)
				{
					$list = '';
					asort($comb['attributes']);
					foreach ($comb['attributes'] as $attribute)
						$list .= $attribute[0].' - '.$attribute[1].', ';

					$list = rtrim($list, ', ');
					$combinations[$id_product_attribute]['name'] = $list;
					$combinations[$id_product_attribute]['list'] = $list;
				}
			}
			else
			{
				$pqty = StockAvailable::getQuantityAvailableByProduct($product['id_product']);
				if ($pqty < $product['qty_item'])
				{
					$product['error'] = $module->getErrorsClass('product_qty');
					if (in_array($product['id_product'], $include_ids) || $first)
						$allow_add = false;
				}
			}

			$comb_array[$product['id_product']] = $combinations;
			if ($def_id > 0 && count($combination_images) && isset($combination_images[$def_id][0]))
				$product['cover'] = $combination_images[$def_id][0];
			else
				$product['cover'] = isset($images[0]) ? $images[0] : '';

			$incl = $first ? true : in_array($object->id, $include_ids);
			// if (!$id_image || empty($id_image))
				// $id_image = 'default';
			ksort($combinations);
			$array = array(
				'def' => $def_id,
				'bundle_include' => $incl,
				'link_rewrite' => $object->link_rewrite,
				'description' => $object->description,
				'id' => $object->id,
				'groups' => $groups,
				'colors' => $colors,
				'images' => $images,
				'combinations' => $combinations,
				'selected_array' => isset($product['include_comb']) ? unserialize($product['include_comb']) : array(),
				'price_incl' => Product::getPriceStatic($object->id, true, null, 6, null, false, false),
				'price_excl' => Product::getPriceStatic($object->id, false, null, 6, null, false, false),
				'name' => $object->name,
				'reference' => $object->reference,
				'quantity' => ($def_id ? $combinations[$def_id]['quantity'] : $object->quantity),
				'sale' => ($sale ? $sale : 0),
				'def_id' => $def_id ? $def_id : 0,
				'comb_default' => ($def_id ? $combinations[$def_id]['name'] : '---'),
				'image' => $context->link->getImageLink($object->link_rewrite, (int)$object->id.'-'.(int)$id_image, ImageType::getFormatedName('small'))
			);

			if ($admin)
				$array['href'] = BundleMain::getAdminLink('AdminProducts').'&updateproduct&id_product='.$object->id;

			$product = array_merge($product, $array);
			unset($array);
		}

		$pack_data['products'] = $pack_products;
		$pack_data['prices'] = BundleMain::getBundlePrices($pack_data, $include_ids, $first, $admin);
		$pack_data['combinations'] = $comb_array;
		$pack_data['allow_add'] = $allow_add;
		$pack_data['new_version'] = $new_version;

		return $pack_data;
	}

	public static function getFrontProductPack($pack_data, $pack_products, $first = true)
	{
		$admin = false;
		$pack_data = BundleMain::getBundleDataNew($pack_data, $pack_products, $admin, $first);
		return $pack_data;
	}

	public static function getBundleData($pack_data, $pack_products)
	{
		$admin = true;
		$pack_data = BundleMain::getBundleDataNew($pack_data, $pack_products, $admin);
		return $pack_data;
	}

	public static function isBundle($id_product)
	{
		return Db::getInstance()->getValue('SELECT `id_pack` FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_product` = '.(int)$id_product);
	}

	protected static function getDefaultAttribute($id, $id_pack)
	{
		return Db::getInstance()->getValue('SELECT `id_attribute_default` FROM `'._DB_PREFIX_.'advanced_bundle_product`
			WHERE `id_product` = '.(int)$id.' AND id_pack = '.$id_pack);
	}

	public static function smartySet($pack_data, $object, $context)
	{
		$set_color = array(
			'BUNDLE_COLOR_MAIN',
			'BUNDLE_COLOR_ELEMENT',
			'BUNDLE_COLOR_BUTTON',
			'BUNDLE_COLOR_BUTTON_BORDER',
			'BUNDLE_COLOR_BUTTONH',
			'BUNDLE_COLOR_BUTTON_BORDERH',
			'BUNDLE_COLOR_VBUTTON',
			'BUNDLE_COLOR_VBUTTON_BORDER',
			'BUNDLE_COLOR_VBUTTONH',
			'BUNDLE_COLOR_VBUTTON_BORDERH'
		);

		$data_array = array();
		foreach ($set_color as $sc)
			$data_array[$sc] = Tools::getValue($sc, Configuration::get($sc));

		$return = array(
			'allow_add' => $pack_data['allow_add'],
			'allow_remove_item' => $pack_data['allow_remove_item'],
			'id_pack' => $pack_data['id_pack'],
			'discount_type' => $pack_data['id_discount_type'],
			'products' => $pack_data['products'],
			'object' => $object,
			'prices' => $pack_data['prices'],
			'combinations' => $pack_data['combinations'],
			'display_qties' => (int)Configuration::get('PS_DISPLAY_QTIES'),
			'display_ht' => !Tax::excludeTaxeOption(),
			'currencySign' => $context->currency->sign,
			'currencyRate' => $context->currency->conversion_rate,
			'currencyFormat' => $context->currency->format,
			'currencyBlank' => $context->currency->blank,
			'jqZoomEnabled' => Configuration::get('PS_DISPLAY_JQZOOM'),
			'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
			'largeSize' => Image::getSize(ImageType::getFormatedName('large')),
			'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
			'cartSize' => Image::getSize(ImageType::getFormatedName('cart')),
			'col_img_dir' => _PS_COL_IMG_DIR_
		);

		$return = array_merge($return, $data_array);

		return $return;
	}

	public static function addCache($data)
	{
		if (empty($data))
			return;

		$id_tmp = Context::getContext()->cookie->id_tmp;
		$id_tmpbd = Db::getInstance()->getValue('SELECT id_tmp FROM `'._DB_PREFIX_.'advanced_bundle_tmp` WHERE id_tmp = '.(int)$id_tmp);

		$cryptor = BundleMain::getCryptor();
		$data = $cryptor->encrypt(serialize($data));
		if ($id_tmpbd)
			Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'advanced_bundle_tmp SET `serialize` = "'.pSQL($data).'" WHERE id_tmp = '.(int)$id_tmpbd);
		else
			Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'advanced_bundle_tmp (`serialize`) VALUES ("'.pSQL($data).'")');

		if (!$id_tmpbd)
			$id_tmpbd = Db::getInstance()->Insert_ID();

		Context::getContext()->cookie->id_tmp = $id_tmpbd;
	}

	public static function getCache($id_cache)
	{
		if ($id_cache)
		{
			$db_cache = Db::getInstance()->getValue('SELECT serialize FROM `'._DB_PREFIX_.'advanced_bundle_tmp` WHERE `id_tmp` = '.(int)$id_cache);
			$cryptor = BundleMain::getCryptor();
			$cache_data = unserialize($cryptor->decrypt($db_cache));
		}
		else
			$cache_data = array();

		return $cache_data;
	}

	public static function delCache($id_cache)
	{
		if (!$id_cache)
			return;

		Db::getInstance()->delete('advanced_bundle_tmp', 'id_tmp = '.$id_cache);
	}

	public static function getCryptor()
	{
		if (!Configuration::get('PS_CIPHER_ALGORITHM') || !defined('_RIJNDAEL_KEY_'))
			$cipher_tool = new Blowfish(_COOKIE_KEY_, _COOKIE_IV_);
		else
			$cipher_tool = new Rijndael(_RIJNDAEL_KEY_, _RIJNDAEL_IV_);

		return $cipher_tool;
	}
}