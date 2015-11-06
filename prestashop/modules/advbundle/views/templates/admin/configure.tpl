{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<script type="text/javascript">
	var bundle_delete_product_text = '{l s='Delete this product?' mod='advbundle'}';
	var bundle_min_text = '{l s='Please add min. 2 product.' mod='advbundle'}';
	var bundle_addlist_text = '{l s='Item successfully added to the package!' mod='advbundle'}';
	var bundle_dellist_text = '{l s='Item successfully deleted from the package!' mod='advbundle'}';
	var bundle_updprice_text = '{l s='Prices updated successfully!' mod='advbundle'}';
	var bundle__text = '{l s='' mod='advbundle'}';
	var bundle_ajax_link = '{$bundle_ajax_link|escape:'quotes':'UTF-8'}';
</script>
<div class="panel {if !$pack_data['new_version']}adv_bundle_admin{/if} clearfix">
	<div class="clearfix">
		<h3><i class="icon icon-credit-card"></i> {l s='Bundle complect settings' mod='advbundle'}</h3>
		<input type="hidden" name="bundle_id_pack" value="{$id_pack|intval}">
		<div class="form-group bundle_mode">
			<label class="control-label col-lg-3">{l s='Discount type' mod='advbundle'}</label>
			<div class="col-lg-6">
				<select name="id_discount_type" class="id_discount_type">
					<option {if $pack_data['id_discount_type'] == 0} selected="selected" {/if} value="0">{l s='Do not apply discount for this Bundle product' mod='advbundle'}</option>
					<option {if $pack_data['id_discount_type'] == 1} selected="selected" {/if} value="1">{l s='Apply percent discount for all products in pack' mod='advbundle'}</option>
					<option {if $pack_data['id_discount_type'] == 2} selected="selected" {/if} value="2">{l s='Apply amount discount for all products in pack' mod='advbundle'}</option>
					<option {if $pack_data['id_discount_type'] == 3} selected="selected" {/if} value="3">{l s='Apply percent or amount discount for different products in pack' mod='advbundle'}</option>
				</select>
			</div>
		</div>
		<div id="all_percent" class="hiden form-group">
			<label class="control-label col-lg-3" for="all_percent_discount">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='Enter a fixed percentage discount for all the products of your pack' mod='advbundle'}">
					{l s='Percent amount for all products' mod='advbundle'}
				</span>
			</label>
			<div class="col-lg-3">
				<div class="input-group">
					<input min="0" max="100" type="text" onchange="this.value = this.value.replace(/,/g, '.');" value="{$pack_data['all_percent_discount']|escape:'html':'UTF-8'}" id="all_percent_discount" name="all_percent_discount" class="all_percent_discount" maxlength="6">
					<span class="input-group-addon"> %</span>
				</div>
			</div>
		</div>
		<div id="all_price" class="hiden form-group">
			<label class="control-label col-lg-3" for="all_price_amount">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='Enter a fixed amount for your bundle' mod='advbundle'}">
					{l s='Price amount for all products' mod='advbundle'}
				</span>
			</label>
			<div class="col-lg-3">
				<div class="input-group">
					<span class="input-group-addon">{$bundle_currency->sign|escape:'html':'UTF-8'}</span>
					<input min="0" type="text" onchange="this.value = this.value.replace(/,/g, '.');" value="{$pack_data['all_price_amount']|escape:'html':'UTF-8'}" id="all_price_amount" name="all_price_amount" maxlength="14">
				</div>
			</div>
		</div>
		<div id="allow_remove" class="hiden form-group">
			<label class="control-label col-lg-3" for="allow_remove_item">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='Check this box if you want your customers to be able to remove a product from the pack. This option can only be enabled if you have more than 2 products into your pack and if discount type not amount on each product.' mod='advbundle'}">
					{l s='Allow item remove from bundle' mod='advbundle'}
				</span>
			</label>
			<div class="col-lg-3">
				<div class="input-group">
					<input type="checkbox" value="1" {if $pack_data['allow_remove_item']} checked="checked" {/if} id="allow_remove_item" name="allow_remove_item" disabled="disabled">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3" for="bundle_ajax_product">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='Select here the products that you want to add to your bundle' mod='advbundle'}">
					{l s='Add a new prodict to this bundle' mod='advbundle'}
				</span>
			</label>
			<div class="col-lg-5">
				<div id="ajax_choose_product">
					<div class="input-group">
						<input type="text" id="bundle_ajax_product" name="bundle_ajax_product" autocomplete="off" class="ac_input">
						<span class="input-group-addon"><i class="icon-search"></i></span>
					</div>
				</div>
			</div>
		</div>
		<hr/>
		<div class="form-group">
			<h4>{l s='Bundle products' mod='advbundle'}</h4>
			<table id="" class=" bundle_table table_product_bundle table">
				<thead>
					<tr class="nodrag nodrop">
						<th class="center">{l s='Image' mod='advbundle'}</th>
						<th class="left">{l s='Name' mod='advbundle'}</th>
						<th class="center">{l s='Default combination' mod='advbundle'}</th>
						<th class="center"><span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='If you want to only use specific combinations, check this box' mod='advbundle'}">{l s='Custom' mod='advbundle'}</span></th>
						<th class="center">{l s='Quantity' mod='advbundle'}</th>
						<th class="center">{l s='Price' mod='advbundle'}</th>
						<th class="left bundle_amount_disc">{l s='Discount' mod='advbundle'}</th>
						<th class="center">{l s='Remove' mod='advbundle'}</th>
					</tr>
				</thead>
				<tbody>
					{foreach $pack_data['products'] as $product}
						{include file="./getlist.tpl" product=$product}
					{/foreach}
				</tbody>
				<tfoot>
					<tr>
						<td colspan="9" class="left"><em>{l s='* All prices are without taxes' mod='advbundle'}</em></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="form-group bundle_prices">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				{include file="./prices.tpl" prices=$pack_data['prices']}
			</div>
		</div>
	</div>
	<!-- <div id="product-tab-content-wait" >
		<div id="loading"><i class="icon-refresh icon-spin"></i>&nbsp;{l s='Loading...' mod='advbundle'}</div>
	</div> -->
	{*{if $pack_data['new_version']}*}
		<div class="panel-footer">
			<a href="" class="btn btn-default"><i class="process-icon-cancel"></i>{l s='Cancel' mod='advbundle'}</a>
			<button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i>{l s='Save' mod='advbundle'}</button>
			<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i>{l s='Save and Stay' mod='advbundle'}</button>
		</div>
	
	<input type="hidden" name="bundle_new" value="{$bundle_new|intval}"/>
	<input type="hidden" name="bundle_update" value="{$bundle_update|intval}"/>
	<input type="hidden" name="bundle_exclids" value="{$bundle_exclids|escape:'htmlall':'UTF-8'}"/>
</div>