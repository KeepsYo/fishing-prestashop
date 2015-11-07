<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 16:22:41
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/pack.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2053220537563a06a122bb99-91438791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c9cd601a0c9b4e7930b1a5b4111783c8064f347' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/pack.tpl',
      1 => 1444485530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2053220537563a06a122bb99-91438791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'path' => 0,
    'object' => 0,
    'products' => 0,
    'id_pack' => 0,
    'classCol' => 0,
    'item_product' => 0,
    'discount_type' => 0,
    'allow_remove_item' => 0,
    'image' => 0,
    'imageIds' => 0,
    'link' => 0,
    'imageTitle' => 0,
    'type_img' => 0,
    'k' => 0,
    'selectNumber' => 0,
    'img_prod_dir' => 0,
    'lang_iso' => 0,
    'prices' => 0,
    'group' => 0,
    'id_attribute_group' => 0,
    'id_attribute' => 0,
    'group_attribute' => 0,
    'col_img_dir' => 0,
    'img_color_exists' => 0,
    'img_col_dir' => 0,
    'default_colorpicker' => 0,
    'allow_add' => 0,
    'tab' => 0,
    'tab_content' => 0,
    'combinations' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563a06a1498e03_78471177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563a06a1498e03_78471177')) {function content_563a06a1498e03_78471177($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['path']->value);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("./css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="adv-bundle-container adv-clearfix">
	<h2 itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
	<?php if ($_smarty_tpl->tpl_vars['object']->value->description_short) {?>
		<div id="descr_short" class="align_justify" itemprop="description"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['object']->value->description_short);?>
</div>
	<?php }?>
	<form action="" method="POST" id="pack_form">
		<div class="adv-lg-12 adv-clearfix">
			<?php $_smarty_tpl->tpl_vars["classCol"] = new Smarty_variable("adv-lg-3 adv-md-4 adv-sm-6 adv-xs-12", null, 0);?>
			<?php $_smarty_tpl->tpl_vars["type_img"] = new Smarty_variable('home_default', null, 0);?>
			<?php if (count($_smarty_tpl->tpl_vars['products']->value)==3) {?>
				<?php $_smarty_tpl->tpl_vars["classCol"] = new Smarty_variable("adv-lg-4 adv-md-4 adv-sm-6 adv-xs-12", null, 0);?>
				<?php $_smarty_tpl->tpl_vars["type_img"] = new Smarty_variable('thickbox_default', null, 0);?>
			<?php }?>
			<?php if (count($_smarty_tpl->tpl_vars['products']->value)==2) {?>
				<?php $_smarty_tpl->tpl_vars["classCol"] = new Smarty_variable("adv-lg-6 adv-md-6 adv-sm-6 adv-xs-12", null, 0);?>
				<?php $_smarty_tpl->tpl_vars["type_img"] = new Smarty_variable('thickbox_default', null, 0);?>
			<?php }?>
			<input class="" type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['id_pack']->value);?>
