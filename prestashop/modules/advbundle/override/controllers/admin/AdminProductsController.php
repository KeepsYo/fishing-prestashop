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

class AdminProductsController extends AdminProductsControllerCore
{
	public $object;
	public function initPageHeaderToolbar()
	{
		parent::initPageHeaderToolbar();
		$id_product = Tools::getValue('id_product');
		if (($this->display == 'edit' || $this->display == 'add') && (Tools::isSubmit('newbundle')
			|| Tools::getValue('bundle_new') || BundleMain::isBundle($id_product)))
		{
			unset($this->page_header_toolbar_btn['modules-list']);
			unset($this->page_header_toolbar_btn['duplicate']);
			unset($this->page_header_toolbar_btn['stats']);
			unset($this->page_header_toolbar_btn['delete']);
		}
	}

	public function setMedia()
	{
		parent::setMedia();
		$id_product = Tools::getValue('id_product');
		$id_pack = 0;
		if ($id_product)
			$id_pack = BundleMain::isBundle($id_product);

		if (($this->display == 'edit' || $this->display == 'add') && (Tools::isSubmit('newbundle') || Tools::getValue('bundle_new') || $id_pack > 0))
		{
			$this->addCss(__PS_BASE_URI__.'modules/advbundle/views/css/back.css');
			$this->addJs(__PS_BASE_URI__.'modules/advbundle/views/js/back.js');
			$this->addJs(__PS_BASE_URI__.'modules/advbundle/views/js/main.js');
		}
	}

	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		$exclude_ids = array();
		$all_pack = Db::getInstance()->ExecuteS('SELECT `id_product` FROM `'._DB_PREFIX_.'advanced_bundle`');
		foreach ($all_pack as $ap)
			$exclude_ids[] = $ap['id_product'];

		if (count($exclude_ids))
			$this->_where .= 'AND a.`id_product` NOT IN ('.implode(',', $exclude_ids).')';

		parent::getList($id_lang, $order_by, $order_way, $start, $limit, $id_lang_shop);
	}

	public function renderForm()
	{
		if (isset($this->tpl_form_vars['product_tabs']['ModuleAdvbundle']))
			if (Tools::isSubmit('newbundle') || Tools::getValue('bundle_new') || BundleMain::isBundle((int)Tools::getValue('id_product')))
				$this->tpl_form_vars['product_tabs']['ModuleAdvbundle']['href'] = $this->tpl_form_vars['product_tabs']['ModuleAdvbundle']['href'].'&newbundle';
			else
				unset($this->tpl_form_vars['product_tabs']['ModuleAdvbundle']);

		return parent::renderForm();
	}

	public function processDelete()
	{
		$object = $this->loadObject();
		$pack = Db::getInstance()->ExecuteS('SELECT `id_product` FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_product` = '.$object->id);
		if ($pack)
		{
			$this->errors[] = Tools::displayError('Not deleted! This product is Pack!');
			return $object;
		}
		else
			return parent::processDelete();
	}

	public function processAdd()
	{
		$object = parent::processAdd();
		return $this->saveBundle($object);
	}

	public function processUpdate()
	{
		$object = parent::processUpdate();
		return $this->saveBundle($object);
	}

	public function saveBundle($object)
	{
		if ((isset($this->object->id) && BundleMain::isBundle($this->object->id)) || Tools::isSubmit('newbundle') || Tools::getValue('bundle_new'))
		{
			$module = Module::getInstanceByName('advbundle');
			if (count($this->errors) && !$object)
			{
				$list = Tools::getValue('bundle_productList');
				$pack_bundle = array();
				if (count($list))
				{
					$pack_bundle['id_discount_type'] = Tools::getValue('id_discount_type');
					$pack_bundle['all_percent_discount'] = Tools::getValue('all_percent_discount');
					$pack_bundle['all_price_amount'] = Tools::getValue('all_price_amount');
					$pack_bundle['allow_remove_item'] = Tools::getValue('allow_remove_item');
					$pack_products = BundleMain::getPostData($list, true);
					$pack_data = BundleMain::getBundleData($pack_bundle, $pack_products);
					BundleMain::addCache($pack_data);
				}
			}
			else
			{
				$id_tmp = Context::getContext()->cookie->id_tmp;
				BundleMain::delCache($id_tmp);
				$module->processPack($object);
				if (Tools::isSubmit('submitAddproduct'))
					$this->redirect_after = $this->context->link->getAdminLink('AdminAdvancedBundleMain', false).(count($this->errors)? '&bundle_update' : '').
												'&token='.Tools::getAdminTokenLite('AdminAdvancedBundleMain');
			}
		}

		return $object;
	}
}