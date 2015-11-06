<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:36:46
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/templates/hook/payment_return.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10864905265639dfbe426d89-70388828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a5235ef0d5740841f8a4134ec7ef0153d866bae' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/templates/hook/payment_return.tpl',
      1 => 1446633099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10864905265639dfbe426d89-70388828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'shop_name' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639dfbe447508_98294832',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639dfbe447508_98294832')) {function content_5639dfbe447508_98294832($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['status']->value=='ok') {?>
	<p><?php echo smartyTranslate(array('s'=>'Your order on','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</span> <?php echo smartyTranslate(array('s'=>'is complete.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

		<br /><br />
		<?php echo smartyTranslate(array('s'=>'Soon our manager contact you:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>


		<br /><br /><?php echo smartyTranslate(array('s'=>'An e-mail has been sent to you with this information.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

		<br /><br /><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
"><?php echo smartyTranslate(array('s'=>'customer support','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</a>.
	</p>
<?php } else { ?>
	<p class="warning">
		<?php echo smartyTranslate(array('s'=>'We noticed a problem with your order. If you think this is an error, you can contact our','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
 
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
"><?php echo smartyTranslate(array('s'=>'customer support','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</a>.
	</p>
<?php }?>
<?php }} ?>
