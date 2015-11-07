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

if (!defined('_PS_VERSION_'))
	exit;

class Advbundle extends Module
{
	protected $config_form = false;
	public $is_new;
	public $def = 0;
	public $set_color = array(
			'BUNDLE_COLOR_MAIN',
			'BUNDLE_COLOR_ELEMENT',
			'BUNDLE_COLOR_BUTTON',
			'BUNDLE_COLOR_BUTTON_BORDER',
			'BUNDLE_COLOR_BUTTONH',
			'BUNDLE_COLOR_BUTTON_BORDERH',
			'BUNDLE_COLOR_VBUTTON',
			'BUNDLE_COLOR_VBUTTON_BORDER',
			'BUNDLE_COLOR_VBUTTONH',
			'BUNDLE_COLOR_VBUTTON_BORDERH',
			'BUNDLE_BLOCK',
			'BUNDLE_TAB'
		);

	public function __construct()
	{
		$this->name = 'advbundle';
		$this->tab = 'content_management';
		$this->version = '1.0.1';
		$this->author = 'absent';
		$this->module_key = 'ca5c2f2cb1214a04afaeaa86aad2528a';
		$this->need_instance = 0;
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('Advanced bundle');
		$this->description = $this->l('The module allows you to collect complete sets of goods, to assign to the shared discount or for each item.');
		if (_PS_VERSION_ >= '1.6.0.0')
			$this->is_new = true;
		elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0')
			$this->is_new = false;

		require_once(dirname(__FILE__).'/classes/BundleMain.php');
	}

	public function install()
	{
		Configuration::updateValue('ADVBUNDLE_LIVE_MODE', false);
		$this->inTab();
		$default_color = array(
			'BUNDLE_COLOR_MAIN' => '#1bbc9b',
			'BUNDLE_COLOR_ELEMENT' => '#03a9f4',
			'BUNDLE_COLOR_BUTTON' => '#03a9f4',
			'BUNDLE_COLOR_BUTTON_BORDER' => '#2980b9',
			'BUNDLE_COLOR_BUTTONH' => '#2980b9',
			'BUNDLE_COLOR_BUTTON_BORDERH' => '#1c5c87',
			'BUNDLE_COLOR_VBUTTON' => '#03a9f4',
			'BUNDLE_COLOR_VBUTTON_BORDER' => '#2980b9',
			'BUNDLE_COLOR_VBUTTONH' => '#2980b9',
			'BUNDLE_COLOR_VBUTTON_BORDERH' => '#1c5c87'
		);

		foreach ($default_color as $k => $dc)
			Configuration::UpdateValue($k, $dc);

		include(dirname(__FILE__).'/sql/install.php');
		return parent::install()
			&& $this->registerHook('header')
			&& $this->registerHook('backOfficeHeader')
			&& $this->registerHook('displayAdminProductsExtra')
			&& $this->registerHook('actionCartSave')
			&& $this->registerHook('displayTop')
			&& $this->registerHook('shoppingCart')
			&& $this->registerHook('productTabContent')
			&& $this->registerHook('productTab')
			&& $this->registerHook('actionValidateOrder')
			&& $this->registerHook('displayBackOfficeHeader');
	}

	public function uninstall()
	{
		$ag = new AttributeGroup((int)Configuration::get('ADVBUNDLE_GROUP'));
		$ag->delete();
		$new_tab = new Tab((int)Configuration::get('ADVBUNDLE_TAB'));
		$new_tab->delete();
		Configuration::deleteByName('ADVBUNDLE_LIVE_MODE');
		Configuration::deleteByName('ADVBUNDLE_GROUP');
		Configuration::deleteByName('ADVBUNDLE_TAB');
		include(dirname(__FILE__).'/sql/uninstall.php');
		return parent::uninstall();
	}

