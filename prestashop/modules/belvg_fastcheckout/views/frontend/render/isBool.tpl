{*
* 2007-2012 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 7476 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="belvg_field_wrapper">
<label for="customer_fc_{$belvg_field.admin_name}">{$belvg_field.name} {if ($belvg_field.is_require)}<sup class="belvg_fastcheckout_required">*</sup>{/if}</label>
<select name="customer_fc_{$belvg_field.admin_name}" id="customer_fc_{$belvg_field.admin_name}" >
    <option {if isset($smarty.post['customer_fc_'|cat:$belvg_field.admin_name]) && $smarty.post['customer_fc_'|cat:$belvg_field.admin_name] == 1}selected{/if} value="1">{l s='Yes' mod='belvg_fastcheckout'}</option>
    <option {if isset($smarty.post['customer_fc_'|cat:$belvg_field.admin_name]) && $smarty.post['customer_fc_'|cat:$belvg_field.admin_name] == 0}selected{/if} value="0">{l s='No' mod='belvg_fastcheckout'}</option>
</select>
</div>

