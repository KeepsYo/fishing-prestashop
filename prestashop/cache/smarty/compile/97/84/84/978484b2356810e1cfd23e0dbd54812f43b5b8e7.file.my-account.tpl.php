<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:40
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\themes\default-bootstrap\modules\blockwishlist\my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23755563cb60c551341-16406304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '978484b2356810e1cfd23e0dbd54812f43b5b8e7' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\modules\\blockwishlist\\my-account.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23755563cb60c551341-16406304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb60c568b65_40417416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb60c568b65_40417416')) {function content_563cb60c568b65_40417416($_smarty_tpl) {?>

<!-- MODULE WishList -->
<li class="lnk_wishlist">
	<a 	href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<i class="icon-heart"></i>
		<span><?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
</span>
	</a>
</li>
<!-- END : MODULE WishList --><?php }} ?>
