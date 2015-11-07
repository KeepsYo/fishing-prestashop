<?php /* Smarty version Smarty-3.1.19, created on 2015-11-07 16:31:54
         compiled from "D:\Works\Verstka\fishing-prestashop\prestashop\modules\blockfacebook\blockfacebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29608563e51aad7ad55-71107395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f320582391ea0dc21050ef760e192e3c8bc8c1de' => 
    array (
      0 => 'D:\\Works\\Verstka\\fishing-prestashop\\prestashop\\modules\\blockfacebook\\blockfacebook.tpl',
      1 => 1406810506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29608563e51aad7ad55-71107395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebookurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563e51aad87eb1_26261031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563e51aad87eb1_26261031')) {function content_563e51aad87eb1_26261031($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['facebookurl']->value!='') {?>
<div id="fb-root"></div>
<div id="facebook_block" class="col-xs-4">
	<h4 ><?php echo smartyTranslate(array('s'=>'Follow us on Facebook','mod'=>'blockfacebook'),$_smarty_tpl);?>
</h4>
	<div class="facebook-fanbox">
		<div class="fb-like-box" data-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facebookurl']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false">
		</div>
	</div>
</div>
<?php }?>
<?php }} ?>
