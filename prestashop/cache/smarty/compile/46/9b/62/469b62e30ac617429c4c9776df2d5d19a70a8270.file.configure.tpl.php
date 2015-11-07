<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:49:04
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/admin/configure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3474536735639e2a0e15433-27566391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '469b62e30ac617429c4c9776df2d5d19a70a8270' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/admin/configure.tpl',
      1 => 1444485529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3474536735639e2a0e15433-27566391',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bundle_ajax_link' => 0,
    'pack_data' => 0,
    'id_pack' => 0,
    'bundle_currency' => 0,
    'product' => 0,
    'bundle_new' => 0,
    'bundle_update' => 0,
    'bundle_exclids' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639e2a0ea00b2_27842631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639e2a0ea00b2_27842631')) {function content_5639e2a0ea00b2_27842631($_smarty_tpl) {?>

<script type="text/javascript">
	var bundle_delete_product_text = '<?php echo smartyTranslate(array('s'=>'Delete this product?','mod'=>'advbundle'),$_smarty_tpl);?>
';
	var bundle_min_text = '<?php echo smartyTranslate(array('s'=>'Please add min. 2 product.','mod'=>'advbundle'),$_smarty_tpl);?>
';
	var bundle_addlist_text = '<?php echo smartyTranslate(array('s'=>'Item successfully added to the package!','mod'=>'advbundle'),$_smarty_tpl);?>
';
	var bundle_dellist_text = '<?php echo smartyTranslate(array('s'=>'Item successfully deleted from the package!','mod'=>'advbundle'),$_smarty_tpl);?>
';
	var bundle_updprice_text = '<?php echo smartyTranslate(array('s'=>'Prices updated successfully!','mod'=>'advbundle'),$_smarty_tpl);?>
';
	var bundle__text = '<?php echo smartyTranslate(array('s'=>'','mod'=>'advbundle'),$_smarty_tpl);?>
';
	var bundle_ajax_link = '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['bundle_ajax_link']->value);?>
';
</script>
<div class="panel <?php if (!$_smarty_tpl->tpl_vars['pack_data']->value['new_version']) {?>adv_bundle_admin<?php }?> clearfix">
	<div class="clearfix">
		<h3><i class="icon icon-credit-card"></i> <?php echo smartyTranslate(array('s'=>'Bundle complect settings','mod'=>'advbundle'),$_smarty_tpl);?>
</h3>
		<input type="hidden" name="bundle_id_pack" value="<?php echo intval($_smarty_tpl->tpl_vars['id_pack']->value);?>
">
		<div class="form-group bundle_mode">
			<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Discount type','mod'=>'advbundle'),$_smarty_tpl);?>
</label>
			<div class="col-lg-6">
				<select name="id_discount_type" class="id_discount_type">
					<option <?php if ($_smarty_tpl->tpl_vars['pack_data']->value['id_discount_type']==0) {?> selected="selected" <?php }?> value="0"><?php echo smartyTranslate(array('s'=>'Do not apply discount for this Bundle product','mod'=>'advbundle'),$_smarty_tpl);?>
</option>
					<option <?php if ($_smarty_tpl->tpl_vars['pack_data']->value['id_discount_type']==1) {?> selected="selected" <?php }?> value="1"><?php echo smartyTranslate(array('s'=>'Apply percent discount for all products in pack','mod'=>'advbundle'),$_smarty_tpl);?>
</option>
					<option <?php if ($_smarty_tpl->tpl_vars['pack_data']->value['id_discount_type']==2) {?> selected="selected" <?php }?> value="2"><?php echo smartyTranslate(array('s'=>'Apply amount discount for all products in pack','mod'=>'advbundle'),$_smarty_tpl);?>
</option>
					<option <?php if ($_smarty_tpl->tpl_vars['pack_data']->value['id_discount_type']==3) {?> selected="selected" <?php }?> value="3"><?php echo smartyTranslate(array('s'=>'Apply percent or amount discount for different products in pack','mod'=>'advbundle'),$_smarty_tpl);?>
</option>
				</select>
			</div>
		</div>
		<div id="all_percent" class="hiden form-group">
			<label class="control-label col-lg-3" for="all_percent_discount">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'Enter a fixed percentage discount for all the products of your pack','mod'=>'advbundle'),$_smarty_tpl);?>
">
					<?php echo smartyTranslate(array('s'=>'Percent amount for all products','mod'=>'advbundle'),$_smarty_tpl);?>

				</span>
			</label>
			<div class="col-lg-3">
				<div class="input-group">
					<input min="0" max="100" type="text" onchange="this.value = this.value.replace(/,/g, '.');" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack_data']->value['all_percent_discount'], ENT_QUOTES, 'UTF-8', true);?>
