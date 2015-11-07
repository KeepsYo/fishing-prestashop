<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 17:20:06
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1541392019563a14161cecd9-72125915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd490ea4d48cc14588b7e1fcd2c53fa57015873a' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/tab.tpl',
      1 => 1444485530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1541392019563a14161cecd9-72125915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tab' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563a14161d7c57_61180418',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563a14161d7c57_61180418')) {function content_563a14161d7c57_61180418($_smarty_tpl) {?>

<?php if (!$_smarty_tpl->tpl_vars['tab']->value) {?>
	<h3 id="#idTab098" class="idTab098 idTabHrefShort page-product-heading"><?php echo smartyTranslate(array('s'=>'Pack product','mod'=>'advbundle'),$_smarty_tpl);?>
</h3>
<?php } else { ?>
	<li><a href="#idTab098" data-toggle="tab"><?php echo smartyTranslate(array('s'=>'Pack product','mod'=>'advbundle'),$_smarty_tpl);?>
</a></li>
<?php }?><?php }} ?>
