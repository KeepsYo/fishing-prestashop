<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:59
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\themes\default-bootstrap\product-list-colors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17573563cb61fbc6057-45673113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3f123bcf26afe6bf91f185a9d1ed9f6d088215c' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\product-list-colors.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17573563cb61fbc6057-45673113',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'colors_list' => 0,
    'col_img_dir' => 0,
    'color' => 0,
    'link' => 0,
    'img_color_exists' => 0,
    'img_col_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb61fc361f5_09988290',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb61fc361f5_09988290')) {function content_563cb61fc361f5_09988290($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['colors_list']->value)) {?>
<ul class="color_to_pick_list clearfix">
	<?php  $_smarty_tpl->tpl_vars['color'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['color']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['colors_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['color']->key => $_smarty_tpl->tpl_vars['color']->value) {
$_smarty_tpl->tpl_vars['color']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['col_img_dir']->value)) {?>
			<?php $_smarty_tpl->tpl_vars['img_color_exists'] = new Smarty_variable(file_exists((($_smarty_tpl->tpl_vars['col_img_dir']->value).($_smarty_tpl->tpl_vars['color']->value['id_attribute'])).('.jpg')), null, 0);?>
			<li>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['color']->value['id_product'],null,null,null,null,null,$_smarty_tpl->tpl_vars['color']->value['id_product_attribute'],Configuration::get('PS_REWRITING_SETTINGS'),false,true), ENT_QUOTES, 'UTF-8', true);?>
" id="color_<?php echo intval($_smarty_tpl->tpl_vars['color']->value['id_product_attribute']);?>
" class="color_pick"<?php if (!$_smarty_tpl->tpl_vars['img_color_exists']->value&&isset($_smarty_tpl->tpl_vars['color']->value['color'])&&$_smarty_tpl->tpl_vars['color']->value['color']) {?> style="background:<?php echo $_smarty_tpl->tpl_vars['color']->value['color'];?>
;"<?php }?>>
					<?php if ($_smarty_tpl->tpl_vars['img_color_exists']->value) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['img_col_dir']->value;?>
<?php echo intval($_smarty_tpl->tpl_vars['color']->value['id_attribute']);?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['color']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['color']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="20" height="20" />
					<?php }?>
				</a>
			</li>
		<?php }?>
	<?php } ?>
</ul>
<?php }?>
<?php }} ?>
