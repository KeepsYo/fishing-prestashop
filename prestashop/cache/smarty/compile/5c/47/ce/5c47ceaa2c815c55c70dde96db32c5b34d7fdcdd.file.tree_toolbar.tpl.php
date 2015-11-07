<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 17:18:00
         compiled from "/home/a/alintond/fishing-equipment/public_html/admin9945/themes/default/template/controllers/products/helpers/tree/tree_toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1190858000563a1398a51744-89252990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c47ceaa2c815c55c70dde96db32c5b34d7fdcdd' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/admin9945/themes/default/template/controllers/products/helpers/tree/tree_toolbar.tpl',
      1 => 1444479761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1190858000563a1398a51744-89252990',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'actions' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563a1398a5d468_09277897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563a1398a5d468_09277897')) {function content_563a1398a5d468_09277897($_smarty_tpl) {?>
<div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php } ?>
	<?php }?>
</div><?php }} ?>
