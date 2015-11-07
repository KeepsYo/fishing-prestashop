{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{if $BUNDLE_BLOCK}
<script type="text/javascript">
	var txtNav = ["{l s='prev' mod='advbundle'}", "{l s='next' mod='advbundle'}"];
	$(document).ready(function(){
		$('div#idTab098').insertAfter('h3.idTab098');
	})
</script>
{include file="./css.tpl"}
{if $tab}
	<section class="page-product-box tab-pane" id="idTab098">
{else}
	<div id="idTab098">
{/if}
	<div class="adv-bootstrap adv-bundle-related adv-clearfix">
		{if count($pack_data)}
			{foreach $pack_data as $pack}
				<div class="adv-lg-12">
					<div class="adv-main-container">
						<div class="adv-header pack_data adv-clearfix">
							<div class="adv-lg-6 adv-md-12 adv-xs-12 adv-c adv-fl" style="">
								<div class="pack_name adv-lg-12 adv-sm-12 adv-xs-12 adv-md-12">{$pack['name_pack']|escape:'html':'UTF-8'}</div>
							</div>
							<div class="adv-lg-6 adv-md-12 adv-xs-12">
								<div class="adv-fl adv-xs-12 adv-p3 adv-sm-4">
									<a href="{$pack['link']|escape:'html':'UTF-8'}" class="adv-btn adv-btn-success adv-btn-view">
										<span class="fa fa-search"></span>
										{l s='View pack page' mod='advbundle'}
									</a>
								</div>
								<div class="adv-fl adv-xs-12 adv-p3 adv-sm-3">
									<button data-id-product="{$pack['id_product']|intval}" href="{$pack['link_cart']|escape:'html':'UTF-8'}" class="adv-btn adv-btn-success adv-btn-cart ajax_add_to_cart_button">
										{l s='Add to cart' mod='advbundle'}
									</button>
								</div>
								<div class="adv-fl adv-xs-12 price_container adv-p3 adv-sm-5">
									{if $pack['prices']['final_incl'] > 0}
										<div class="adv-final" style="">{convertPrice price=$pack['prices']['final_incl']}</div>
									{else}
										<div class="adv-final" style="">{l s='Gratuit' mod='advbundle'}</div>
									{/if}
									{if $pack['prices']['percent_disc'] > 0}
										<div class="adv-discount" style="">(-{$pack['prices']['percent_disc']|number_format:0}%)</div>
									{/if}
								</div>
							</div>
						</div>
						<div class="adv-inner">
							<div class="adv-body adv-clearfix pack_items_{$pack['id_pack']|intval}">
								{foreach from=$pack['products'] item=item_product name=pack_prod}
									{assign var="colQty" value=3}
									{assign var="type_img" value='home_default'}
									{if $pack['products']|count == 4}
										{assign var="colQty" value=3}
									{/if}
									{if $pack['products']|count == 3}
										{assign var="colQty" value=4}
										{assign var="type_img" value='thickbox_default'}
									{/if}
									{if $pack['products']|count == 2}
										{assign var="colQty" value=6}
										{assign var="type_img" value='thickbox_default'}
									{/if}
									<div style="min-width:220px;padding: 0 15px 0 15px;" class="adv-lg- {if $smarty.foreach.pack_prod.last}last_item{/if} ">
										<div class="adv-main-container">
											<div class="adv-header bundle_name">{$item_product['name']|escape:'html':'UTF-8'}</div>
											<div class="adv-inner">
												<div class="adv-body adv-clearfix">
													<div class="pack_image">
														<div class="adv-thumb_list">
															{assign var="selectNumber" value=0}
															{if isset($item_product['images']) && count($item_product['images']) > 0}
																<div id="pack_images_{$item_product['id']|intval}_{$pack['id_pack']|intval}" class="img-thumbnail">
																	{if isset($item_product['images'])}
																		{foreach from=$item_product['images'] key=k item=image name=thumbnails}
																			{if $item_product['cover']['id_image'] == $image['id_image']}
																				{assign var=imageIds value="`$item_product['id']`-`$image.id_image`"}
																				{if !empty($image.legend)}
																					{assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
																				{else}
																					{assign var=imageTitle value=$item_product['name']|escape:'html':'UTF-8'}
																				{/if}
																				<div id="thumbnail_{$image.id_image}" class="adv-img-thumb {if $smarty.foreach.thumbnails.last}last{/if}">
																					<div class="item">
																						<a href="{$link->getImageLink($item_product['link_rewrite'], $imageIds, 'thickbox_default')|escape:'html':'UTF-8'}"	data-fancybox-group="other-views_{$item_product['id']}" class="fancybox" title="{$imageTitle}">
																							<img class="img-responsive imgm" id="thumb_{$image.id_image}" src="{$link->getImageLink($item_product['link_rewrite'], $imageIds, $type_img)|escape:'html':'UTF-8'}" alt="{$imageTitle}" title="{$imageTitle}" itemprop="image" />
																						</a>
																					</div>
																				</div>
																			{/if}
																		{/foreach}
																	{/if}
																</div>
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
													<!-- <hr class="adv-icon-plus"> -->
													<hr/>
													<div class="price_block">
														{assign var='diff_price' value=$pack['prices']['different_prices'][{$item_product['id']}]}
														<div id="price_item_{$item_product['id']|intval}">
															{if $diff_price['final_price'] > 0}
																<div class="adv-final">{convertPrice price=$diff_price['final_price']} x {$diff_price['qty']|intval}</div>
															{else}
																<div class="adv-final">{l s='Gratuit' mod='advbundle'} x {$diff_price['qty']|intval}</div>
															{/if}
															{if $diff_price['discount'] > 0}
															<div class="adv-center">
																<div class="adv-discount">{$diff_price['discount']|number_format:0}%</div>
																<div class="adv-original">{convertPrice price=$diff_price['original_price']}</div>
															</div>
															{/if}
														</div>
														
													</div>
												</div>
											</div>
										</div>
										{if !$smarty.foreach.pack_prod.first}<div class="adv-icon-plus"></div>{/if}
									</div>
								{/foreach}
							</div>
							<script>
								$(document).ready(function() {
									$(".pack_items_{$pack['id_pack']|intval}").owlCarousel({
										//autoPlay : 4000,
										items : 4,
										pagination : false,
										stopOnHover : true,
										navigation : true,
									});
								});
							</script>
						</div>
					</div>
				</div>
			{/foreach}
		{else}
			<script>
				$(document).ready(function() {
					$('div#idTab098').hide();
					$('h3.idTab098').hide();
				});
			</script>
			{l s='Empty' mod='advbundle'}
		{/if}
	</div>
{if $tab}
</section>
{else}
</div>
{/if}
{/if}