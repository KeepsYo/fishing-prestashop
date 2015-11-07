<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:37
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\admin\themes\default\template\controllers\not_found\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16207563cb6098b5e63-61006042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '051c18bc69fe51b3a8a9da6b2794525ebc9fddf6' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\admin\\themes\\default\\template\\controllers\\not_found\\content.tpl',
      1 => 1446128212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16207563cb6098b5e63-61006042',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb6098ce111_20541268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb6098ce111_20541268')) {function content_563cb6098ce111_20541268($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['controller']->value)&&!empty($_smarty_tpl->tpl_vars['controller']->value)&&$_smarty_tpl->tpl_vars['controller']->value!='adminnotfound') {?>
	<h1><?php echo smartyTranslate(array('s'=>'The controller %s is missing or invalid.','sprintf'=>$_smarty_tpl->tpl_vars['controller']->value),$_smarty_tpl);?>
</h1>
<?php }?>
<a class="btn btn-default" href="javascript:window.history.back();">
	<i class="icon-arrow-left"></i>
	<?php echo smartyTranslate(array('s'=>'Back to the previous page'),$_smarty_tpl);?>

</a>
<a class="btn btn-default" href="index.php">
	<i class="icon-dashboard"></i>
	<?php echo smartyTranslate(array('s'=>'Go to the dashboard'),$_smarty_tpl);?>

</a><?php }} ?>
