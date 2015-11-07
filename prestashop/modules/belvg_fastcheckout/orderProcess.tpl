{*
 * 2007-2013 PrestaShop  
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
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 * @category   Belvg
 * @package    Belvg_FastCheckout
 * @author    Alexander Simonchik <support@belvg.com>
 * @site
 * @copyright  Copyright (c) 2010 - 2013 BelVG LLC. (http://www.belvg.com)
 * @license    http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt 
*}

{capture name=path}{l s='Your shopping cart' mod='belvg_fastcheckout'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}

<h1 class="page-title">{l s='Shopping cart summary' mod='belvg_fastcheckout'}</h1>

{if isset($account_created)}
	<p class="success">
		{l s='Your account has been created.' mod='belvg_fastcheckout'}
	</p>
{/if}
{assign var='current_step' value='summary'}
{include file="$tpl_dir./errors.tpl"}

{if isset($empty)}
	<p class="warning">{l s='Your shopping cart is empty.' mod='belvg_fastcheckout'}</p>
{elseif $PS_CATALOG_MODE}
	<p class="warning">{l s='This store has not accepted your new order.' mod='belvg_fastcheckout'}</p>
{else}
	<script type="text/javascript">
	// <![CDATA[
	var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
	var currencyRate = '{$currencyRate|floatval}';
	var currencyFormat = '{$currencyFormat|intval}';
	var currencyBlank = '{$currencyBlank|intval}';
	var txtProduct = "{l s='product' mod='belvg_fastcheckout'}";
	var txtProducts = "{l s='products' mod='belvg_fastcheckout'}";
	var deliveryAddress = {$cart->id_address_delivery|intval};
	// ]]>
	</script>
	<p style="display:none" id="emptyCartWarning" class="warning">{l s='Your shopping cart is empty.' mod='belvg_fastcheckout'}</p>
{if isset($lastProductAdded) AND $lastProductAdded}
	<div class="cart_last_product">
		<div class="cart_last_product_header">
			<div class="left">{l s='Last product added' mod='belvg_fastcheckout'}</div>
		</div>
		<a  class="cart_last_product_img" href="{$link->getProductLink($lastProductAdded.id_product, $lastProductAdded.link_rewrite, $lastProductAdded.category, null, null, $lastProductAdded.id_shop)|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($lastProductAdded.link_rewrite, $lastProductAdded.id_image, 'small_default')}" alt="{$lastProductAdded.name|escape:'htmlall':'UTF-8'}"/></a>
		<div class="cart_last_product_content">
			<h5><a href="{$link->getProductLink($lastProductAdded.id_product, $lastProductAdded.link_rewrite, $lastProductAdded.category, null, null, null, $lastProductAdded.id_product_attribute)|escape:'htmlall':'UTF-8'}">{$lastProductAdded.name|escape:'htmlall':'UTF-8'}</a></h5>
			{if isset($lastProductAdded.attributes) && $lastProductAdded.attributes}<a href="{$link->getProductLink($lastProductAdded.id_product, $lastProductAdded.link_rewrite, $lastProductAdded.category, null, null, null, $lastProductAdded.id_product_attribute)|escape:'htmlall':'UTF-8'}">{$lastProductAdded.attributes|escape:'htmlall':'UTF-8'}</a>{/if}
		</div>
		<br class="clear" />
	</div>
{/if}

<p class="cart-msg">{l s='Your shopping cart contains:' mod='belvg_fastcheckout'} <span id="summary_products_quantity">{$productNumber} {if $productNumber == 1}{l s='product' mod='belvg_fastcheckout'}{else}{l s='products' mod='belvg_fastcheckout'}{/if}</span></p>
<div id="order-detail-content" class="table_block">





<div id="order-detail-content" class="table_block">
	<table id="cart_summary" class="std">
		<thead>
			<tr>
				<th class="cart_product first_item">{l s='Product' mod='belvg_fastcheckout'}</th>
				<th class="cart_description item">{l s='Description' mod='belvg_fastcheckout'}</th>
				<th class="cart_ref item">{l s='Ref.' mod='belvg_fastcheckout'}</th>
				<th class="cart_unit item">{l s='Unit price' mod='belvg_fastcheckout'}</th>
				<th class="cart_quantity item">{l s='Qty' mod='belvg_fastcheckout'}</th>
				<th class="cart_total item">{l s='Total' mod='belvg_fastcheckout'}</th>
				<th class="cart_delete last_item">&nbsp;</th>
			</tr>
		</thead>
		<tfoot>
		{if $use_taxes}
			{if $priceDisplay}
				<tr class="cart_total_price">
					<td colspan="5">{if $display_tax_label}{l s='Total products (tax excl.):' mod='belvg_fastcheckout'}{else}{l s='Total products:' mod='belvg_fastcheckout'}{/if}</td>
					<td colspan="2" class="price" id="total_product">{displayPrice price=$total_products}</td>
				</tr>
			{else}
				<tr class="cart_total_price">
					<td colspan="5">{if $display_tax_label}{l s='Total products (tax incl.):' mod='belvg_fastcheckout'}{else}{l s='Total products:' mod='belvg_fastcheckout'}{/if}</td>
					<td colspan="2" class="price" id="total_product">{displayPrice price=$total_products_wt}</td>
				</tr>
			{/if}
		{else}
			<tr class="cart_total_price">
				<td colspan="5">{l s='Total products:' mod='belvg_fastcheckout'}</td>
				<td colspan="2" class="price" id="total_product">{displayPrice price=$total_products}</td>
			</tr>
		{/if}
			<tr class="cart_total_voucher" {if $total_discounts == 0}style="display:none"{/if}>
				<td colspan="5">
				{if $use_taxes && $display_tax_label}
					{l s='Total vouchers (tax excl.):' mod='belvg_fastcheckout'}
				{else}
					{l s='Total vouchers:' mod='belvg_fastcheckout'}
				{/if}
				</td>
				<td colspan="2" class="price-discount price" id="total_discount">
				{if $use_taxes && !$priceDisplay}
					{assign var='total_discounts_negative' value=$total_discounts * -1}
				{else}
					{assign var='total_discounts_negative' value=$total_discounts_tax_exc * -1}
				{/if}
				{displayPrice price=$total_discounts_negative}
				</td>
			</tr>
			<tr class="cart_total_voucher" {if $total_wrapping == 0}style="display: none;"{/if}>
				<td colspan="5">
				{if $use_taxes}
					{if $display_tax_label}{l s='Total gift-wrapping (tax incl.):' mod='belvg_fastcheckout'}{else}{l s='Total gift-wrapping:' mod='belvg_fastcheckout'}{/if}
				{else}
					{l s='Total gift-wrapping:' mod='belvg_fastcheckout'}
				{/if}
				</td>
				<td colspan="2" class="price-discount price" id="total_wrapping">
				{if $use_taxes}
					{if $priceDisplay}
						{displayPrice price=$total_wrapping_tax_exc}
					{else}
						{displayPrice price=$total_wrapping}
					{/if}
				{else}
					{displayPrice price=$total_wrapping_tax_exc}
				{/if}
				</td>
			</tr>
			{if $total_shipping_tax_exc <= 0 && !isset($virtualCart)}
				<tr class="cart_total_delivery">
					<td colspan="5">{l s='Shipping:' mod='belvg_fastcheckout'}</td>
					<td colspan="2" class="price" id="total_shipping">{l s='Free Shipping!' mod='belvg_fastcheckout'}</td>
				</tr>
			{else}
				{if $use_taxes}
					{if $priceDisplay}
						<tr class="cart_total_delivery" {if $total_shipping_tax_exc <= 0} style="display:none;"{/if}>
							<td colspan="5">{if $display_tax_label}{l s='Total shipping (tax excl.):' mod='belvg_fastcheckout'}{else}{l s='Total shipping:' mod='belvg_fastcheckout'}{/if}</td>
							<td colspan="2" class="price" id="total_shipping">{displayPrice price=$total_shipping_tax_exc}</td>
						</tr>
					{else}
						<tr class="cart_total_delivery"{if $total_shipping <= 0} style="display:none;"{/if}>
							<td colspan="5">{if $display_tax_label}{l s='Total shipping (tax incl.):' mod='belvg_fastcheckout'}{else}{l s='Total shipping:' mod='belvg_fastcheckout'}{/if}</td>
							<td colspan="2" class="price" id="total_shipping" >{displayPrice price=$total_shipping}</td>
						</tr>
					{/if}
				{else}
					<tr class="cart_total_delivery"{if $total_shipping_tax_exc <= 0} style="display:none;"{/if}>
						<td colspan="5">{l s='Total shipping:' mod='belvg_fastcheckout'}</td>
						<td colspan="2" class="price" id="total_shipping" >{displayPrice price=$total_shipping_tax_exc}</td>
					</tr>
				{/if}
			{/if}
			{if $use_taxes}
			<tr class="cart_total_price">
				<td colspan="5">{l s='Total (tax excl.):' mod='belvg_fastcheckout'}</td>
				<td colspan="2" class="price" id="total_price_without_tax">{displayPrice price=$total_price_without_tax}</td>
			</tr>
			<tr class="cart_total_tax">
				<td colspan="5">{l s='Total tax:' mod='belvg_fastcheckout'}</td>
				<td colspan="2" class="price" id="total_tax">{displayPrice price=$total_tax}</td>
			</tr>
			{/if}
			<tr class="cart_total_price">
				<td colspan="5" id="cart_voucher" class="cart_voucher">
				{if $voucherAllowed}
					{if isset($errors_discount) && $errors_discount}
						<ul class="error">
						{foreach $errors_discount as $k=>$error}
							<li>{$error|escape:'htmlall':'UTF-8'}</li>
						{/foreach}
						</ul>
					{/if}
					<form action="{if $opc}{$link->getPageLink('order-opc', true)}{else}{$link->getPageLink('order', true)}{/if}" method="post" id="voucher">
						<fieldset>
							<p class="title_block"><label for="discount_name">{l s='Vouchers' mod='belvg_fastcheckout'}</label></p>
							<p>
								<input type="text" class="discount_name" id="discount_name" name="discount_name" value="{if isset($discount_name) && $discount_name}{$discount_name}{/if}" />
							</p>
							<p class="submit"><input type="hidden" name="submitDiscount" /><input type="submit" name="submitAddDiscount" value="{l s='OK' mod='belvg_fastcheckout'}" class="button" /></p>
						</fieldset>
					</form>
					{if $displayVouchers}
						<p id="title" class="title_offers">{l s='Take advantage of our offers:' mod='belvg_fastcheckout'}</p>
						<div id="display_cart_vouchers">
						{foreach $displayVouchers as $voucher}
							{if $voucher.code != ''}<span onclick="$('#discount_name').val('{$voucher.code}');return false;" class="voucher_name">{$voucher.code}</span> - {/if}{$voucher.name}<br />
						{/foreach}
						</div>
					{/if}
				{/if}
				</td>
				{if $use_taxes}
				<td colspan="2" class="price total_price_container" id="total_price_container">
					<p>{l s='Total:' mod='belvg_fastcheckout'}</p>
					<span id="total_price">{displayPrice price=$total_price}</span>
				</td>
				{else}
				<td colspan="2" class="price total_price_container" id="total_price_container">
					<p>{l s='Total:' mod='belvg_fastcheckout'}</p>
					<span id="total_price">{displayPrice price=$total_price_without_tax}</span>
				</td>
				{/if}
			</tr>
		</tfoot>
		<tbody>
		{foreach $products as $product}
			{assign var='productId' value=$product.id_product}
			{assign var='productAttributeId' value=$product.id_product_attribute}
			{assign var='quantityDisplayed' value=0}
			{assign var='odd' value=$product@iteration%2}
			{assign var='ignoreProductLast' value=isset($customizedDatas.$productId.$productAttributeId) || count($gift_products)}
			{* Display the product line *}
			{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}
			{* Then the customized datas ones*}
			{if isset($customizedDatas.$productId.$productAttributeId)}
				{foreach $customizedDatas.$productId.$productAttributeId[$product.id_address_delivery] as $id_customization=>$customization}
					<tr id="product_{$product.id_product}_{$product.id_product_attribute}_{$id_customization}_{$product.id_address_delivery|intval}" class="product_customization_for_{$product.id_product}_{$product.id_product_attribute}_{$product.id_address_delivery|intval} {if $odd}odd{else}even{/if} customization alternate_item {if $product@last && $customization@last && !count($gift_products)}last_item{/if}">
						<td></td>
						<td colspan="3">
							{foreach $customization.datas as $type => $custom_data}
								{if $type == $CUSTOMIZE_FILE}
									<div class="customizationUploaded">
										<ul class="customizationUploaded">
											{foreach $custom_data as $picture}
												<li><img src="{$pic_dir}{$picture.value}_small" alt="" class="customizationUploaded" /></li>
											{/foreach}
										</ul>
									</div>
								{elseif $type == $CUSTOMIZE_TEXTFIELD}
									<ul class="typedText">
										{foreach $custom_data as $textField}
											<li>
												{if $textField.name}
													{$textField.name}
												{else}
													{l s='Text #' mod='belvg_fastcheckout'}{$textField@index+1}
												{/if}
												{l s=':' mod='belvg_fastcheckout'} {$textField.value}
											</li>
										{/foreach}
										
									</ul>
								{/if}

							{/foreach}
						</td>
						<td class="cart_quantity" colspan="2">
							{if isset($cannotModify) AND $cannotModify == 1}
								<span style="float:left">{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count}{else}{$product.cart_quantity-$quantityDisplayed}{/if}</span>
							{else}
								<div class="cart_quantity_button">
								<a rel="nofollow" class="cart_quantity_up" id="cart_quantity_up_{$product.id_product}_{$product.id_product_attribute}_{$id_customization}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "add&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery}&amp;id_customization={$id_customization}&amp;token={$token_cart}")}" title="{l s='Add' mod='belvg_fastcheckout'}"><img src="{$img_dir}icon/quantity_up.gif" alt="{l s='Add' mod='belvg_fastcheckout'}" width="14" height="9" /></a><br />
								{if $product.minimal_quantity < ($customization.quantity -$quantityDisplayed) OR $product.minimal_quantity <= 1}
								<a rel="nofollow" class="cart_quantity_down" id="cart_quantity_down_{$product.id_product}_{$product.id_product_attribute}_{$id_customization}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "add&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery}&amp;id_customization={$id_customization}&amp;op=down&amp;token={$token_cart}")}" title="{l s='Subtract' mod='belvg_fastcheckout'}">
									<img src="{$img_dir}icon/quantity_down.gif" alt="{l s='Subtract' mod='belvg_fastcheckout'}" width="14" height="9" />
								</a>
								{else}
								<a class="cart_quantity_down" style="opacity: 0.3;" id="cart_quantity_down_{$product.id_product}_{$product.id_product_attribute}_{$id_customization}" href="#" title="{l s='Subtract' mod='belvg_fastcheckout'}">
									<img src="{$img_dir}icon/quantity_down.gif" alt="{l s='Subtract' mod='belvg_fastcheckout'}" width="14" height="9" />
								</a>
								{/if}
								</div>
								<input type="hidden" value="{$customization.quantity}" name="quantity_{$product.id_product}_{$product.id_product_attribute}_{$id_customization}_{$product.id_address_delivery|intval}_hidden"/>
								<input size="2" type="text" value="{$customization.quantity}" class="cart_quantity_input" name="quantity_{$product.id_product}_{$product.id_product_attribute}_{$id_customization}_{$product.id_address_delivery|intval}"/>
							{/if}
						</td>
						<td class="cart_delete">
							{if isset($cannotModify) AND $cannotModify == 1}
							{else}
								<div>
									<a rel="nofollow" class="cart_quantity_delete" id="{$product.id_product}_{$product.id_product_attribute}_{$id_customization}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "delete&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_customization={$id_customization}&amp;id_address_delivery={$product.id_address_delivery}&amp;token={$token_cart}")}">{l s='Delete' mod='belvg_fastcheckout'}</a>
								</div>
							{/if}
						</td>
					</tr>
					{assign var='quantityDisplayed' value=$quantityDisplayed+$customization.quantity}
				{/foreach}
				{* If it exists also some uncustomized products *}
				{if $product.quantity-$quantityDisplayed > 0}{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}{/if}
			{/if}
		{/foreach}
		{assign var='last_was_odd' value=$product@iteration%2}
		{foreach $gift_products as $product}
			{assign var='productId' value=$product.id_product}
			{assign var='productAttributeId' value=$product.id_product_attribute}
			{assign var='quantityDisplayed' value=0}
			{assign var='odd' value=($product@iteration+$last_was_odd)%2}
			{assign var='ignoreProductLast' value=isset($customizedDatas.$productId.$productAttributeId)}
			{assign var='cannotModify' value=1}
			{* Display the gift product line *}
			{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}
		{/foreach}
		</tbody>
	{if sizeof($discounts)}
		<tbody>
		{foreach $discounts as $discount}
			<tr class="cart_discount {if $discount@last}last_item{elseif $discount@first}first_item{else}item{/if}" id="cart_discount_{$discount.id_discount}">
				<td class="cart_discount_name" colspan="3">{$discount.name}</td>
				<td class="cart_discount_price"><span class="price-discount">
					{if !$priceDisplay}{displayPrice price=$discount.value_real*-1}{else}{displayPrice price=$discount.value_tax_exc*-1}{/if}
				</span></td>
				<td class="cart_discount_delete">1</td>
				<td class="cart_discount_price">
					<span class="price-discount price">{if !$priceDisplay}{displayPrice price=$discount.value_real*-1}{else}{displayPrice price=$discount.value_tax_exc*-1}{/if}</span>
				</td>
				<td class="price_discount_del">
					{if strlen($discount.code)}<a href="{if $opc}{$link->getPageLink('order-opc', true)}{else}{$link->getPageLink('order', true)}{/if}?deleteDiscount={$discount.id_discount}" class="price_discount_delete" title="{l s='Delete' mod='belvg_fastcheckout'}">{l s='Delete' mod='belvg_fastcheckout'}</a>{/if}
				</td>
			</tr>
		{/foreach}
		</tbody>
	{/if}
	</table>
