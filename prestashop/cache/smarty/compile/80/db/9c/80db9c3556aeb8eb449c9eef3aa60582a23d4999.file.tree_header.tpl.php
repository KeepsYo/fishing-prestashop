<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 17:38:31
         compiled from "/home/a/alintond/fishing-equipment/public_html/admin9945/themes/default/template/helpers/tree/tree_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1034403087563a1867c9cdc8-37669604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80db9c3556aeb8eb449c9eef3aa60582a23d4999' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/admin9945/themes/default/template/helpers/tree/tree_header.tpl',
      1 => 1444479761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1034403087563a1867c9cdc8-37669604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'toolbar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563a1867ca6c06_59081656',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563a1867ca6c06_59081656')) {function content_563a1867ca6c06_59081656($_smarty_tpl) {?>
<div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl);?>
<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['toolbar']->value;?>
<?php }?>
</div><?php }} ?>
