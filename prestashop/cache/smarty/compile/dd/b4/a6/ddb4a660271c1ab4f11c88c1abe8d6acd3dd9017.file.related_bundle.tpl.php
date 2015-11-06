<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 17:20:06
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/related_bundle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1160991681563a14162d1740-58284530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddb4a660271c1ab4f11c88c1abe8d6acd3dd9017' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/related_bundle.tpl',
      1 => 1444485530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1160991681563a14162d1740-58284530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BUNDLE_BLOCK' => 0,
    'tab' => 0,
    'pack_data' => 0,
    'pack' => 0,
    'item_product' => 0,
    'image' => 0,
    'imageIds' => 0,
    'link' => 0,
    'imageTitle' => 0,
    'type_img' => 0,
    'img_prod_dir' => 0,
    'lang_iso' => 0,
    'diff_price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563a141640edb5_41103863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563a141640edb5_41103863')) {function content_563a141640edb5_41103863($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['BUNDLE_BLOCK']->value) {?>
<script type="text/javascript">
	var txtNav = ["<?php echo smartyTranslate(array('s'=>'prev','mod'=>'advbundle'),$_smarty_tpl);?>
", "<?php echo smartyTranslate(array('s'=>'next','mod'=>'advbundle'),$_smarty_tpl);?>
"];
	$(document).ready(function(){
		$('div#idTab098').insertAfter('h3.idTab098');
	})
</script>
<?php echo $_smarty_tpl->getSubTemplate ("./css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['tab']->value) {?>
	<section class="page-product-box tab-pane" id="idTab098">
<?php } else { ?>
	<div id="idTab098">
<?php }?>
	<div class="adv-bootstrap adv-bundle-related adv-clearfix">
		<?php if (count($_smarty_tpl->tpl_vars['pack_data']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['pack'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pack']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pack_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pack']->key => $_smarty_tpl->tpl_vars['pack']->value) {
$_smarty_tpl->tpl_vars['pack']->_loop = true;
?>
				<div class="adv-lg-12">
					<div class="adv-main-container">
						<div class="adv-header pack_data adv-clearfix">
							<div class="adv-lg-6 adv-md-12 adv-xs-12 adv-c adv-fl" style="">
								<div class="pack_name adv-lg-12 adv-sm-12 adv-xs-12 adv-md-12"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack']->value['name_pack'], ENT_QUOTES, 'UTF-8', true);?>
</div>
							</div>
							<div class="adv-lg-6 adv-md-12 adv-xs-12">
								<div class="adv-fl adv-xs-12 adv-p3 adv-sm-4">
									<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" class="adv-btn adv-btn-success adv-btn-view">
										<span class="fa fa-search"></span>
										<?php echo smartyTranslate(array('s'=>'View pack page','mod'=>'advbundle'),$_smarty_tpl);?>

									</a>
								</div>
								<div class="adv-fl adv-xs-12 adv-p3 adv-sm-3">
									<button data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['pack']->value['id_product']);?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack']->value['link_cart'], ENT_QUOTES, 'UTF-8', true);?>
" class="adv-btn adv-btn-success adv-btn-cart ajax_add_to_cart_button">
										<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'advbundle'),$_smarty_tpl);?>

									</button>
								</div>
								<div class="adv-fl adv-xs-12 price_container adv-p3 adv-sm-5">
									<?php if ($_smarty_tpl->tpl_vars['pack']->value['prices']['final_incl']>0) {?>
										<div class="adv-final" style=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['pack']->value['prices']['final_incl']),$_smarty_tpl);?>
</div>
									<?php } else { ?>
										<div class="adv-final" style=""><?php echo smartyTranslate(array('s'=>'Gratuit','mod'=>'advbundle'),$_smarty_tpl);?>
</div>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['pack']->value['prices']['percent_disc']>0) {?>
										<div class="adv-discount" style="">(-<?php echo number_format($_smarty_tpl->tpl_vars['pack']->value['prices']['percent_disc'],0);?>
%)</div>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="adv-inner">
							<div class="adv-body adv-clearfix pack_items_<?php echo intval($_smarty_tpl->tpl_vars['pack']->value['id_pack']);?>
">
								<?php  $_smarty_tpl->tpl_vars['item_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pack']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item_product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item_product']->iteration=0;
 $_smarty_tpl->tpl_vars['item_product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item_product']->key => $_smarty_tpl->tpl_vars['item_product']->value) {
$_smarty_tpl->tpl_vars['item_product']->_loop = true;
 $_smarty_tpl->tpl_vars['item_product']->iteration++;
 $_smarty_tpl->tpl_vars['item_product']->index++;
 $_smarty_tpl->tpl_vars['item_product']->first = $_smarty_tpl->tpl_vars['item_product']->index === 0;
 $_smarty_tpl->tpl_vars['item_product']->last = $_smarty_tpl->tpl_vars['item_product']->iteration === $_smarty_tpl->tpl_vars['item_product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pack_prod']['first'] = $_smarty_tpl->tpl_vars['item_product']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pack_prod']['last'] = $_smarty_tpl->tpl_vars['item_product']->last;
?>
									<?php $_smarty_tpl->tpl_vars["colQty"] = new Smarty_variable(3, null, 0);?>
									<?php $_smarty_tpl->tpl_vars["type_img"] = new Smarty_variable('home_default', null, 0);?>
									<?php if (count($_smarty_tpl->tpl_vars['pack']->value['products'])==4) {?>
										<?php $_smarty_tpl->tpl_vars["colQty"] = new Smarty_variable(3, null, 0);?>
									<?php }?>
									<?php if (count($_smarty_tpl->tpl_vars['pack']->value['products'])==3) {?>
										<?php $_smarty_tpl->tpl_vars["colQty"] = new Smarty_variable(4, null, 0);?>
										<?php $_smarty_tpl->tpl_vars["type_img"] = new Smarty_variable('thickbox_default', null, 0);?>
									<?php }?>
									<?php if (count($_smarty_tpl->tpl_vars['pack']->value['products'])==2) {?>
										<?php $_smarty_tpl->tpl_vars["colQty"] = new Smarty_variable(6, null, 0);?>
										<?php $_smarty_tpl->tpl_vars["type_img"] = new Smarty_variable('thickbox_default', null, 0);?>
									<?php }?>
									<div style="min-width:220px;padding: 0 15px 0 15px;" class="adv-lg- <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pack_prod']['last']) {?>last_item<?php }?> ">
										<div class="adv-main-container">
											<div class="adv-header bundle_name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
											<div class="adv-inner">
												<div class="adv-body adv-clearfix">
													<div class="pack_image">
														<div class="adv-thumb_list">
															<?php $_smarty_tpl->tpl_vars["selectNumber"] = new Smarty_variable(0, null, 0);?>
															<?php if (isset($_smarty_tpl->tpl_vars['item_product']->value['images'])&&count($_smarty_tpl->tpl_vars['item_product']->value['images'])>0) {?>
																<div id="pack_images_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['pack']->value['id_pack']);?>
" class="img-thumbnail">
																	<?php if (isset($_smarty_tpl->tpl_vars['item_product']->value['images'])) {?>
																		<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item_product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['image']->key;
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['thumbnails']['last'] = $_smarty_tpl->tpl_vars['image']->last;
?>
																			<?php if ($_smarty_tpl->tpl_vars['item_product']->value['cover']['id_image']==$_smarty_tpl->tpl_vars['image']->value['id_image']) {?>
																				<?php $_smarty_tpl->tpl_vars['imageIds'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['item_product']->value['id'])."-".((string)$_smarty_tpl->tpl_vars['image']->value['id_image']), null, 0);?>
																				<?php if (!empty($_smarty_tpl->tpl_vars['image']->value['legend'])) {?>
																					<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
																				<?php } else { ?>
																					<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['name'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
																				<?php }?>
																				<div id="thumbnail_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
" class="adv-img-thumb <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['thumbnails']['last']) {?>last<?php }?>">
																					<div class="item">
																						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['item_product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['imageIds']->value,'thickbox_default'), ENT_QUOTES, 'UTF-8', true);?>
"	data-fancybox-group="other-views_<?php echo $_smarty_tpl->tpl_vars['item_product']->value['id'];?>
" class="fancybox" title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
">
																							<img class="img-responsive imgm" id="thumb_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['item_product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['imageIds']->value,$_smarty_tpl->tpl_vars['type_img']->value), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
" itemprop="image" />
																						</a>
																					</div>
																				</div>
																			<?php }?>
																		<?php } ?>
																	<?php }?>
																</div>
															<?php } else { ?>
																<div id="pack_images_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" class="img-thumbnail">
																	<div class="adv-img-thumb">
																		<div class="item">
																			<a>
																				<img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['img_prod_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-large_default.jpg" id="bigpic" alt="" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"/>
																			</a>
																		</div>
																	</div>
																</div>
															<?php }?>
														</div>
													</div>
													<!-- <hr class="adv-icon-plus"> -->
													<hr/>
													<div class="price_block">
														<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item_product']->value['id'];?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['diff_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['pack']->value['prices']['different_prices'][$_tmp3], null, 0);?>
														<div id="price_item_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
