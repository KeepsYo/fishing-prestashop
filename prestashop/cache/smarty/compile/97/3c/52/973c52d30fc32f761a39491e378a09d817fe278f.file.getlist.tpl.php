<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:49:04
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/admin/getlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12292799535639e2a0ea6672-29192204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '973c52d30fc32f761a39491e378a09d817fe278f' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/admin/getlist.tpl',
      1 => 1444485529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12292799535639e2a0ea6672-29192204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'bundle_currency' => 0,
    'comb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639e2a1036e85_98511812',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639e2a1036e85_98511812')) {function content_5639e2a1036e85_98511812($_smarty_tpl) {?>

<tr id="bundle_product_line_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" class="bundle_product_line" data-id_product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" style="cursor:move;">
	<td class="center">
		<img width="60" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['image'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" class="imgm img-thumbnail">
	</td>
	<td>
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['href'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" title="Edit this product"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</strong></a><br>
		<em>
			<?php echo smartyTranslate(array('s'=>'Ref:','mod'=>'advbundle'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8', true);?>
<br>
			<?php echo smartyTranslate(array('s'=>'Stock:','mod'=>'advbundle'),$_smarty_tpl);?>
 <?php echo intval($_smarty_tpl->tpl_vars['product']->value['quantity']);?>
<br>
			<?php echo smartyTranslate(array('s'=>'Sales:','mod'=>'advbundle'),$_smarty_tpl);?>
 <?php echo intval($_smarty_tpl->tpl_vars['product']->value['sale']);?>

		</em>
	</td>
	<td class="center comb_name_default">
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['comb_default'], ENT_QUOTES, 'UTF-8', true);?>

	</td>
	<td class="center">
		<?php if (count($_smarty_tpl->tpl_vars['product']->value['combinations'])) {?>
			<input type="checkbox" value="1" id="custom_combination" class="custom_combination" data-idp="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" <?php if (isset($_smarty_tpl->tpl_vars['product']->value['custom_combination'])&&$_smarty_tpl->tpl_vars['product']->value['custom_combination']) {?> checked="checked" <?php }?> name="custom_combination_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
		<?php } else { ?>
			<?php echo smartyTranslate(array('s'=>'---','mod'=>'advbundle'),$_smarty_tpl);?>

		<?php }?>
	</td>
	<td class="center">
		<input type="hidden" name="bundle_productList[]" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
		<!-- <input type="hidden" name="originalIdProduct-26" value="32"> -->
		<input type="text" required="required" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['qty_item'];?>
" size="2" id="bundle_quantity_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" name="bundle_quantity_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" min="1" class="bundle_quantity">
	</td>
	<td class="product_price_container center">
		<span class="product_current-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_excl']),$_smarty_tpl);?>
</span>
	</td>
	<td class="bundle_amount_disc">
		<input min="0" class="bundle_reduction_amount" type="text" required="required" onchange="this.value = this.value.replace(/,/g, '.');" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
" size="2" id="bundle_reduction_amount_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" name="bundle_reduction_amount_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" maxlength="14">
		<select class="bundle_disc_type" name="bundle_disc_type_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" id="bundle_disc_type_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
			<option value="percent" <?php if ($_smarty_tpl->tpl_vars['product']->value['disc_type']=='percent') {?> selected="selected" <?php }?>><?php echo smartyTranslate(array('s'=>'%','mod'=>'advbundle'),$_smarty_tpl);?>
</option>
			<option value="amount" <?php if ($_smarty_tpl->tpl_vars['product']->value['disc_type']=='amount') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['bundle_currency']->value->sign;?>
</option>
		</select>
	</td>
	<td class="center">
		<button data-id_product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" id="bundle_remove" class="btn btn-default bundle_remove" type="button"><i class="icon-trash"></i></button>
	</td>
</tr>
<?php if (count($_smarty_tpl->tpl_vars['product']->value['combinations'])) {?>
<tr id="combination_container_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" class="nodrag nodrop combination_container" data-id_product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" style="display:none">
	<td colspan="10">
		<table id="bundle_combination_table_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" class="table configuration">
			<thead>
				<tr class="nodrag nodrop">
					<th class="center"><input type="checkbox" id="include_all" class="include_all" data-id-product-pack="28"></th>
					<th class="center"><?php echo smartyTranslate(array('s'=>'Default combination','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
					<th class="left"><?php echo smartyTranslate(array('s'=>'Combination name','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
					<th class="left"><?php echo smartyTranslate(array('s'=>'Price impact','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
					<th class="left"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
					<th class="left"><?php echo smartyTranslate(array('s'=>'EAN 13','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
					<th class="center"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'advbundle'),$_smarty_tpl);?>
</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['comb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['combinations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comb']->key => $_smarty_tpl->tpl_vars['comb']->value) {
$_smarty_tpl->tpl_vars['comb']->_loop = true;
?>
				<tr id="advbundle_combination_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
" class="nodrag nodrop <?php if ($_smarty_tpl->tpl_vars['comb']->value['default_on']) {?>default_on<?php }?>">
					<td class="center">
						<input type="checkbox" <?php if (in_array($_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'],$_smarty_tpl->tpl_vars['product']->value['selected_array'])) {?> checked="checked" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
" id="advbundle_combination_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
" <?php if ($_smarty_tpl->tpl_vars['product']->value['def_id']==$_smarty_tpl->tpl_vars['comb']->value['id_product_attribute']) {?> checked="checked" <?php }?> name="include_comb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
[]" class="include_comb" data-idp="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" data-ipa="<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
">
					</td>
					<td class="center">
						<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
" id="advbundle_combination_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
" <?php if ($_smarty_tpl->tpl_vars['comb']->value['default_on']) {?>checked="checked" <?php }?> name="def_combination_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" class="def_comb" data-id-product-pack="28" data-ipa="<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_product_attribute'];?>
">
					</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comb']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
					<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['comb']->value['unit_impact']),$_smarty_tpl);?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comb']->value['reference'], ENT_QUOTES, 'UTF-8', true);?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comb']->value['ean13'], ENT_QUOTES, 'UTF-8', true);?>
</td>
					<td class="center">
						<span class="badge badge-danger"><?php echo intval($_smarty_tpl->tpl_vars['comb']->value['quantity']);?>
</span>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</td>
</tr>
<?php }?><?php }} ?>