" name="id_pack"/>
			<?php  $_smarty_tpl->tpl_vars['item_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
			<div class="<?php echo $_smarty_tpl->tpl_vars['classCol']->value;?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pack_prod']['last']) {?>last_item<?php }?>">
				<input class="array_items" type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" name="item_ids[]"/>
				<input class="ipa_item_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" type="hidden" value="" name="ipa[<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
]"/>
				<?php if (count($_smarty_tpl->tpl_vars['item_product']->value['combinations'])>0) {?>
					<input class="isset_ipa_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" name="isset_ipa[]"/>
				<?php }?>
				<div class="adv-main-container">
					<div class="adv-header bundle_name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
					<div class="adv-inner">
						<div class="adv-body adv-clearfix">
							<!--  -->
							<div class="bundle_include">
								<?php if ($_smarty_tpl->tpl_vars['discount_type']->value!=2&&$_smarty_tpl->tpl_vars['allow_remove_item']->value) {?>
								<div class="adv-form-group <?php if (count($_smarty_tpl->tpl_vars['products']->value)<2) {?> adv-blur <?php }?>" style="float:none;">
									<div class="">
										<div class="adv-checkbox-nice">
											<input <?php if (count($_smarty_tpl->tpl_vars['products']->value)<2) {?> disabled="disabled" <?php }?> class="include_items" value="<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" name="incl_ids[]" type="checkbox" id="include_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" <?php if ($_smarty_tpl->tpl_vars['item_product']->value['bundle_include']) {?> checked="checked" <?php }?>>
											<label class="" for="include_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
">
												<?php echo smartyTranslate(array('s'=>'Include in bundle','mod'=>'advbundle'),$_smarty_tpl);?>

											</label>
										</div>
									</div>
								</div>
								<hr/>
								<?php } else { ?>
									<input class="include_items" value="<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" name="incl_ids[]" type="hidden" id="include_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
">
								<?php }?>
							</div>
							<!--  -->
							<div class="bundle_image">
								<div class="adv-thumb_list">
									<?php $_smarty_tpl->tpl_vars["selectNumber"] = new Smarty_variable(0, null, 0);?>
									<?php if (isset($_smarty_tpl->tpl_vars['item_product']->value['images'])&&count($_smarty_tpl->tpl_vars['item_product']->value['images'])>0) {?>
										<div id="pack_images_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" class="img-thumbnail owl-carousel">
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
													<?php $_smarty_tpl->tpl_vars['imageIds'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['item_product']->value['id'])."-".((string)$_smarty_tpl->tpl_vars['image']->value['id_image']), null, 0);?>
													<?php if (!empty($_smarty_tpl->tpl_vars['image']->value['legend'])) {?>
														<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
													<?php } else { ?>
														<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['name'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
													<?php }?>
													<div id="thumbnail_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
" class="adv-img-thumb owl-item <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['thumbnails']['last']) {?>last<?php }?>">
														<div class="item">
															<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['item_product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['imageIds']->value,'thickbox_default'), ENT_QUOTES, 'UTF-8', true);?>
"	data-fancybox-group="other-views_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
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
													<?php if ($_smarty_tpl->tpl_vars['item_product']->value['cover']['id_image']==$_smarty_tpl->tpl_vars['image']->value['id_image']) {?>
														<?php $_smarty_tpl->tpl_vars["selectNumber"] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value, null, 0);?>
													<?php }?>
												<?php } ?>
											<?php }?>
										</div>
										<script>
											$(document).ready(function() {
												$("#pack_images_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
").owlCarousel({
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
												var slideshow_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
 = $("#pack_images_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
").data('owlCarousel');
												slideshow_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
.jumpTo(<?php echo $_smarty_tpl->tpl_vars['selectNumber']->value;?>
);
											});
										</script>
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
							<!--  -->
							<hr/>
							<div class="price_block <?php if (!$_smarty_tpl->tpl_vars['item_product']->value['bundle_include']&&$_smarty_tpl->tpl_vars['discount_type']->value!=2) {?>adv-blur<?php }?>">
								<!--  -->
								<div class="bundle_price" id="price_item_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
">
								<?php if (!$_smarty_tpl->tpl_vars['item_product']->value['error']) {?>
									<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp3]['final_price']>0) {?>
										<div class="adv-final"><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp4=ob_get_clean();?><?php echo Tools::displayPrice($_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp4]['final_price']);?>
 x <?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp5]['qty'];?>
</div>
									<?php } else { ?>
										<div class="adv-final"><?php echo smartyTranslate(array('s'=>'Gratuit','mod'=>'advbundle'),$_smarty_tpl);?>
 x <?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp6=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp6]['qty'];?>
</div>
									<?php }?>
									<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp7=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp7]['discount']>0) {?>
									<div class="adv-center">
										<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp8=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp8]['final_price']>0) {?>
											<div class="adv-discount"><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp9=ob_get_clean();?><?php echo number_format($_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp9]['discount'],0);?>
%</div>
										<?php }?>
										<div class="adv-original"><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