	public function inTab()
	{
		$ag_name = array(
			'ru' => 'Содержимое Комплекта',
			'en' => 'Pack Content'
		);

		$ag = new AttributeGroup();
		$ag->is_color_group = false;
		$ag->group_type = 'select';

		$languages = Language::getLanguages();
		$tabs_name = array(
			'ru' => 'Настройки Пак товаров',
			'en' => 'Settings bundle products'
		);

		$new_tab = new Tab();
		$new_tab->class_name = 'AdminAdvancedBundleMain';
		$new_tab->id_parent = Tab::getIdFromClassName('AdminCatalog');
		$new_tab->module = $this->name;
		$new_tab->active = 1;

		foreach ($languages as $language)
		{
			if (isset($ag_name[$language['iso_code']]) && $ag_name[$language['iso_code']] != '')
			{
				$ag->name[$language['id_lang']] = $ag_name[$language['iso_code']];
				$ag->public_name[$language['id_lang']] = $ag_name[$language['iso_code']];
			}
			else
			{
				$ag->name[$language['id_lang']] = $ag_name['en'];
				$ag->public_name[$language['id_lang']] = $ag_name['en'];
			}
		}

		foreach ($languages as $language)
		{
			if (isset($tabs_name[$language['iso_code']]) && $tabs_name[$language['iso_code']] != '')
				$new_tab->name[$language['id_lang']] = $tabs_name[$language['iso_code']];
			else
				$new_tab->name[$language['id_lang']] = $tabs_name['en'];

		}

		$new_tab->add();
		$ag->add();
		Configuration::updateValue('ADVBUNDLE_TAB', $new_tab->id);
		Configuration::updateValue('ADVBUNDLE_GROUP', $ag->id);
		unset($new_tab);
	}

