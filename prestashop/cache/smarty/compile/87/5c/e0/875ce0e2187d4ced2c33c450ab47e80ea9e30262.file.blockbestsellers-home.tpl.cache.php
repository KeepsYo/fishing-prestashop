<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 14:12:23
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\themes\default-bootstrap\modules\blockbestsellers\blockbestsellers-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29249563cfb97d48dd0-12398972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '875ce0e2187d4ced2c33c450ab47e80ea9e30262' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\modules\\blockbestsellers\\blockbestsellers-home.tpl',
      1 => 1446787208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29249563cfb97d48dd0-12398972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'best_sellers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cfb97dc1193_74089766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cfb97dc1193_74089766')) {function content_563cfb97dc1193_74089766($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['best_sellers']->value)&&$_smarty_tpl->tpl_vars['best_sellers']->value) {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('products'=>$_smarty_tpl->tpl_vars['best_sellers']->value,'class'=>'blockbestsellers tab-pane','id'=>'blockbestsellers'), 0);?>

<?php } else { ?>
<ul id="blockbestsellers" class="blockbestsellers tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No best sellers at this time.','mod'=>'blockbestsellers'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>