<?php $_tmp10=ob_get_clean();?><?php echo Tools::displayPrice($_smarty_tpl->tpl_vars['prices']->value['different_prices'][$_tmp10]['original_price']);?>
</div>
									</div>
									<?php }?>
								<?php } else { ?>
									<p class="adv-alert adv-alert-danger"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['error'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								<?php }?>
								</div>
								<!--  -->
								<hr/>
								<div id="attributes" class="bundle_attributes adv-clearfix">
								<?php if (isset($_smarty_tpl->tpl_vars['item_product']->value['groups'])&&$_smarty_tpl->tpl_vars['item_product']->value['custom_combination']) {?>
									<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute_group'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item_product']->value['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute_group']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
										<?php if (count($_smarty_tpl->tpl_vars['group']->value['attributes'])) {?>
											<div class="adv-form-group">
												<label class="adv-lg-12 adv-control-label attribute_label" <?php if ($_smarty_tpl->tpl_vars['group']->value['group_type']!='color'&&$_smarty_tpl->tpl_vars['group']->value['group_type']!='radio') {?>for="group_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
&nbsp;</label>
												<?php $_smarty_tpl->tpl_vars["groupName"] = new Smarty_variable("group_".((string)$_smarty_tpl->tpl_vars['id_attribute_group']->value), null, 0);?>
												<div class="attribute_list adv_list_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
 adv-lg-12 adv-control-label">
													<?php if (($_smarty_tpl->tpl_vars['group']->value['group_type']=='select')) {?>
														<select name="attribite[<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
][<?php echo $_smarty_tpl->tpl_vars['id_attribute_group']->value;?>
]" id="group_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
" class="adv-form-control adv-combination-select attribute_select no-print">
															<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
																<option value="<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
"<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> selected="selected"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
</option>
															<?php } ?>
														</select>
													<?php } elseif (($_smarty_tpl->tpl_vars['group']->value['group_type']=='color')) {?>
														<ul id="color_to_pick_list" class="adv-clearfix">
															<?php $_smarty_tpl->tpl_vars["default_colorpicker"] = new Smarty_variable('', null, 0);?>
															<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
																<?php $_smarty_tpl->tpl_vars['img_color_exists'] = new Smarty_variable(file_exists((($_smarty_tpl->tpl_vars['col_img_dir']->value).($_smarty_tpl->tpl_vars['id_attribute']->value)).('.jpg')), null, 0);?>
																<li<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> class="selected"<?php }?>>
																	<a id="color_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
" data-idp="<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" class="adv-combination-select color_pick<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> selected<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['img_color_exists']->value&&isset($_smarty_tpl->tpl_vars['item_product']->value['colors'][$_smarty_tpl->tpl_vars['id_attribute']->value]['value'])&&$_smarty_tpl->tpl_vars['item_product']->value['colors'][$_smarty_tpl->tpl_vars['id_attribute']->value]['value']) {?> style="background:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['colors'][$_smarty_tpl->tpl_vars['id_attribute']->value]['value'], ENT_QUOTES, 'UTF-8', true);?>
;"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['colors'][$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
">
																		<?php if ($_smarty_tpl->tpl_vars['img_color_exists']->value) {?>
																			<img src="<?php echo $_smarty_tpl->tpl_vars['img_col_dir']->value;?>
<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['colors'][$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_product']->value['colors'][$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="20" height="20" />
																		<?php }?>
																	</a>
																</li>
																<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?>
																	<?php $_smarty_tpl->tpl_vars['default_colorpicker'] = new Smarty_variable($_smarty_tpl->tpl_vars['id_attribute']->value, null, 0);?>
																<?php }?>
															<?php } ?>
														</ul>
														<input type="hidden" class="color_pick_hidden_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" name="attribite[<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
][<?php echo $_smarty_tpl->tpl_vars['id_attribute_group']->value;?>
]" value="<?php echo intval($_smarty_tpl->tpl_vars['default_colorpicker']->value);?>
" />
													<?php } elseif (($_smarty_tpl->tpl_vars['group']->value['group_type']=='radio')) {?>
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<div class="adv-radio">
																<input type="radio" id="attr_<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
" class="adv-combination-select attribute_radio7" name="attribite[<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
][<?php echo $_smarty_tpl->tpl_vars['id_attribute_group']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> checked="checked"<?php }?> />
																<label for="attr_<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['item_product']->value['id']);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
</label>
															</div>
														<?php } ?>
													<?php }?>
												</div><!-- end attribute_list -->
											</div>
										<?php }?>
									<?php } ?>
								<?php }?>
								</div>
								<!-- <div class="bundle_error">
									
								</div> -->
							</div>
							<!--  -->
						</div>
					</div>
				</div>
				<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['pack_prod']['first']) {?><div class="adv-icon-plus"></div><?php }?>
			</div>
			<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['pack_prod']['last']) {?>
				<div class="plus_down">
					<div class="adv-icon-plus-down"></div>
				</div>
			<?php }?>
			<?php } ?>
		</div>
		<div class="adv-lg-12 adv-clearfix">
			<div style="float:right;" class="adv-lg-3 adv-md-4 adv-sm-6 adv-xs-12">
				<div class="adv-main-container">
					<div class="adv-header adv-clearfix"><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'advbundle'),$_smarty_tpl);?>