">
															<?php if ($_smarty_tpl->tpl_vars['diff_price']->value['final_price']>0) {?>
																<div class="adv-final"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['diff_price']->value['final_price']),$_smarty_tpl);?>
 x <?php echo intval($_smarty_tpl->tpl_vars['diff_price']->value['qty']);?>
</div>
															<?php } else { ?>
																<div class="adv-final"><?php echo smartyTranslate(array('s'=>'Gratuit','mod'=>'advbundle'),$_smarty_tpl);?>
 x <?php echo intval($_smarty_tpl->tpl_vars['diff_price']->value['qty']);?>
</div>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['diff_price']->value['discount']>0) {?>
															<div class="adv-center">
																<div class="adv-discount"><?php echo number_format($_smarty_tpl->tpl_vars['diff_price']->value['discount'],0);?>
%</div>
																<div class="adv-original"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['diff_price']->value['original_price']),$_smarty_tpl);?>
</div>
															</div>
															<?php }?>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['pack_prod']['first']) {?><div class="adv-icon-plus"></div><?php }?>
									</div>
								<?php } ?>
							</div>
							<script>
								$(document).ready(function() {
									$(".pack_items_<?php echo intval($_smarty_tpl->tpl_vars['pack']->value['id_pack']);?>
").owlCarousel({
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
			<?php } ?>
		<?php } else { ?>
			<script>
				$(document).ready(function() {
					$('div#idTab098').hide();
					$('h3.idTab098').hide();
				});
			</script>
			<?php echo smartyTranslate(array('s'=>'Empty','mod'=>'advbundle'),$_smarty_tpl);?>

		<?php }?>
	</div>
<?php if ($_smarty_tpl->tpl_vars['tab']->value) {?>
</section>
<?php } else { ?>
</div>
<?php }?>
<?php }?><?php }} ?>
