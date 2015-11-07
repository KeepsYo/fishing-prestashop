<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:58
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\admin\themes\default\template\helpers\list\list_action_supply_order_receipt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2026563cb61e624702-15298374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd67a85a9493694897de30314ac09fbc03866956' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\admin\\themes\\default\\template\\helpers\\list\\list_action_supply_order_receipt.tpl',
      1 => 1446128212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2026563cb61e624702-15298374',
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
  'unifunc' => 'content_563cb61e6397b3_31723215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb61e6397b3_31723215')) {function content_563cb61e6397b3_31723215($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="edit btn btn-default" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
">
	<i class="icon-truck"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