</div>
					<div class="adv-inner">
						<div class="adv-body adv-clearfix">
							<div id="prices_pack">
								<?php if ($_smarty_tpl->tpl_vars['prices']->value['final_incl']>0) {?>
									<div class="adv-final"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['final_incl']),$_smarty_tpl);?>
</div>
								<?php } else { ?>
									<div class="adv-final"><?php echo smartyTranslate(array('s'=>'Gratuit','mod'=>'advbundle'),$_smarty_tpl);?>
</div>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['prices']->value['percent_disc']>0) {?>
								<div class="adv-center">
									<div class="adv-discount">-<?php echo number_format($_smarty_tpl->tpl_vars['prices']->value['percent_disc'],0);?>
%</div>
									<div class="adv-original"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['original_incl']),$_smarty_tpl);?>
</div>
								</div>
								<?php }?>
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
									<span class="help-block"><?php echo smartyTranslate(array('s'=>'Bundle qty','mod'=>'advbundle'),$_smarty_tpl);?>
</span> 
								</div>
								<?php if ($_smarty_tpl->tpl_vars['allow_add']->value) {?>
									<div class="adv-lg-12">
										<button type="button" class="adv-btn adv-btn-cart">
											<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'advbundle'),$_smarty_tpl);?>

										</button>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="float:left;" class="adv-lg-9 adv-md-8 adv-sm-6 adv-xs-12">
				<div class="adv-tabs adv-mb20">
					<ul id="adv-myTab" class="adv-nav adv-nav-tabs adv-clearfix">
						<?php if ($_smarty_tpl->tpl_vars['object']->value->description!='') {?>
						<li>
							<a href="#pack_tab_<?php echo intval($_smarty_tpl->tpl_vars['object']->value->id);?>
" data-toggle="advtab"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['object']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
						</li>
						<?php }?>
						<?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['tab']->_loop = true;
?>
							<li>
								<a href="#pack_tab_<?php echo intval($_smarty_tpl->tpl_vars['tab']->value['id']);?>
" data-toggle="advtab"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							</li>
						<?php } ?>
					</ul>
					<div id="adv-myTabContent" class="adv-tab-content adv-clearfix">
						<?php if ($_smarty_tpl->tpl_vars['object']->value->description!='') {?>
						<div class="adv-tab-pane adv-fade adv-active adv-in" id="pack_tab_<?php echo intval($_smarty_tpl->tpl_vars['object']->value->id);?>
">
							<p>
								<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['object']->value->description);?>

							</p>
						</div>
						<?php }?>
						<?php  $_smarty_tpl->tpl_vars['tab_content'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab_content']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tab_content']->key => $_smarty_tpl->tpl_vars['tab_content']->value) {
$_smarty_tpl->tpl_vars['tab_content']->_loop = true;
?>
						<div class="adv-tab-pane adv-fade" id="pack_tab_<?php echo intval($_smarty_tpl->tpl_vars['tab_content']->value['id']);?>
">
							<p>
								<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['tab_content']->value['description']);?>

							</p>
						</div>
						<?php } ?>
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
		var combinations = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['combinations']->value);?>
;
		var txtNav = ["<?php echo smartyTranslate(array('s'=>'prev','mod'=>'advbundle'),$_smarty_tpl);?>
", "<?php echo smartyTranslate(array('s'=>'next','mod'=>'advbundle'),$_smarty_tpl);?>
"];
		var allow_remove_item = <?php echo intval($_smarty_tpl->tpl_vars['allow_remove_item']->value);?>
;
		var ajax_bundle_link = "<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['link']->value->getModuleLink('advbundle','ajax'));?>
";
		var error_qty_remove = "<?php echo smartyTranslate(array('s'=>'The bundle cannot be less than 2 items!','mod'=>'advbundle'),$_smarty_tpl);?>
";
	</script>
</div>
<?php }} ?>