" id="all_percent_discount" name="all_percent_discount" class="all_percent_discount" maxlength="6">
					<span class="input-group-addon"> %</span>
				</div>
			</div>
		</div>
		<div id="all_price" class="hiden form-group">
			<label class="control-label col-lg-3" for="all_price_amount">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'Enter a fixed amount for your bundle','mod'=>'advbundle'),$_smarty_tpl);?>
">
					<?php echo smartyTranslate(array('s'=>'Price amount for all products','mod'=>'advbundle'),$_smarty_tpl);?>

				</span>
			</label>
			<div class="col-lg-3">
				<div class="input-group">
					<span class="input-group-addon"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bundle_currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>
					<input min="0" type="text" onchange="this.value = this.value.replace(/,/g, '.');" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack_data']->value['all_price_amount'], ENT_QUOTES, 'UTF-8', true);?>
" id="all_price_amount" name="all_price_amount" maxlength="14">
				</div>
			</div>
		</div>
		<div id="allow_remove" class="hiden form-group">
			<label class="control-label col-lg-3" for="allow_remove_item">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'Check this box if you want your customers to be able to remove a product from the pack. This option can only be enabled if you have more than 2 products into your pack and if discount type not amount on each product.','mod'=>'advbundle'),$_smarty_tpl);?>
">
					<?php echo smartyTranslate(array('s'=>'Allow item remove from bundle','mod'=>'advbundle'),$_smarty_tpl);?>

				</span>
			</label>
			<div class="col-lg-3">
				<div class="input-group">
					<input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['pack_data']->value['allow_remove_item']) {?> checked="checked" <?php }?> id="allow_remove_item" name="allow_remove_item" disabled="disabled">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3" for="bundle_ajax_product">
				<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'Select here the products that you want to add to your bundle','mod'=>'advbundle'),$_smarty_tpl);?>
">
					<?php echo smartyTranslate(array('s'=>'Add a new prodict to this bundle','mod'=>'advbundle'),$_smarty_tpl);?>

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
			<h4><?php echo smartyTranslate(array('s'=>'Bundle products','mod'=>'advbundle'),$_smarty_tpl);?>
</h4>
			<table id="" class=" bundle_table table_product_bundle table">
				<thead>
					<tr class="nodrag nodrop">
						<th class="center"><?php echo smartyTranslate(array('s'=>'Image','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
						<th class="left"><?php echo smartyTranslate(array('s'=>'Name','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
						<th class="center"><?php echo smartyTranslate(array('s'=>'Default combination','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
						<th class="center"><span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'If you want to only use specific combinations, check this box','mod'=>'advbundle'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Custom','mod'=>'advbundle'),$_smarty_tpl);?>
</span></th>
						<th class="center"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
						<th class="center"><?php echo smartyTranslate(array('s'=>'Price','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
						<th class="left bundle_amount_disc"><?php echo smartyTranslate(array('s'=>'Discount','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
						<th class="center"><?php echo smartyTranslate(array('s'=>'Remove','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pack_data']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
						<?php echo $_smarty_tpl->getSubTemplate ("./getlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="9" class="left"><em><?php echo smartyTranslate(array('s'=>'* All prices are without taxes','mod'=>'advbundle'),$_smarty_tpl);?>
</em></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="form-group bundle_prices">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				<?php echo $_smarty_tpl->getSubTemplate ("./prices.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('prices'=>$_smarty_tpl->tpl_vars['pack_data']->value['prices']), 0);?>

			</div>
		</div>
	</div>
	<!-- <div id="product-tab-content-wait" >
		<div id="loading"><i class="icon-refresh icon-spin"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'Loading...','mod'=>'advbundle'),$_smarty_tpl);?>
</div>
	</div> -->
	
		<div class="panel-footer">
			<a href="" class="btn btn-default"><i class="process-icon-cancel"></i><?php echo smartyTranslate(array('s'=>'Cancel','mod'=>'advbundle'),$_smarty_tpl);?>
</a>
			<button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Save','mod'=>'advbundle'),$_smarty_tpl);?>
</button>
			<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Save and Stay','mod'=>'advbundle'),$_smarty_tpl);?>
</button>
		</div>
	
	<input type="hidden" name="bundle_new" value="<?php echo intval($_smarty_tpl->tpl_vars['bundle_new']->value);?>
"/>
	<input type="hidden" name="bundle_update" value="<?php echo intval($_smarty_tpl->tpl_vars['bundle_update']->value);?>
"/>
	<input type="hidden" name="bundle_exclids" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['bundle_exclids']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
</div><?php }} ?>
