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

class AdminAdvancedBundleMainController extends ModuleAdminController
{

	public $toolbar_btn;
	public $is_new;

	public function __construct()
	{
		require_once(dirname(__FILE__).'/../../classes/BundleMain.php');
		$this->bootstrap = true;
		$this->context = Context::getContext();
		$this->table = 'advanced_bundle';
		$this->table_id = 'id_pack';
		$this->identifier = 'id_pack';
		$this->position_identifier = 'id_pack';
		$this->position_group_identifier = 'id_pack';
		$this->className = 'BundleMain';
		$this->_defaultOrderBy = 'id_pack';
		$this->list_no_link = true;
		$this->toolbar_scroll = false;
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->bulk_actions = false;

		$this->fields_list = array(
			'id_pack' => array(
				'title' => $this->l('#'),
				'class' => 'fixed-width-xs',
				'type' => 'text',
				'filter' => false,
				'search' => false
			),
			'image_pack' => array(
				'title' => $this->l('Pack image'),
				'class' => 'fixed-width-sm',
				'type' => 'datetime',
				'align' => 'center',
				'filter' => false,
				'search' => false
			),
			'pack_name' => array(
				'title' => $this->l('Pack name'),
				'class' => 'fixed-width-lg',
				'type' => 'text',
				'filter' => false,
				'align' => 'center',
				'search' => false
			),
			'reference' => array(
				'title' => $this->l('reference'),
				'class' => 'fixed-width-md',
				'type' => 'text',
				'align' => 'center',
				'filter' => false,
				'search' => false
			),
			'nb_products' => array(
				'title' => $this->l('Nb product'),
				'type' => 'text',
				'align' => 'center',
				'filter' => false,
				'search' => false
			),
			'original_price' => array(
				'title' => $this->l('Orig. price (tax inxl.)'),
				'class' => 'fixed-width-md',
				'type' => 'text',
				'align' => 'center',
				'filter' => false,
				'search' => false
			),
			'bundle_price' => array(
				'title' => $this->l('Pack price (tax inxl.)'),
				'class' => 'fixed-width-md',
				'type' => 'text',
				'align' => 'center',
				'filter' => false,
				'search' => false
			),
			'category' => array(
				'title' => $this->l('Category'),
				'class' => 'fixed-width-lg',
				'type' => 'text',
				'align' => 'center',
				'filter' => false,
				'search' => false
			),
			'active' => array(
				'title' => $this->l('Status'),
				'active' => 'status',
				'align' => 'text-center',
				'type' => 'bool',
				'class' => 'fixed-width-sm activeajax',
				'orderby' => false,
				'filter' => false,
				'search' => false,
				'ajax' => true
			)
		);

		if (_PS_VERSION_ >= '1.6.0.0')
			$this->is_new = true;
		elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0')
			$this->is_new = false;

		parent::__construct();
	}

	public function postProcess()
	{
		if (Tools::getValue('id_pack') > 0 && Tools::isSubmit('updateadvanced_bundle'))
		{
			$bundle = new BundleMain(Tools::getValue('id_pack'));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminProducts', true).
									'&key_tab=ModuleAdvbundle&updateproduct&id_product='.$bundle->id_product);
		}

		parent::postProcess();
	}

	public function processDelete()
	{
		$object = $this->loadObject();
		$bundle = new BundleMain(Tools::getValue('id_pack'));
		$product = New Product($bundle->id_product);
		if ($product->delete())
			return parent::processDelete();
		else
		{
			$this->errors[] = Tools::displayError('Error delete main Bundle product!');
			return $object;
		}
	}

	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		parent::getList($id_lang, $order_by, $order_way, $start, $limit, $id_lang_shop);
		foreach ($this->_list as &$list)
		{
			$def_id = Product::getDefaultAttribute((int)$list['id_product']);
			$list['original_price'] = Tools::displayPrice(
										Product::getPriceStatic((int)$list['id_product'], true, $def_id, 6, null, false, false),
											$this->context->currency->id);

			$list['bundle_price'] = Tools::displayPrice(
										Product::getPriceStatic((int)$list['id_product'], true, $def_id, 6, null, false, true),
											$this->context->currency->id);

			$product = Db::getInstance()->getRow('SELECT `id_category_default`, `reference`, `active` FROM `'._DB_PREFIX_.'product`
				WHERE `id_product` = '.$list['id_product']);

			$list['category'] = Db::getInstance()->getValue('SELECT `name` FROM `'._DB_PREFIX_.'category_lang`
				WHERE `id_category` = '.(isset($product['id_category_default']) ? $product['id_category_default'] : 2).' AND `id_lang` = '.$id_lang);

			$products = Db::getInstance()->ExecuteS('SELECT `id_product` FROM `'._DB_PREFIX_.'advanced_bundle_product` WHERE `id_pack` = '.$list['id_pack']);
			$list['nb_products'] = count($products);
			$list['reference'] = $product['reference'];
			$list['active'] = $product['active'];
			$product_data = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT DISTINCT p.id_product, pl.link_rewrite, i.id_image
				FROM '._DB_PREFIX_.'product p
				LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product = p.id_product)
				LEFT JOIN '._DB_PREFIX_.'image i ON (i.id_product = p.id_product)
				WHERE pl.id_lang = '.(int)$this->context->language->id.'
					AND p.id_product = '.(int)$list['id_product'].'
					AND i.cover = 1'
			);

			$link = $this->context->link->getImageLink($product_data['link_rewrite'],
				(int)$product_data['id_product'].'-'.(int)$product_data['id_image'], ImageType::getFormatedName('small'));

			$list['image_pack'] = '<img src="'.$link.'" class="imgm img-thumbnail" width="50"/>';
			$list['pack_name'] = Db::getInstance()->getValue('SELECT `name` FROM `'._DB_PREFIX_.'product_lang`
				WHERE `id_product` = '.$list['id_product'].' AND `id_lang` = '.$id_lang);
		}
	}

	public function initContent()
	{
		parent::initContent();
		$this->context->smarty->assign(array(
			'tkn' => Tools::getAdminTokenLite('AdminAdvancedBundleMain'),
			'idm' => $this->context->employee->id,
			'nwps' => $this->is_new,
			'title' => $this->l('Bundle products'),
			'page_header_toolbar_title' => $this->l('Bundle products'),
		));

		$this->context->smarty->assign(array(
			'content' => $this->content,
		));
	}

	public function initToolbar()
	{
		parent::initToolbar();
		$this->toolbar_btn['new']['href'] = $this->context->link->getAdminLink('AdminProducts', true).'&addproduct&newbundle';
	}

	public function setMedia()
	{
		parent::setMedia();
		$this->addJs(__PS_BASE_URI__.'modules/advbundle/js/back.js');
	}
}