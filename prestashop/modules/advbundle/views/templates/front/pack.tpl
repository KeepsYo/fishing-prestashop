{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{capture name=path}{$path|escape:'quotes':'UTF-8'}{/capture}
{include file="$tpl_dir./errors.tpl"}
{include file="./css.tpl"}
<div class="adv-bundle-container adv-clearfix">
	<h2 itemprop="name">{$object->name|escape:'html':'UTF-8'}</h1>
	{if $object->description_short}
		<div id="descr_short" class="align_justify" itemprop="description">{$object->description_short|strip_tags}</div>
	{/if}
	<form action="" method="POST" id="pack_form">
		<div class="adv-lg-12 adv-clearfix">
			{assign var="classCol" value="adv-lg-3 adv-md-4 adv-sm-6 adv-xs-12"}
			{assign var="type_img" value='home_default'}
			{if $products|count == 3}
				{assign var="classCol" value="adv-lg-4 adv-md-4 adv-sm-6 adv-xs-12"}
				{assign var="type_img" value='thickbox_default'}
			{/if}
			{if $products|count == 2}
				{assign var="classCol" value="adv-lg-6 adv-md-6 adv-sm-6 adv-xs-12"}
				{assign var="type_img" value='thickbox_default'}
			{/if}
			<input class="" type="hidden" value="{$id_pack|intval}" name="id_pack"/>
			{foreach from=$products item=item_product name=pack_prod}
			<div class="{$classCol} {if $smarty.foreach.pack_prod.last}last_item{/if}">
				<input class="array_items" type="hidden" value="{$item_product['id']|intval}" name="item_ids[]"/>
				<input class="ipa_item_{$item_product['id']|intval}" type="hidden" value="" name="ipa[{$item_product['id']|intval}]"/>
				{if $item_product['combinations']|count > 0}
					<input class="isset_ipa_{$item_product['id']|intval}" type="hidden" value="{$item_product['id']|intval}" name="isset_ipa[]"/>
				{/if}
				<div class="adv-main-container">
					<div class="adv-header bundle_name">{$item_product['name']|escape:'html':'UTF-8'}</div>
					<div class="adv-inner">
						<div class="adv-body adv-clearfix">
							<!--  -->
							<div class="bundle_include">
								{if $discount_type != 2 && $allow_remove_item}
								<div class="adv-form-group {if $products|count < 2} adv-blur {/if}" style="float:none;">
									<div class="">
										<div class="adv-checkbox-nice">
											<input {if $products|count < 2} disabled="disabled" {/if} class="include_items" value="{$item_product['id']|intval}" name="incl_ids[]" type="checkbox" id="include_{$item_product['id']|intval}" {if $item_product['bundle_include']} checked="checked" {/if}>
											<label class="" for="include_{$item_product['id']|intval}">
												{l s='Include in bundle' mod='advbundle'}
											</label>
										</div>
									</div>
								</div>
								<hr/>
								{else}
									<input class="include_items" value="{$item_product['id']|intval}" name="incl_ids[]" type="hidden" id="include_{$item_product['id']|intval}">
								{/if}
							</div>
							<!--  -->
							<div class="bundle_image">
								<div class="adv-thumb_list">
									{assign var="selectNumber" value=0}
									{if isset($item_product['images']) && count($item_product['images']) > 0}
										<div id="pack_images_{$item_product['id']|intval}" class="img-thumbnail owl-carousel">
											{if isset($item_product['images'])}
												{foreach from=$item_product['images'] key=k item=image name=thumbnails}
													{assign var=imageIds value="`$item_product['id']`-`$image.id_image`"}
													{if !empty($image.legend)}
														{assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
													{else}
														{assign var=imageTitle value=$item_product['name']|escape:'html':'UTF-8'}
													{/if}
													<div id="thumbnail_{$image.id_image}" class="adv-img-thumb owl-item {if $smarty.foreach.thumbnails.last}last{/if}">
														<div class="item">
															<a href="{$link->getImageLink($item_product['link_rewrite'], $imageIds, 'thickbox_default')|escape:'html':'UTF-8'}"	data-fancybox-group="other-views_{$item_product['id']|intval}" class="fancybox" title="{$imageTitle}">
																<img class="img-responsive imgm" id="thumb_{$image.id_image}" src="{$link->getImageLink($item_product['link_rewrite'], $imageIds, $type_img)|escape:'html':'UTF-8'}" alt="{$imageTitle}" title="{$imageTitle}" itemprop="image" />
															</a>
														</div>
													</div>
													{if $item_product['cover']['id_image'] == $image['id_image']}
														{assign var="selectNumber" value=$k}
													{/if}
												{/foreach}
											{/if}
										</div>
										<script>
											$(document).ready(function() {
												$("#pack_images_{$item_product['id']|intval}").owlCarousel({
													//autoPlay : 4000,
													items : 1,
													pagination : false,
													stopOnHover : true,
													navigation : true,
													navigationText : txtNav,
													singleItem : true,
													afterInit : function(){
														flat_block($('.bundle_image'), true, 'min-height');
													}
												});
												var slideshow_{$item_product['id']|intval} = $("#pack_images_{$item_product['id']|intval}").data('owlCarousel');
												slideshow_{$item_product['id']|intval}.jumpTo({$selectNumber});
											});
										</script>
									{else}
									<div id="pack_images_{$item_product['id']|intval}" class="img-thumbnail">
										<div class="adv-img-thumb">
											<div class="item">
												<a>
													<img itemprop="image" src="{$img_prod_dir}{$lang_iso}-default-large_default.jpg" id="bigpic" alt="" title="{$item_product['name']|escape:'html':'UTF-8'}"/>
												</a>
											</div>
										</div>
									</div>
									{/if}
								</div>
							</div>
							<!--  -->
							<hr/>
							<div class="price_block {if !$item_product['bundle_include'] && $discount_type != 2}adv-blur{/if}">
								<!--  -->
								<div class="bundle_price" id="price_item_{$item_product['id']|intval}">
								{if !$item_product['error']}
									{if $prices['different_prices'][{$item_product['id']|intval}]['final_price'] > 0}
										<div class="adv-final">{Tools::displayPrice($prices['different_prices'][{$item_product['id']|intval}]['final_price'])} x {$prices['different_prices'][{$item_product['id']|intval}]['qty']}</div>
									{else}
										<div class="adv-final">{l s='Gratuit' mod='advbundle'} x {$prices['different_prices'][{$item_product['id']|intval}]['qty']}</div>
									{/if}
									{if $prices['different_prices'][{$item_product['id']|intval}]['discount'] > 0}
									<div class="adv-center">
										{if $prices['different_prices'][{$item_product['id']|intval}]['final_price'] > 0}
											<div class="adv-discount">{$prices['different_prices'][{$item_product['id']|intval}]['discount']|number_format:0}%</div>
										{/if}
										<div class="adv-original">{Tools::displayPrice($prices['different_prices'][{$item_product['id']|intval}]['original_price'])}</div>
									</div>
									{/if}
								{else}
									<p class="adv-alert adv-alert-danger">{$item_product['error']|escape:'html':'UTF-8'}</p>
								{/if}
								</div>
								<!--  -->
								<hr/>
								<div id="attributes" class="bundle_attributes adv-clearfix">
								{if isset($item_product['groups']) && $item_product['custom_combination']}
									{foreach from=$item_product['groups'] key=id_attribute_group item=group}
										{if $group.attributes|@count}
											<div class="adv-form-group">
												<label class="adv-lg-12 adv-control-label attribute_label" {if $group.group_type != 'color' && $group.group_type != 'radio'}for="group_{$id_attribute_group|intval}"{/if}>{$group.name|escape:'html':'UTF-8'}&nbsp;</label>
												{assign var="groupName" value="group_$id_attribute_group"}
												<div class="attribute_list adv_list_{$item_product['id']|intval} adv-lg-12 adv-control-label">
													{if ($group.group_type == 'select')}
														<select name="attribite[{$item_product['id']|intval}][{$id_attribute_group}]" id="group_{$id_attribute_group|intval}" class="adv-form-control adv-combination-select attribute_select no-print">
															{foreach from=$group.attributes key=id_attribute item=group_attribute}
																<option value="{$id_attribute|intval}"{if $group.default == $id_attribute} selected="selected"{/if} title="{$group_attribute|escape:'html':'UTF-8'}">{$group_attribute|escape:'html':'UTF-8'}</option>
															{/foreach}
														</select>
													{elseif ($group.group_type == 'color')}
														<ul id="color_to_pick_list" class="adv-clearfix">
															{assign var="default_colorpicker" value=""}
															{foreach from=$group.attributes key=id_attribute item=group_attribute}
																{assign var='img_color_exists' value=file_exists($col_img_dir|cat:$id_attribute|cat:'.jpg')}
																<li{if $group.default == $id_attribute} class="selected"{/if}>
																	<a id="color_{$id_attribute|intval}" data-idp="{$item_product['id']|intval}" class="adv-combination-select color_pick{if ($group.default == $id_attribute)} selected{/if}"{if !$img_color_exists && isset($item_product['colors'].$id_attribute.value) && $item_product['colors'].$id_attribute.value} style="background:{$item_product['colors'].$id_attribute.value|escape:'html':'UTF-8'};"{/if} title="{$item_product['colors'].$id_attribute.name|escape:'html':'UTF-8'}">
																		{if $img_color_exists}
																			<img src="{$img_col_dir}{$id_attribute|intval}.jpg" alt="{$item_product['colors'].$id_attribute.name|escape:'html':'UTF-8'}" title="{$item_product['colors'].$id_attribute.name|escape:'html':'UTF-8'}" width="20" height="20" />
																		{/if}
																	</a>
																</li>
																{if ($group.default == $id_attribute)}
																	{$default_colorpicker = $id_attribute}
																{/if}
															{/foreach}
														</ul>
														<input type="hidden" class="color_pick_hidden_{$item_product['id']|intval}" name="attribite[{$item_product['id']|intval}][{$id_attribute_group}]" value="{$default_colorpicker|intval}" />
													{elseif ($group.group_type == 'radio')}
														{foreach from=$group.attributes key=id_attribute item=group_attribute}
															<div class="adv-radio">
																<input type="radio" id="attr_{$id_attribute}_{$item_product['id']|intval}" class="adv-combination-select attribute_radio7" name="attribite[{$item_product['id']|intval}][{$id_attribute_group}]" value="{$id_attribute}" {if ($group.default == $id_attribute)} checked="checked"{/if} />
																<label for="attr_{$id_attribute}_{$item_product['id']|intval}">{$group_attribute|escape:'html':'UTF-8'}</label>
															</div>
														{/foreach}
													{/if}
												</div><!-- end attribute_list -->
											</div>
										{/if}
									{/foreach}
								{/if}
								</div>
								<!-- <div class="bundle_error">
									
								</div> -->
							</div>
							<!--  -->
						</div>
					</div>
				</div>
				{if !$smarty.foreach.pack_prod.first}<div class="adv-icon-plus"></div>{/if}
			</div>
			{if !$smarty.foreach.pack_prod.last}
				<div class="plus_down">
					<div class="adv-icon-plus-down"></div>
				</div>
			{/if}
			{/foreach}
		</div>
		<div class="adv-lg-12 adv-clearfix">
			<div style="float:right;" class="adv-lg-3 adv-md-4 adv-sm-6 adv-xs-12">
				<div class="adv-main-container">
					<div class="adv-header adv-clearfix">{l s='Add to cart' mod='advbundle'}</div>
					<div class="adv-inner">
						<div class="adv-body adv-clearfix">
							<div id="prices_pack">
								{if $prices['final_incl'] > 0}
									<div class="adv-final">{convertPrice price=$prices['final_incl']}</div>
								{else}
									<div class="adv-final">{l s='Gratuit' mod='advbundle'}</div>
								{/if}
								{if $prices['percent_disc'] > 0}
								<div class="adv-center">
									<div class="adv-discount">-{$prices['percent_disc']|number_format:0}%</div>
									<div class="adv-original">{convertPrice price=$prices['original_incl']}</div>
								</div>
								{/if}
							</div>
							<div class="adv-form-group">
								<div class="adv-lg-12">
									<span class="adv-spinner">
										<input name="qty_pack" class="adv-form-control adv-spinner-input" type="text" id="spinner" value="1"/>
										<a class="adv-spinner-button adv-spinner-up" tabindex="-1">
											<i class="fa fa-icon-chevron-up"></i>
										</a>
										<a class="adv-spinner-button adv-spinner-down" tabindex="-1">
											<i class="fa fa-icon-chevron-down"></i>
										</a>
									</span>
									<span class="help-block">{l s='Bundle qty' mod='advbundle'}</span> 
								</div>
								{if $allow_add}
									<div class="adv-lg-12">
										<button type="button" class="adv-btn adv-btn-cart">
											{l s='Add to cart' mod='advbundle'}
										</button>
									</div>
								{/if}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="float:left;" class="adv-lg-9 adv-md-8 adv-sm-6 adv-xs-12">
				<div class="adv-tabs adv-mb20">
					<ul id="adv-myTab" class="adv-nav adv-nav-tabs adv-clearfix">
						{if $object->description != ''}
						<li>
							<a href="#pack_tab_{$object->id|intval}" data-toggle="advtab">{$object->name|escape:'html':'UTF-8'}</a>
						</li>
						{/if}
						{foreach $products as $tab}
							<li>
								<a href="#pack_tab_{$tab['id']|intval}" data-toggle="advtab">{$tab['name']|escape:'html':'UTF-8'}</a>
							</li>
						{/foreach}
					</ul>
					<div id="adv-myTabContent" class="adv-tab-content adv-clearfix">
						{if $object->description != ''}
						<div class="adv-tab-pane adv-fade adv-active adv-in" id="pack_tab_{$object->id|intval}">
							<p>
								{$object->description|escape:'quotes':'UTF-8'}
							</p>
						</div>
						{/if}
						{foreach $products as $tab_content}
						<div class="adv-tab-pane adv-fade" id="pack_tab_{$tab_content['id']|intval}">
							<p>
								{$tab_content['description']|escape:'quotes':'UTF-8'}
							</p>
						</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>		
	</form>
	<div class="adv-notice-wrapper" style="display:none;">
		<div id="opc-toast-container" class="al_err opc-toast-top-left">
			<div class="opc-toast fa-comments opc-toast-danger" style="opacity: 0.7995559618991;">
				<button class="opc-toast-close-button">×</button>
				<div class="opc-toast-message">'+ isseterr +'</div>
			</div>
		</div>
		<div id="opc-toast-container" class="al_err opc-toast-top-right">
			<div class="opc-toast fa-comments opc-toast-success" style="opacity: 0.7995559618991;">
				<button class="opc-toast-close-button">×</button>
				<div class="opc-toast-message">'+ isseterr +'</div>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src=""></script> -->
	<script type="text/javascript">
		var combinations = {$combinations|json_encode};
		var txtNav = ["{l s='prev' mod='advbundle'}", "{l s='next' mod='advbundle'}"];
		var allow_remove_item = {$allow_remove_item|intval};
		var ajax_bundle_link = "{$link->getModuleLink('advbundle', 'ajax')|escape:'quotes'}";
		var error_qty_remove = "{l s='The bundle cannot be less than 2 items!' mod='advbundle'}";
	</script>
</div>
