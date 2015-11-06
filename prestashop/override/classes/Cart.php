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

class Cart extends CartCore
{
	public static function cacheSomeAttributesLists($ipa_list, $id_lang)
	{
		parent::cacheSomeAttributesLists($ipa_list, $id_lang);
		if (count(self::$_attributesLists) && count($ipa_list))
		{
			require_once(_PS_MODULE_DIR_.'/advbundle/classes/BundleMain.php');
			$data_db = array();
			$values_db = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advanced_bundle_attributes`
													WHERE id_product_attribute IN ('.implode(',', $ipa_list).')');
			foreach ($values_db as $val)
				$data_db[$val['id_product_attribute'].'-'.$id_lang] = $val;

			if (count($data_db))
			{
				foreach (self::$_attributesLists as $k => &$list)
				{
					if (isset($data_db[$k]))
					{
						$names = BundleMain::getBundleProductNames($data_db[$k]['id_pack']);
						$data = explode('_', $data_db[$k]['attributes']);
						$text = '<ul style="list-style: square inside;">';
						foreach ($data as $d)
						{
							$d = explode(':', $d);
							$attributes = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
								SELECT al.*, agl.public_name
								FROM '._DB_PREFIX_.'product_attribute_combination pac
								LEFT JOIN '._DB_PREFIX_.'attribute_lang al ON (pac.id_attribute = al.id_attribute AND al.id_lang = '.(int)$id_lang.')
								LEFT JOIN '._DB_PREFIX_.'attribute aa ON (aa.id_attribute = pac.id_attribute)
								LEFT JOIN '._DB_PREFIX_.'attribute_group_lang agl ON (agl.id_attribute_group = aa.id_attribute_group AND agl.id_lang = '.(int)$id_lang.')
								WHERE pac.id_product_attribute ='.(int)$d[1]);
							$text .= '<li style="color:#000;"><b>'.$names[$d[0]]['qty_item'].'x'.$names[$d[0]]['name'].'</b></li>';
							if (count($attributes))
							{
								foreach ($attributes as $a)
									$text .= '<li>&nbsp;'.$a['public_name'].' - '.$a['name'].'</li>';
							}
						}

						$text .= '</ul>';
						$list['attributes_small'] = $text;
						$tmp_array = explode(':', $list['attributes']);
						$list['attributes'] = $tmp_array[0].' : '.$text;
					}
				}
			}
		}
	}
}