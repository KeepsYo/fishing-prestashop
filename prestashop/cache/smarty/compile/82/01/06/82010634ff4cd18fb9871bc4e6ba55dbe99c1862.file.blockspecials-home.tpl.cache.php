<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 13:35:07
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\modules\blockspecials\views\templates\hook\blockspecials-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9683563cf2db2ebd81-72890219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82010634ff4cd18fb9871bc4e6ba55dbe99c1862' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\modules\\blockspecials\\views\\templates\\hook\\blockspecials-home.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9683563cf2db2ebd81-72890219',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'specials' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cf2db317451_23955884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cf2db317451_23955884')) {function content_563cf2db317451_23955884($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['specials']->value)&&$_smarty_tpl->tpl_vars['specials']->value) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('products'=>$_smarty_tpl->tpl_vars['specials']->value,'class'=>'blockspecials tab-pane','id'=>'blockspecials'), 0);?>

<?php } else { ?>
<ul id="blockspecials" class="blockspecials tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No special products at this time.','mod'=>'blockspecials'),$_smarty_tpl);?>
</li>
</ul>
<?php }?>
<?php }} ?>
