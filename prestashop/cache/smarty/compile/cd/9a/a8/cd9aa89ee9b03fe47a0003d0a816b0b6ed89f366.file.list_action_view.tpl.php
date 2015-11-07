<?php /* Smarty version Smarty-3.1.19, created on 2015-11-07 10:09:22
         compiled from "/home/a/alintond/fishing-equipment/public_html/admin9945/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1121635790563da3a2c204b7-89231332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd9aa89ee9b03fe47a0003d0a816b0b6ed89f366' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/admin9945/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1444479761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1121635790563da3a2c204b7-89231332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563da3a2c2ac75_51646581',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563da3a2c2ac75_51646581')) {function content_563da3a2c2ac75_51646581($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" >
	<i class="icon-search-plus"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