</div>
        
        
        
        
	
        
        
 
        
        
        
	{if sizeof($discounts)}
		<tbody>
		{foreach $discounts as $discount}
			<tr class="cart_discount {if $discount@last}last_item{elseif $discount@first}first_item{else}item{/if}" id="cart_discount_{$discount.id_discount}">
				<td class="cart_discount_name" colspan="3">{$discount.name}</td>
				<td class="cart_discount_price"><span class="price-discount">
					{if !$priceDisplay}{displayPrice price=$discount.value_real*-1}{else}{displayPrice price=$discount.value_tax_exc*-1}{/if}
				</span></td>
				<td class="cart_discount_delete">1</td>
				<td class="cart_discount_price">
					<span class="price-discount price">{if !$priceDisplay}{displayPrice price=$discount.value_real*-1}{else}{displayPrice price=$discount.value_tax_exc*-1}{/if}</span>
				</td>
				<td class="price_discount_del">
					{if strlen($discount.code)}<a href="{if $opc}{$link->getPageLink('order-opc', true)}{else}{$link->getPageLink('order', true)}{/if}?deleteDiscount={$discount.id_discount}" class="price_discount_delete" title="{l s='Delete' mod='belvg_fastcheckout'}">{l s='Delete' mod='belvg_fastcheckout'}</a>{/if}
				</td>
			</tr>
		{/foreach}
		</tbody>
    
	{/if}
	
