{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<tr id="bundle_product_line_{$product['id_product']|intval}" class="bundle_product_line" data-id_product="{$product['id_product']|intval}" style="cursor:move;">
	<td class="center">
		<img width="60" src="{$product['image']|escape:'html':'UTF-8'}" alt="" class="imgm img-thumbnail">
	</td>
	<td>
		<a href="{$product['href']|escape:'html':'UTF-8'}" target="_blank" title="Edit this product"><strong>{$product['name']|escape:'html':'UTF-8'}</strong></a><br>
		<em>
			{l s='Ref:' mod='advbundle'} {$product['reference']|escape:'html':'UTF-8'}<br>
			{l s='Stock:' mod='advbundle'} {$product['quantity']|intval}<br>
			{l s='Sales:' mod='advbundle'} {$product['sale']|intval}
		</em>
	</td>
	<td class="center comb_name_default">
		{$product['comb_default']|escape:'html':'UTF-8'}
	</td>
	<td class="center">
		{if count($product['combinations'])}
			<input type="checkbox" value="1" id="custom_combination" class="custom_combination" data-idp="{$product['id_product']|intval}" {if isset($product['custom_combination']) && $product['custom_combination']} checked="checked" {/if} name="custom_combination_{$product['id_product']|intval}">
		{else}
			{l s='---' mod='advbundle'}
		{/if}
	</td>
	<td class="center">
		<input type="hidden" name="bundle_productList[]" value="{$product['id_product']|intval}">
		<!-- <input type="hidden" name="originalIdProduct-26" value="32"> -->
		<input type="text" required="required" value="{$product['qty_item']}" size="2" id="bundle_quantity_{$product['id_product']|intval}" name="bundle_quantity_{$product['id_product']|intval}" min="1" class="bundle_quantity">
	</td>
	<td class="product_price_container center">
		<span class="product_current-price">{convertPrice price=$product['price_excl']}</span>
	</td>
	<td class="bundle_amount_disc">
		<input min="0" class="bundle_reduction_amount" type="text" required="required" onchange="this.value = this.value.replace(/,/g, '.');" value="{$product['amount']}" size="2" id="bundle_reduction_amount_{$product['id_product']|intval}" name="bundle_reduction_amount_{$product['id_product']|intval}" maxlength="14">
		<select class="bundle_disc_type" name="bundle_disc_type_{$product['id_product']|intval}" id="bundle_disc_type_{$product['id_product']|intval}">
			<option value="percent" {if $product['disc_type'] == 'percent'} selected="selected" {/if}>{l s='%' mod='advbundle'}</option>
			<option value="amount" {if $product['disc_type'] == 'amount'} selected="selected" {/if}>{$bundle_currency->sign}</option>
		</select>
	</td>
	<td class="center">
		<button data-id_product="{$product['id_product']|intval}" id="bundle_remove" class="btn btn-default bundle_remove" type="button"><i class="icon-trash"></i></button>
	</td>
</tr>
{if count($product['combinations'])}
<tr id="combination_container_{$product['id_product']|intval}" class="nodrag nodrop combination_container" data-id_product="{$product['id_product']|intval}" style="display:none">
	<td colspan="10">
		<table id="bundle_combination_table_{$product['id_product']|intval}" class="table configuration">
			<thead>
				<tr class="nodrag nodrop">
					<th class="center"><input type="checkbox" id="include_all" class="include_all" data-id-product-pack="28"></th>
					<th class="center">{l s='Default combination' mod='advbundle'}</th>
					<th class="left">{l s='Combination name' mod='advbundle'}</th>
					<th class="left">{l s='Price impact' mod='advbundle'}</th>
					<th class="left">{l s='Reference' mod='advbundle'}</th>
					<th class="left">{l s='EAN 13' mod='advbundle'}</th>
					<th class="center">{l s='Quantity' mod='advbundle'}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $product['combinations'] as $comb}
				<tr id="advbundle_combination_{$product['id_product']|intval}_{$comb['id_product_attribute']}" class="nodrag nodrop {if $comb['default_on']}default_on{/if}">
					<td class="center">
						<input type="checkbox" {if $comb['id_product_attribute']|in_array:$product['selected_array']} checked="checked" {/if} value="{$comb['id_product_attribute']}" id="advbundle_combination_{$product['id_product']|intval}_{$comb['id_product_attribute']}" {if $product['def_id'] == $comb['id_product_attribute']} checked="checked" {/if} name="include_comb_{$product['id_product']|intval}[]" class="include_comb" data-idp="{$product['id_product']|intval}" data-ipa="{$comb['id_product_attribute']}">
					</td>
					<td class="center">
						<input type="radio" value="{$comb['id_product_attribute']}" id="advbundle_combination_{$product['id_product']|intval}_{$comb['id_product_attribute']}" {if $comb['default_on']}checked="checked" {/if} name="def_combination_{$product['id_product']|intval}" class="def_comb" data-id-product-pack="28" data-ipa="{$comb['id_product_attribute']}">
					</td>
					<td>{$comb['name']|escape:'html':'UTF-8'}</td>
					<td>{convertPrice price=$comb['unit_impact']}</td>
					<td>{$comb['reference']|escape:'html':'UTF-8'}</td>
					<td>{$comb['ean13']|escape:'html':'UTF-8'}</td>
					<td class="center">
						<span class="badge badge-danger">{$comb['quantity']|intval}</span>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</td>
</tr>
{/if}