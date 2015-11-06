<?php /* Smarty version Smarty-3.1.19, created on 2015-11-05 11:59:02
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/blockpaymentlogo/blockpaymentlogo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1530376743563b1a565a6a71-10598926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd31b1a143585c96d7179cbf7ac3dd8d8e5694c95' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/blockpaymentlogo/blockpaymentlogo.tpl',
      1 => 1444479762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1530376743563b1a565a6a71-10598926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_payement_logo' => 0,
    'link' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563b1a565b9f79_94979444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563b1a565b9f79_94979444')) {function content_563b1a565b9f79_94979444($_smarty_tpl) {?>

<!-- Block payment logo module -->
<div id="paiement_logo_block_left" class="paiement_logo_block">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink($_smarty_tpl->tpl_vars['cms_payement_logo']->value), ENT_QUOTES, 'UTF-8', true);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
logo_paiement_visa.jpg" alt="visa" width="33" height="21" />
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
logo_paiement_mastercard.jpg" alt="mastercard" width="32" height="21" />
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
logo_paiement_paypal.jpg" alt="paypal" width="61" height="21" />
	</a>
</div>
<!-- /Block payment logo module --><?php }} ?>