</div>

{if $fastcheckout_additional_steps && $isLogged}
    {*{if $opc}
    <script type="text/javascript">
    // <![CDATA[
        var orderProcess = '';
        var isLogged = {$isLogged|intval};
        var isGuest = 0;
    //]]>
    </script>
    {/if}*}

    {if $opc}
        {assign var="back_order_page" value="order-opc.php"}
    {else}
        {assign var="back_order_page" value="order.php"}
    {/if}

    <script type="text/javascript">
        // <![CDATA[
        var imgDir = '{$img_dir}';
        var authenticationUrl = '{$link->getPageLink("authentication", true)|addslashes}';
        var orderOpcUrl = '{$link->getPageLink("order-opc", true)|addslashes}';
        var historyUrl = '{$link->getPageLink("history", true)|addslashes}';
        var guestTrackingUrl = '{$link->getPageLink("guest-tracking", true)|addslashes}';
        var addressUrl = '{$link->getPageLink("address", true, NULL, "back={$back_order_page}")|addslashes}';
        var orderProcess = 'order-opc';
        var guestCheckoutEnabled = {$PS_GUEST_CHECKOUT_ENABLED|intval};
        var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
        var currencyRate = '{$currencyRate|floatval}';
        var currencyFormat = '{$currencyFormat|intval}';
        var currencyBlank = '{$currencyBlank|intval}';
        var displayPrice = {$priceDisplay};
        var taxEnabled = {$use_taxes};
        var conditionEnabled = {$conditions|intval};
        var countries = new Array();
        var countriesNeedIDNumber = new Array();
        var countriesNeedZipCode = new Array();
        var vat_management = {$vat_management|intval};

        var txtWithTax = "{l s='(tax incl.)' mod='belvg_fastcheckout'}";
        var txtWithoutTax = "{l s='(tax excl.)' mod='belvg_fastcheckout'}";
        var txtHasBeenSelected = "{l s='has been selected' mod='belvg_fastcheckout'}";
        var txtNoCarrierIsSelected = "{l s='No carrier has been selected' mod='belvg_fastcheckout'}";
        var txtNoCarrierIsNeeded = "{l s='No carrier is needed for this order' mod='belvg_fastcheckout'}";
        var txtConditionsIsNotNeeded = "{l s='You do not need to accept the Terms of Service for this order.' mod='belvg_fastcheckout'}";
        var txtTOSIsAccepted = "{l s='The service terms have been accepted' mod='belvg_fastcheckout'}";
        var txtTOSIsNotAccepted = "{l s='The service terms have not been accepted' mod='belvg_fastcheckout'}";
        var txtThereis = "{l s='There is' mod='belvg_fastcheckout'}";
        var txtErrors = "{l s='Error(s)' mod='belvg_fastcheckout'}";
        var txtDeliveryAddress = "{l s='Delivery address' mod='belvg_fastcheckout'}";
        var txtInvoiceAddress = "{l s='Invoice address' mod='belvg_fastcheckout'}";
        var txtModifyMyAddress = "{l s='Modify my address' mod='belvg_fastcheckout'}";
        var txtInstantCheckout = "{l s='Instant checkout' mod='belvg_fastcheckout'}";
        var txtSelectAnAddressFirst = "{l s='Please start by selecting an address.' mod='belvg_fastcheckout'}";
        var errorCarrier = "{$errorCarrier}";
        var errorTOS = "{$errorTOS}";
        var checkedCarrier = "{if isset($checked)}{$checked}{else}0{/if}";

        var addresses = new Array();
        var isLogged = {$isLogged|intval};
        var isGuest = {$isGuest|intval};
        var isVirtualCart = {$isVirtualCart|intval};
        var isPaymentStep = {$isPaymentStep|intval};
        //]]>
    </script>

    {if $fastcheckout_shipping_step}
        {include file="$tpl_dir./order-address.tpl"}

        <!-- Carrier -->
        {include file="$tpl_dir./order-carrier.tpl"}
        <!-- END Carrier -->
    {/if}

    {if $fastcheckout_payment_step}
        {if !$fastcheckout_shipping_step}
            {if $conditions AND $cms_id}
                <h3 class="condition_title">{l s='Terms of service' mod='belvg_fastcheckout'}</h3>
                <p class="checkbox">
                    <input type="checkbox" name="cgv" id="cgv" value="1" {if $checkedTOS}checked="checked"{/if} autocomplete="off"/>
                    <label for="cgv">{l s='I agree to the terms of service and will adhere to them unconditionally.' mod='belvg_fastcheckout'}</label> <a href="{$link_conditions}" class="iframe">{l s='(Read the Terms of Service)' mod='belvg_fastcheckout'}</a>
                </p>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("a.iframe").fancybox({
                            'type' : 'iframe',
                            'width':600,
                            'height':600
                        });
                    });
                </script>
            {/if}
        {/if}

        <!-- Payment -->
        {include file="$tpl_dir./order-payment.tpl"}
        <!-- END Payment -->
    {else}
        <form action="{if $opc}{$link->getPageLink('order-opc', true)}{else}{$link->getPageLink('order', true)}{/if}" method="post" id="fast_checkout">
            <div id="belvg_fastcheckout_wrapper">
                <div class="btn-set-2">
                    <input type="submit" name="belvg_fastcheckout_2" value="{l s='I confirm my order' mod='belvg_fastcheckout'}" />
                </div>
            </div>
        </form>

        <script type="text/javascript">
            $( "#fast_checkout" ).submit(function( event ) {
                if (jQuery(".condition_title").length && jQuery("#cgv:checked").length == 0) {
                    jQuery(".condition_title, .checkbox").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
                    return false;
                }
            });
        </script>
    {/if}

