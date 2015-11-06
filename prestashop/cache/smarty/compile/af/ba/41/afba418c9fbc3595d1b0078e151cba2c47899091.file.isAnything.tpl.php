<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:36:45
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/frontend/render/isAnything.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19070763465639dfbd6a53b5-22673352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afba418c9fbc3595d1b0078e151cba2c47899091' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/frontend/render/isAnything.tpl',
      1 => 1446633098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19070763465639dfbd6a53b5-22673352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'belvg_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639dfbd6bb2c2_90409616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639dfbd6bb2c2_90409616')) {function content_5639dfbd6bb2c2_90409616($_smarty_tpl) {?>

<div class="belvg_field_wrapper form-group">
<label for="customer_fc_<?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['name'];?>
 <?php if (($_smarty_tpl->tpl_vars['belvg_field']->value['is_require'])) {?><sup class="belvg_fastcheckout_required">*</sup><?php }?></label>
<textarea class="form-control" name="customer_fc_<?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'];?>
" id="customer_fc_<?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'];?>
"><?php if (isset($_POST[('customer_fc_').($_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'])])) {?><?php echo htmlspecialchars($_POST[('customer_fc_').($_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'])], ENT_QUOTES, 'UTF-8', true);?>
<?php }?></textarea>
</div>
<?php }} ?>
