<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

class AdvbundleAjaxModuleFrontController extends ModuleFrontController
{
	public $display_column_right = false;
	public $display_column_left = false;

	public function postProcess()
	{
		$action = Tools::getValue('action');
		$return = array();
		switch ($action)
		{
			case 'change_combination':
				$return = $this->module->getPackData();
				break;
			case 'add_to_cart':
				$return = $this->module->addToCart();
				break;
		}

		die(Tools::jsonEncode($return));
	}
}