{else}
    {*<form action="{if $opc}{$link->getPageLink('order-opc', true)}{else}{$link->getPageLink('order', true)}{/if}" method="post" id="voucher">*}
    <form action="{if $opc}{$link->getPageLink('order-opc', true)}{else}{$link->getPageLink('order', true)}{/if}" method="post" id="fast_checkout">
        <div id="belvg_fastcheckout_wrapper">
            <div id="belvg_fastcheckout_border">
                <div id="belvg_fastcheckout_data">
                    {foreach $fastcheckout_fields as $field}
                        {$field.render}
                    {/foreach}
                </div>

                <p class="belvg_fastcheckout_required"><sup>*</sup> {l s='Required field' mod='belvg_fastcheckout'}</p>

                <div class="btn-set">
                    <input type="submit" name="belvg_fastcheckout" value="{if $fastcheckout_shipping_step || $fastcheckout_payment_step}{l s='Submit and continue' mod='belvg_fastcheckout'}{else}{l s='I confirm my order' mod='belvg_fastcheckout'}{/if}" />
                </div>
            </div>
        </div>

        {if !empty($HOOK_SHOPPING_CART_EXTRA)}
            <div class="clear"></div>
            <div class="cart_navigation_extra">
                <div id="HOOK_SHOPPING_CART_EXTRA">{$HOOK_SHOPPING_CART_EXTRA}</div>
            </div>
        {/if}
    </form>
{/if}
    
{/if}

