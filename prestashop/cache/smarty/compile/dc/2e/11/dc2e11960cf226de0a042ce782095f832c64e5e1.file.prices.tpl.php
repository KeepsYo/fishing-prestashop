<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:49:05
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/admin/prices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1288543635639e2a103ce33-90281499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc2e11960cf226de0a042ce782095f832c64e5e1' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/admin/prices.tpl',
      1 => 1444485529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1288543635639e2a103ce33-90281499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prices' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639e2a10610c1_02321388',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639e2a10610c1_02321388')) {function content_5639e2a10610c1_02321388($_smarty_tpl) {?>

<div id="bundle_price_container">
	<table class="table">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th class="text-right"><strong><?php echo smartyTranslate(array('s'=>'Percent disc.','mod'=>'advbundle'),$_smarty_tpl);?>
</strong></th>
				<th class="text-right"><strong><?php echo smartyTranslate(array('s'=>'Tax excl.','mod'=>'advbundle'),$_smarty_tpl);?>
</strong></th>
				<th class="text-right"><strong><?php echo smartyTranslate(array('s'=>'Tax incl.','mod'=>'advbundle'),$_smarty_tpl);?>
</strong></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo smartyTranslate(array('s'=>'Bundle clear price:','mod'=>'advbundle'),$_smarty_tpl);?>
</td>
				<td>&nbsp;</td>
				<td class="text-right"><span class="badge bundle_original_excl"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['original_excl']),$_smarty_tpl);?>
</span></td>
				<td class="text-right"><span class="badge bundle_original_incl"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['original_incl']),$_smarty_tpl);?>
</span></td>
			</tr>
			<tr>
				<td><?php echo smartyTranslate(array('s'=>'Discounts:','mod'=>'advbundle'),$_smarty_tpl);?>
</td>
				<td class="center bundle_percent">-<?php echo floatval($_smarty_tpl->tpl_vars['prices']->value['percent_disc']);?>
%</td>
				<td class="text-right"><span class="badge badge-warning bundle_disc_excl"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['disc_excl']),$_smarty_tpl);?>
</span></td>
				<td class="text-right"><span class="badge badge-warning bundle_disc_incl"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['disc_incl']),$_smarty_tpl);?>
</span></td>
			</tr>
									<tr>
				<td><strong><?php echo smartyTranslate(array('s'=>'Final bundle price','mod'=>'advbundle'),$_smarty_tpl);?>
</strong></td>
				<td>&nbsp;</td>
				<td class="text-right"><span class="badge badge-success bundle_final_excl"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['final_excl']),$_smarty_tpl);?>
</span></td>
				<td class="text-right"><span class="badge badge-success bundle_final_incl"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['prices']->value['final_incl']),$_smarty_tpl);?>
</span></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="9" class="left"><em><?php echo smartyTranslate(array('s'=>'* If the final price will be less than or equal to 0, then the set will cost free for users!','mod'=>'advbundle'),$_smarty_tpl);?>
</em></td>
			</tr>
		</tfoot>
	</table>
</div><?php }} ?>
