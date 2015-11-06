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

class ProductController extends ProductControllerCore
{
	public $id_pack;
	public function setMedia()
	{
		parent::setMedia();
		require_once(_PS_MODULE_DIR_.'/advbundle/classes/BundleMain.php');
		$id_pack = 0;
		if ($this->product->id)
			$id_pack = BundleMain::isBundle($this->product->id);
		if (($id_pack > 0))
		{
			$this->addJs(__PS_BASE_URI__.'modules/advbundle/views/js/front.js');
			$this->addJS(__PS_BASE_URI__.'modules/advbundle/views/js/owl.carousel.js');
			$this->addCSS(__PS_BASE_URI__.'modules/advbundle/views/css/front.css');
			$this->addCSS(__PS_BASE_URI__.'modules/advbundle/views/css/owl.carousel.css');
			$this->addCSS(__PS_BASE_URI__.'modules/advbundle/views/css/owl.theme.css');
		}
	}

	public function initContent()
	{
		$id_pack = 0;
		if ($this->product->id)
		{
			$id_pack = BundleMain::isBundle((int)$this->product->id);
			if ($id_pack)
			{
				FrontController::initContent();
				$this->id_pack = $id_pack;
				require_once(_PS_MODULE_DIR_.'/advbundle/classes/BundleMain.php');
				foreach ($this->js_files as $key => $js)
				{
					if (strpos($js, 'uniform'))
						unset($this->js_files[$key]);
					if (strpos($js, 'product.js'))
						unset($this->js_files[$key]);
					if (strpos($js, 'serialScroll'))
						unset($this->js_files[$key]);
					if (strpos($js, 'scrollTo'))
						unset($this->js_files[$key]);
				}

				$db_data = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle` WHERE `id_product` = '.(int)$this->product->id);
				$pack_products = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_product`
																WHERE `id_pack` = '.(int)$id_pack.' ORDER BY `position`');
				$pack_data = BundleMain::getFrontProductPack($db_data, $pack_products);
				$smarty_array = BundleMain::smartySet($pack_data, $this->product, $this->context);
				$path = Tools::getPath((int)$this->category->id, $this->product->name, true);
				$this->context->smarty->assign($smarty_array);
				$this->context->smarty->assign('path', $path);
				$this->context->smarty->assign('BUNDLE_BLOCK', Configuration::get('BUNDLE_BLOCK'));
				$this->setTemplate(_PS_MODULE_DIR_.'advbundle/views/templates/front/pack.tpl');
			}
			else
				parent::initContent();
		}
		else
			parent::initContent();
	}
}