	public function hookdisplayAdminProductsExtra()
	{
		$id_product = Tools::getValue('id_product');
		$id_pack = 0;
		$add = false;
		$update = false;
		$currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));

		if ($id_product)
			$id_pack = BundleMain::isBundle($id_product);

		$id_tmp = Context::getContext()->cookie->id_tmp;
		$cache_data = BundleMain::getCache($id_tmp);

		if ($id_product && $id_pack)
		{
			$update = true;
			if (isset($cache_data) && !empty($cache_data['products']))
			{
				$pack_data = $cache_data;
				BundleMain::delCache($id_tmp);
			}
			else
			{
				$pack_bundle = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_pack` = '.(int)$id_pack);
				$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
					WHERE `id_pack` = '.(int)$id_pack.' ORDER BY `position`');

				$pack_data = BundleMain::getBundleData($pack_bundle, $pack_products);
			}
		}
		elseif (Tools::isSubmit('newbundle') || Tools::getValue('bundle_new'))
		{
			$add = true;
			if (isset($cache_data) && !empty($cache_data['products']))
			{
				$pack_data = $cache_data;
				BundleMain::delCache($id_tmp);
			}
			else
			{
				$pack_data = array(
					'id_discount_type' => 0,
					'all_percent_discount' => 0,
					'allow_remove_item' => false,
					'all_price_amount' => 0,
					'products' => array(),
					'prices' => array(
						'original_excl' => 0,
						'original_incl' => 0,
						'final_excl' => 0,
						'final_incl' => 0,
						'disc_excl' => 0,
						'disc_incl' => 0,
						'percent_disc' => 0
					)
				);
			}
		}
		else
			return false;

		$link_ajax = $this->context->link->getAdminLink('AdminModules', false)
			.'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules');

		$exclude_ids = array();
		$all_pack = Db::getInstance()->ExecuteS('SELECT `id_product` FROM `'._DB_PREFIX_.'advanced_bundle`');
		foreach ($all_pack as $ap)
			$exclude_ids[] = $ap['id_product'];

		if (count($pack_data['products']))
		{
			$ids_product = array();
			foreach ($pack_data['products'] as $pp)
				$ids_product[] = $pp['id_product'];

			$exclude_ids = array_merge($exclude_ids, $ids_product);
		}

		$this->context->smarty->assign(array(
			'id_pack' => ($id_pack ? $id_pack : 0),
			'pack_data' => $pack_data,
			'bundle_new' => $add,
			'bundle_update' => $update,
			'bundle_exclids' => implode(',', $exclude_ids),
			'bundle_currency' => $currency,
			'bundle_ajax_link' => $link_ajax
		));

		return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
	}

	public function listProduct()
	{
		$exclude_ids = Tools::getValue('exclude_ids', false);
		if ($exclude_ids && $exclude_ids != 'NaN')
			$exclude_ids = implode(',', array_map('intval', explode(',', $exclude_ids)));
		else
			$exclude_ids = '';

		$query = Tools::getValue('q');
		$sql = new DbQuery();
		$sql->select('p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`');
		$sql->from('product', 'p');
		$sql->leftJoin('product_lang', 'pl', '
			p.`id_product` = pl.`id_product`
			AND pl.`id_lang` = '.(int)Context::getContext()->language->id
		);

		$where = '(pl.`name` LIKE \'%'.pSQL($query).'%\'
					OR p.`reference` LIKE \'%'.pSQL($query).'%\')'.(!empty($exclude_ids) ? 'AND p.id_product NOT IN ('.$exclude_ids.') ' : ' ');

		$sql->where($where);
		$sql->groupBy('`id_product`');
		$sql->orderBy('pl.`name` ASC');
		$sql->limit(10);

		$items = Db::getInstance()->executeS($sql);
		$results = array();
		foreach ($items as $item)
		{
			$product = array(
				'id' => (int)$item['id_product'],
				'name' => $item['name'],
				'ref' => (!empty($item['reference']) ? $item['reference'] : '')
			);

			array_push($results, $product);
		}

		die(Tools::jsonEncode($items));
	}

	public function hookproductTabContent($params)
	{
		if (Configuration::get('BUNDLE_BLOCK'))
		{
			$this->context->controller->addCSS($this->_path.'/views/css/front.css');
			$this->context->controller->addJS(__PS_BASE_URI__.'modules/advbundle/views/js/owl.carousel.js');
			$this->context->controller->addCSS(__PS_BASE_URI__.'modules/advbundle/views/css/owl.carousel.css');
			$this->context->controller->addCSS(__PS_BASE_URI__.'modules/advbundle/views/css/owl.theme.css');

			$link = new Link();
			$ids_packs = Db::getInstance()->ExecuteS('SELECT DISTINCT `id_pack` FROM `'._DB_PREFIX_.'advanced_bundle_product`
				WHERE `id_product` = '.(int)$params['product']->id.' ORDER BY `position`');

			$pack_data = array();
			foreach ($ids_packs as &$id)
			{
				$pack_bundle = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_pack` = '.(int)$id['id_pack']);
				$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
					WHERE `id_pack` = '.(int)$id['id_pack'].' ORDER BY `position`');

				$pack_data[$id['id_pack']] = BundleMain::getFrontProductPack($pack_bundle, $pack_products);// !!!
				$product = new Product($pack_data[$id['id_pack']]['id_product'], false, $this->context->language->id);
				$pack_data[$id['id_pack']]['link'] = $link->getProductLink($product);
				$req = array(
					'add' => 1,
					'id_product' => $product->id,
					'token' => Tools::getToken(false)
				);
				$pack_data[$id['id_pack']]['link_cart'] = $link->getPageLink('cart', true, null, $req, false);
				$pack_data[$id['id_pack']]['name_pack'] = $product->name;
				unset($product);
			}

			$data_array = array();
			foreach ($this->set_color as $sc)
				$data_array[$sc] = Tools::getValue($sc, Configuration::get($sc));

			$this->context->smarty->assign($data_array);
			$this->context->smarty->assign(array(
				'test' => 1,
				'pack_data' => $pack_data
			));

			return ($this->display(__FILE__, 'views/templates/front/related_bundle.tpl'));
		}
	}

	public function hookproductTab()
	{
		if (Configuration::get('BUNDLE_BLOCK'))
		{
			$this->context->smarty->assign('tab', Configuration::get('BUNDLE_TAB'));
			return $this->display(__FILE__, 'views/templates/front/tab.tpl');
		}
	}

	public function getLine()
	{
		$id = Tools::getValue('id');
		$def_id = 0;
		$object = new Product($id, false, $this->context->language->id);
		$id_image = Db::getInstance()->getValue('SELECT `id_image` FROM `'._DB_PREFIX_.'image` WHERE `cover` = 1 AND `id_product` = '.$object->id);
		$sale = Db::getInstance()->getValue('SELECT `quantity` FROM `'._DB_PREFIX_.'product_sale` WHERE `id_product` = '.$object->id);
		$combinations = $object->getAttributeCombinations($this->context->language->id);
		$comb_array = array();
		$currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
		if (is_array($combinations) && count($combinations) > 0)
		{
			foreach ($combinations as $combination)
			{
				$comb_array[$combination['id_product_attribute']]['id_product'] = $combination['id_product'];
				$comb_array[$combination['id_product_attribute']]['id_product_attribute'] = $combination['id_product_attribute'];
				$comb_array[$combination['id_product_attribute']]['attributes'][]
					= array($combination['group_name'], $combination['attribute_name'], $combination['id_attribute']);
				$comb_array[$combination['id_product_attribute']]['price_incl']
					= Product::getPriceStatic($object->id, true, $combination['id_product_attribute'], 6, null, false, false);
				$comb_array[$combination['id_product_attribute']]['price_excl']
					= Product::getPriceStatic($object->id, false, $combination['id_product_attribute'], 6, null, false, false);
				$comb_array[$combination['id_product_attribute']]['unit_impact'] = $combination['price'];
				$comb_array[$combination['id_product_attribute']]['reference'] = $combination['reference'];
				$comb_array[$combination['id_product_attribute']]['ean13'] = $combination['ean13'];
				$comb_array[$combination['id_product_attribute']]['default_on'] = $combination['default_on'];
				$comb_array[$combination['id_product_attribute']]['quantity'] = $combination['quantity'];
				if ($def_id < 1)
					$def_id = Product::getDefaultAttribute($object->id);
			}

			foreach ($comb_array as $id_product_attribute => $product_attribute)
			{
				$list = '';
				asort($product_attribute['attributes']);
				foreach ($product_attribute['attributes'] as $attribute)
					$list .= $attribute[0].' - '.$attribute[1].', ';

				$list = rtrim($list, ', ');
				$comb_array[$id_product_attribute]['attributes'] = $list;
				$comb_array[$id_product_attribute]['name'] = $list;
			}
		}

		$product = array(
			'href' => BundleMain::getAdminLink('AdminProducts').'&updateproduct&id_product='.$id,
			'id_product' => $id,
			'qty_item' => 1,
			'amount' => 0,
			'disc_type' => 'percent',
			'combinations' => $comb_array,
			'selected_array' => array($def_id),
			'price_incl' => Product::getPriceStatic($object->id, true, null, 6, null, false, false),
			'price_excl' => Product::getPriceStatic($object->id, false, null, 6, null, false, false),
			'name' => $object->name,
			'reference' => $object->reference,
			'quantity' => ($def_id ? $comb_array[$def_id]['quantity'] : $object->quantity),
			'sale' => ($sale ? $sale : 0),
			'def_id' => $def_id ? $def_id : 0,
			'comb_default' => ($def_id ? $comb_array[$def_id]['name'] : '---'),
			'image' => $this->context->link->getImageLink($object->link_rewrite, (int)$object->id.'-'.(int)$id_image, ImageType::getFormatedName('small'))
		);

		$this->context->smarty->assign(array(
			'product' => $product,
			'bundle_currency' => $currency
		));

		$html = $this->display(__FILE__, 'views/templates/admin/getlist.tpl');

		die(Tools::jsonEncode(array('html' => $html)));
	}

	public function getContent()
	{
		$this->actionRequest();
		$this->saveDataPost();
		$form = $this->renderForm();

		return $form;
	}

	public function saveDataPost()
	{
		if (Tools::isSubmit('submitBundleForm'))
		{
			foreach ($this->set_color as $sc)
			{
				$value = Tools::getValue($sc);
				Configuration::updateValue($sc, $value);
			}
		}
	}

	public function renderForm()
	{
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Main settings advanced bundle'),
					'icon' => 'icon-cogs'
				),
				// 'description' => $this->l('To add products to your homepage, simply add them to the corresponding product category (default: "Home").'),
				'input' => array(
					array(
						'type' => 'color',
						'label' => $this->l('Main color'),
						'name' => 'BUNDLE_COLOR_MAIN',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Color elements (radio, checkbox, select)'),
						'name' => 'BUNDLE_COLOR_ELEMENT',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Main color button "add to cart"'),
						'name' => 'BUNDLE_COLOR_BUTTON',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Border button "add to cart"'),
						'name' => 'BUNDLE_COLOR_BUTTON_BORDER',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Main hover color button "add to cart"'),
						'name' => 'BUNDLE_COLOR_BUTTONH',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Border color button "add to cart"'),
						'name' => 'BUNDLE_COLOR_BUTTON_BORDERH',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Main color button "view pack page"'),
						'name' => 'BUNDLE_COLOR_VBUTTON',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Main border color button "view pack page"'),
						'name' => 'BUNDLE_COLOR_VBUTTON_BORDER',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Main hover color button "view pack page"'),
						'name' => 'BUNDLE_COLOR_VBUTTONH',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'color',
						'label' => $this->l('Main hover border color button "view pack page"'),
						'name' => 'BUNDLE_COLOR_VBUTTON_BORDERH',
						'desc' => $this->l(''),
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Enable block "Product in pack"'),
						'name' => 'BUNDLE_BLOCK',
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Enable tab style "Product in pack"'),
						'name' => 'BUNDLE_TAB',
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
				),
				'submit' => array(
					'name' => 'submitBundleForm',
					'title' => $this->l('Save'),
					'class' => 'button'
				)
			),
		);

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->identifier = $this->identifier;
		// $helper->submit_action = 'submitBundleForm';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name
								.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}

	public function getConfigFieldsValues()
	{
		$data_array = array();
		foreach ($this->set_color as $sc)
			$data_array[$sc] = Tools::getValue($sc, Configuration::get($sc));

		return $data_array;
	}

	public function actionRequest()
	{
		$action = Tools::getValue('action');
		if ($action)
		{
			switch ($action)
			{
				case 'list_product':
					$this->listProduct();
					break;
				case 'getLine':
					$this->getLine();
					break;
				case 'getPrices':
					$pack_data = array();
					$ids_product = Tools::getValue('bundle_productList');
					if (count($ids_product))
					{
						$pack_data['id_discount_type'] = Tools::getValue('id_discount_type');
						$pack_data['all_percent_discount'] = Tools::getValue('all_percent_discount');
						$pack_data['all_price_amount'] = Tools::getValue('all_price_amount');
						$pack_data['allow_remove_item'] = Tools::getValue('allow_remove_item');
						$pack_data['products'] = BundleMain::getPostData($ids_product, false);
					}

					$prices = BundleMain::getBundlePrices($pack_data);
					foreach ($prices as $k => &$price)
						if ($k != 'percent_disc')
							$price = Tools::displayPrice($price);

					die(Tools::jsonEncode($prices));
			}
		}
	}

	public function checkQty($products, $qty)
	{
		$max_qty = 0;
		$def_add = true;
		foreach ($products as $k => $product)
		{
			if (isset($product['id_attribute_default']) && $product['id_attribute_default'] > 0)
				$tmp_qty = StockAvailable::getQuantityAvailableByProduct($product['id_product'], $product['id_attribute_default']);
			else
				$tmp_qty = StockAvailable::getQuantityAvailableByProduct($product['id_product']);

			if ($tmp_qty == 0)
				$def_add = false;

			if ($def_add)
			{
				$tmp_qty = floor($tmp_qty / $product['qty_item']);

				if ($k == 0)
					$max_qty = $tmp_qty;

				if ($tmp_qty < $max_qty)
					$max_qty = $tmp_qty;
			}
		}

		if (!$def_add)
			$max_qty = 0;

		return ($qty <= $max_qty);
	}

	public function addToCart()
	{
		$include_ids = Tools::getValue('incl_ids');
		$id_pack = (int)Tools::getValue('id_pack');
		$db_data = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_pack` = '.$id_pack);
		$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
			WHERE `id_pack` = '.$id_pack.' ORDER BY `position`');

		$list = Tools::getValue('item_ids');
		$ipa = Tools::getValue('ipa');
		if (count($list) > 1)
		{
			foreach ($pack_products as $k => &$product)
			{
				if (in_array($product['id_product'], $include_ids))
					$product['id_attribute_default'] = $ipa[$product['id_product']] ? $ipa[$product['id_product']] : 0;
				else
					unset($pack_products[$k]);
			}
		}

		$pack_products = array_values($pack_products);
		$p_data = BundleMain::getFrontProductPack($db_data, $pack_products, false);

		$object = new Product((int)$db_data['id_product'], false);
		$qty = Tools::getValue('qty_pack', 1);
		$cart = $this->context->cart;
		$errors = array();
		if (!isset($cart->id) || !$cart->id)
		{
			$cart->add();
			if ($cart->id)
			{
				$this->context->cookie->id_cart = (int)$cart->id;
				$this->context->cookie->write();
			}
		}

		$values_db = array();
		if ($this->checkQty($pack_products, $qty))
		{
			$attributes_string = '';
			foreach ($p_data['products'] as $dtp)
			{
				if (!empty($dtp['combinations']) && count($dtp['combinations']))
				{
					foreach ($dtp['combinations'] as $dtpc)
					{
						if (in_array($dtp['id_product'], $include_ids) && $dtpc['default_on'])
							$attributes_string .= (int)$dtp['id_product'].':'.(int)$dtpc['id_product_attribute'].'_';
					}
				}
				else
				{
					if (in_array($dtp['id_product'], $include_ids))
						$attributes_string .= (int)$dtp['id_product'].':0_';
				}
			}

			$attributes_string = trim($attributes_string, '_');
			$hash = md5($attributes_string.'_'.$object->id);
			$values_db = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
													WHERE `hash` = "'.$hash.'"');

			if (!$values_db)
			{
				$data_params = array(
					'id_product' => $object->id,
					'attributes_string' => $attributes_string,
					'hash' => $hash,
					'p_data' => $p_data
				);

				$values_db = $this->addCombSpecial($data_params);
			}

			$update_quantity = $this->context->cart->updateQty($qty, $values_db['id_product'], $values_db['id_product_attribute'], false, 'up');
			if (!$update_quantity)
				$errors[] = $this->l('there is not enough product in stock');
		}
		else
			$errors[] = $this->l('there is not enough product in stock');

		$ajax_cart = false;
		$array = array();
		if (Module::isInstalled('blockcart') && Module::isEnabled('blockcart'))
		{
			$cart_module = Module::getInstanceByName('blockcart');
			$array = (array)Tools::jsonDecode($cart_module->hookAjaxCall(array('cookie' => $this->context->cookie, 'cart' => $this->context->cart)));
			$ajax_cart = true;
		}

		$out_array = array(
			'idProductAttribute' => isset($values_db['id_product_attribute']) ? (int)$values_db['id_product_attribute'] : 0,
			'idProduct' => (int)$object->id,
			'errors' => $errors,
			'hasError' => !empty($errors),
			'hash' => isset($values_db['hash']) ? $values_db['hash'] : 0,
			'ajax_cart' => $ajax_cart
		);

		$out = array_merge($array, $out_array);

		return $out;
	}

	public function addCombSpecial($params, $default = false)
	{
		$weight = 0;
		$max_qty = 0;
		$def_add = true;
		$currency_def = new Currency((int)Configuration::get('PS_CURRENCY_DEFAULT'));
		foreach ($params['p_data']['products'] as $k => $product)
		{
			$comb_weight = 0;
			if ($product['def'])
			{
				$combination = new Combination($product['def']);
				$comb_weight = $combination->weight;
				$tmp_qty = StockAvailable::getQuantityAvailableByProduct($product['id_product'], $product['def']);
			}
			else
				$tmp_qty = StockAvailable::getQuantityAvailableByProduct($product['id_product']);

			if ($tmp_qty <= 0)
				$def_add = false;

			if ($def_add)
			{
				$tmp_qty = floor($tmp_qty / $product['qty_item']);

				if ($k == 0)
					$max_qty = $tmp_qty;

				if ($tmp_qty < $max_qty)
					$max_qty = $tmp_qty;
			}

			$pobj = new Product((int)$product['id_product'], false);
			$weight += $pobj->weight + $comb_weight;
		}

		if (!$def_add)
			$max_qty = 0;

		$object = new Product((int)$params['id_product'], false);
		$ag_module = (int)Configuration::get('ADVBUNDLE_GROUP');
		$obj = new Attribute();
		$obj->id_attribute_group = $ag_module;
		foreach ($this->context->language->getLanguages() as $lng)
			$obj->name[$lng['id_lang']] = str_replace('\n', '', str_replace('\r', '', $params['hash']));
		$obj->position = Attribute::getHigherPosition($ag_module) + 1;

		if ($obj->add())
		{
			$id_product_attribute = $object->addCombinationEntity(
				0,
				(float)Tools::convertPriceFull($params['p_data']['prices']['final_incl'], $this->context->currency, $currency_def),
				$weight,
				0,
				0,
				100,
				'',
				'',
				0,
				'',
				$default
			);

			Db::getInstance()->execute('
					INSERT IGNORE INTO '._DB_PREFIX_.'product_attribute_combination (id_attribute, id_product_attribute)
					VALUES ('.(int)$obj->id.','.(int)$id_product_attribute.')');

			StockAvailable::setQuantity((int)$params['id_product'], $id_product_attribute, $def_add ? $max_qty : 0, $this->context->shop->id);
			StockAvailable::setQuantity((int)$params['id_product'], 0, 100, $this->context->shop->id);

			$specific_price = new SpecificPrice();
			$specific_price->id_shop = $this->context->shop->id;
			$specific_price->id_product_attribute = (int)$id_product_attribute;
			$specific_price->id_currency = 0;
			$specific_price->id_country = 0;
			$specific_price->id_group = 0;
			$specific_price->id_customer = 0;
			$specific_price->price = (float)Tools::convertPriceFull($params['p_data']['prices']['original_excl'], $this->context->currency, $currency_def);
			$specific_price->id_product = (int)$params['id_product'];
			$specific_price->from_quantity = 1;
			if ($params['p_data']['id_discount_type'] == 0 || $params['p_data']['id_discount_type'] == 1)
			{
				$specific_price->reduction = $params['p_data']['prices']['percent_disc'] / 100;
				$specific_price->reduction_type = 'percentage';
			}
			elseif ($params['p_data']['id_discount_type'] == 2 || $params['p_data']['id_discount_type'] == 3)
			{
				$specific_price->reduction = (float)Tools::convertPriceFull($params['p_data']['prices']['disc_incl'], $this->context->currency, $currency_def);
				$specific_price->reduction_type = 'amount';
			}

			$specific_price->from = '0000-00-00 00:00:00';
			$specific_price->to = '0000-00-00 00:00:00';
			if ($specific_price->add())
			{
				$values_db = array(
					'id_pack' => (int)$params['p_data']['id_pack'],
					'id_product' => (int)$params['id_product'],
					'id_cart' => (int)$this->context->cart->id,
					'id_product_attribute' => (int)$id_product_attribute,
					'id_specific' => (int)$specific_price->id,
					'hash' => $params['hash'],
					'attributes' => $params['attributes_string']
				);

				Db::getInstance()->autoExecute(_DB_PREFIX_.'advanced_bundle_attributes', $values_db, 'INSERT');
			}
		}

		return $values_db;
	}

	public function getErrorsClass($id)
	{
		$array = array(
			'product_qty' => $this->l('there is not enough product in stock. The order is not possible.').' '
							.$this->l('You can try to disable the product or change combination.'),
			'combination_qty' => $this->l('there is not enough product in stock. The order is not possible.').' '
								.$this->l('You can try to disable the product or change combination.'),
			'combination' => $this->l('This combination not enough in stock or not available!').' '
							.$this->l('The order is not possible. The combination you selected the default for this item.'),
		);

		return isset($array[$id]) ? $array[$id] : $id;
	}

	public function errorsPack($pack_data)
	{
		$errors = array();
		$list = Tools::getValue('bundle_productList');
		if (isset($pack_data['prices']['final_excl']) && $pack_data['prices']['final_excl'] <= 0)
			$errors[] = $this->l('Price for yours Bundle < 0, please edit prices');
		if (count($list) < 2)
			$errors[] = $this->l('Please add min. 2 product to this bundle.');

		return $errors;
	}

	public function processPack($params)
	{
		if ($params->id)
		{
			$list = Tools::getValue('bundle_productList');
			$attributes_string = '';
			$array = BundleMain::getBundleValue($list);
			$data = $array['data'];
			$main_data = $array['main_data'];
			if (count($data) && count($list))
			{
				$id_pack = BundleMain::isBundle((int)$params->id);
				Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'advanced_bundle_product` WHERE `id_pack` = '.(int)$id_pack);
				$max_pos = Db::getInstance()->getValue('SELECT MAX(`position`) FROM `'._DB_PREFIX_.'advanced_bundle_product`');

				if ($main_data['id_discount_type'] == 2)
					$main_data['allow_remove_item'] = false;

				$values_to_insert_pack = array(
					'allow_remove_item' => ($main_data['allow_remove_item'] ? true : false),
					'id_discount_type' => (int)$main_data['id_discount_type'],
					'all_price_amount' => $main_data['all_price_amount'],
					'all_percent_discount' => $main_data['all_percent_discount'],
					'id_product' => (int)$params->id,
				);

				if ($id_pack > 0)
					Db::getInstance()->autoExecute(_DB_PREFIX_.'advanced_bundle', $values_to_insert_pack, 'UPDATE', 'id_pack = '.$id_pack);
				else
					Db::getInstance()->autoExecute(_DB_PREFIX_.'advanced_bundle', $values_to_insert_pack, 'INSERT');

				if ($id_pack < 1)
					$id_pack = Db::getInstance()->Insert_ID();

				foreach ($data as $k => $product)
				{
					$values_to_insert_product = array(
						'id_pack' => (int)$id_pack,
						'custom_combination' => $product['custom_combination'],
						'disc_type' => $product['disc_type'],
						'amount' => $product['reduction_amount'],
						'include_comb' => serialize($data[$k]['include_comb']),
						'qty_item' => (int)$product['quantity'],
						'position' => (int)$max_pos,
						'id_product' => (int)$product['id_product'],
						'id_attribute_default' => $product['def_comb']
					);

					Db::getInstance()->autoExecute(_DB_PREFIX_.'advanced_bundle_product', $values_to_insert_product, 'INSERT');
					$max_pos = $max_pos + 1;
					$attributes_string .= (int)$product['id_product'].':'.(int)$product['def_comb'].'_';
				}

				$db_data = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_pack` = '.$id_pack);
				$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
					WHERE `id_pack` = '.$id_pack.' ORDER BY `position`');

				$p_data = BundleMain::getFrontProductPack($db_data, $pack_products, true);

				$attributes_string = trim($attributes_string, '_');
				$hash = md5($attributes_string.'_'.$params->id);
				$data_params = array(
					'id_product' => $params->id,
					'attributes_string' => trim($attributes_string, '_'),
					'hash' => $hash,
					'p_data' => $p_data
				);

				Db::getInstance()->delete('advanced_bundle_attributes', 'id_product = '.$params->id);
				$combinations_db = Db::getInstance()->ExecuteS('SELECT id_product_attribute FROM `'._DB_PREFIX_.'product_attribute`
																WHERE `id_product` = '.$params->id.'');

				foreach ($combinations_db as $comb_db)
				{
					$combination = new Combination($comb_db['id_product_attribute']);
					$attribute_array = $combination->getWsProductOptionValues();
					foreach ($attribute_array as $attr)
					{
						$attr_object = new Attribute((int)$attr['id']);
						$attr_object->delete();
					}

					$combination->delete();
				}

				$this->addCombSpecial($data_params, true);
			}
		}
	}

	public function hookActionValidateOrder($params)
	{
		$id_cart = $params['cart']->id;
		if ($id_cart)
		{
			ProductSale::fillProductSales();
			$data_db = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
													WHERE `id_cart` = '.$id_cart);
			if (!$data_db || empty($data_db))
				return;

			foreach ($data_db as $check)
			{
				Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'advanced_bundle_attributes` WHERE id_cart = '.$id_cart);

				$comb = new Combination($check['id_product_attribute']);
				if (!$comb->default_on)
				{
					$attribute_array = $comb->getWsProductOptionValues();
					foreach ($attribute_array as $attr)
					{
						$attr_object = new Attribute((int)$attr['id']);
						$attr_object->delete();
					}

					$comb->delete();
				}

				StockAvailable::setQuantity((int)$check['id_product'], 0, 100, $this->context->shop->id);
			}
		}
	}

	public function hookactionCartSave()
	{
		$id_cart = Context::getContext()->cookie->id_cart;
		$cart = new Cart((int)$id_cart);
		if ($id_cart > 0 && $cart->id > 0)
		{
			$products = $cart->getProducts();
			$data_db = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
													WHERE `id_cart` = '.$cart->id);
			if (!$data_db || empty($data_db))
				return;

			$data_product = array();
			$products_cart = array();

			if (empty($products))
			{
				foreach ($data_db as $check)
				{
					Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
												WHERE id_product = '.$check['id_product'].'
												AND id_product_attribute = '.$check['id_product_attribute'].'
												AND id_cart = '.$cart->id);

					$comb = new Combination($check['id_product_attribute']);
					if (!$comb->default_on)
					{
						$attribute_array = $comb->getWsProductOptionValues();
						foreach ($attribute_array as $attr)
						{
							$attr_object = new Attribute((int)$attr['id']);
							$attr_object->delete();
						}

						$comb->delete();
					}

					StockAvailable::setQuantity((int)$check['id_product'], 0, 100, $this->context->shop->id);
				}
			}
			else
			{
				foreach ($products as $product)
				{
					$data_product[$product['id_product_attribute']] = $product['id_product'];
					$products_cart[$product['id_product']] = $product;
				}

				foreach ($data_db as $check)
				{
					if (!isset($data_product[$check['id_product_attribute']])
					|| (isset($data_product[$check['id_product_attribute']]) && $data_product[$check['id_product_attribute']] != $check['id_product']))
					{
						Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
													WHERE id_product = '.$check['id_product'].'
													AND id_product_attribute = '.$check['id_product_attribute'].'
													AND id_cart = '.$cart->id);

						$comb = new Combination($check['id_product_attribute']);
						if (!$comb->default_on)
						{
							$attribute_array = $comb->getWsProductOptionValues();
							foreach ($attribute_array as $attr)
							{
								$attr_object = new Attribute((int)$attr['id']);
								$attr_object->delete();
							}

							$comb->delete();
						}

						StockAvailable::setQuantity((int)$check['id_product'], 0, 100, $this->context->shop->id);
					}
				}
			}
		}
	}

	public function getPackData()
	{
		$id_pack = (int)Tools::getValue('id_pack');
		$db_data = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_pack` = '.$id_pack);
		$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
				WHERE `id_pack` = '.$id_pack.' ORDER BY `position`');

		$list = Tools::getValue('item_ids');
		$ipa = Tools::getValue('ipa');
		if (count($list) && $list > 1)
		{
			foreach ($pack_products as $k => &$product)
			{
				if (in_array($product['id_product'], $list))
					$product['id_attribute_default'] = $ipa[$product['id_product']] ? $ipa[$product['id_product']] : 0;
				else
					unset($pack_products[$k]);
			}
		}

		$p_data = BundleMain::getFrontProductPack($db_data, $pack_products, false);
		$smarty_array = BundleMain::smartySet($p_data, new Product($db_data['id_product'], false, $this->context->language->id), $this->context);
		$this->context->smarty->assign($smarty_array);

		$html = $this->context->smarty->fetch(_PS_MODULE_DIR_.'advbundle/views/templates/front/pack.tpl');

		return array('html' => $html);
	}

	public function hookHeader()
	{
		$this->context->controller->addJS($this->_path.'views/js/main.js');
		$this->context->controller->addCSS($this->_path.'views/css/font-awesome.css');
	}
}