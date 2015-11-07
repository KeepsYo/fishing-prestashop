<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:33
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\themes\default-bootstrap\category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3815563cb605128d61-80551882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b357d1996ba7597d36c979417eb7e3c0c34e58' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\category-count.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3815563cb605128d61-80551882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb605152768_48776683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb605152768_48776683')) {function content_563cb605152768_48776683($_smarty_tpl) {?>
<span class="heading-counter"><?php if ((isset($_smarty_tpl->tpl_vars['category']->value)&&$_smarty_tpl->tpl_vars['category']->value->id==1)||(isset($_smarty_tpl->tpl_vars['nb_products']->value)&&$_smarty_tpl->tpl_vars['nb_products']->value==0)) {?><?php echo smartyTranslate(array('s'=>'There are no products in this category.'),$_smarty_tpl);?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['nb_products']->value)&&$_smarty_tpl->tpl_vars['nb_products']->value==1) {?><?php echo smartyTranslate(array('s'=>'There is 1 product.'),$_smarty_tpl);?>
<?php } elseif (isset($_smarty_tpl->tpl_vars['nb_products']->value)) {?><?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>
<?php }?><?php }?></span>
<?php }} ?>
