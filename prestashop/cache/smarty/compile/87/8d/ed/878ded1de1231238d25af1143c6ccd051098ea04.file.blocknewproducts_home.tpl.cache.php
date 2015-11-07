<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 13:35:05
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\modules\blocknewproducts\views\templates\hook\blocknewproducts_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14902563cf2d98e0437-19078509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '878ded1de1231238d25af1143c6ccd051098ea04' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\modules\\blocknewproducts\\views\\templates\\hook\\blocknewproducts_home.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14902563cf2d98e0437-19078509',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cf2d98f8c61_92379363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cf2d98f8c61_92379363')) {function content_563cf2d98f8c61_92379363($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['new_products']->value)&&$_smarty_tpl->tpl_vars['new_products']->value) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('products'=>$_smarty_tpl->tpl_vars['new_products']->value,'class'=>'blocknewproducts tab-pane','id'=>'blocknewproducts'), 0);?>

<?php } else { ?>
<ul id="blocknewproducts" class="blocknewproducts tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No new products at this time.','mod'=>'blocknewproducts'),$_smarty_tpl);?>
</li>
</ul>
<?php }?>
<?php }} ?>
