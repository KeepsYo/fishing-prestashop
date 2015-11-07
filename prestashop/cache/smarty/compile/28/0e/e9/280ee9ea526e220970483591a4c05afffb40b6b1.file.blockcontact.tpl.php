<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:37
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\themes\default-bootstrap\modules\blockcontact\blockcontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19016563cb6096796d3-90975631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '280ee9ea526e220970483591a4c05afffb40b6b1' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\modules\\blockcontact\\blockcontact.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19016563cb6096796d3-90975631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'telnumber' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb609697264_85195207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb609697264_85195207')) {function content_563cb609697264_85195207($_smarty_tpl) {?>

<div id="contact_block" class="block">
	<h4 class="title_block">
		<?php echo smartyTranslate(array('s'=>'Contact Us','mod'=>'blockcontact'),$_smarty_tpl);?>

	</h4>
	<div class="block_content clearfix">
		<p>
			<?php echo smartyTranslate(array('s'=>'Our support hotline is available 24/7.','mod'=>'blockcontact'),$_smarty_tpl);?>

		</p>
		<?php if ($_smarty_tpl->tpl_vars['telnumber']->value!='') {?>
			<p class="tel">
				<span class="label"><?php echo smartyTranslate(array('s'=>'Phone:','mod'=>'blockcontact'),$_smarty_tpl);?>
</span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['telnumber']->value, ENT_QUOTES, 'UTF-8', true);?>

			</p>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['email']->value!='') {?>
			<a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Contact our expert support team!','mod'=>'blockcontact'),$_smarty_tpl);?>
">
				<?php echo smartyTranslate(array('s'=>'Contact our expert support team!','mod'=>'blockcontact'),$_smarty_tpl);?>

			</a>
		<?php }?>
	</div>
</div><?php }} ?>
