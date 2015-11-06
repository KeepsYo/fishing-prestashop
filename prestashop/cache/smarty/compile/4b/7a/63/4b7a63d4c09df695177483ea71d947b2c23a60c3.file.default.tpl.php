<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:36:45
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/frontend/render/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10450235545639dfbd67f2c5-04192665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b7a63d4c09df695177483ea71d947b2c23a60c3' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/frontend/render/default.tpl',
      1 => 1446633098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10450235545639dfbd67f2c5-04192665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'belvg_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639dfbd69fa30_24299083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639dfbd69fa30_24299083')) {function content_5639dfbd69fa30_24299083($_smarty_tpl) {?>

<div class="belvg_field_wrapper form-group">
    <label for="customer_fc_<?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['name'];?>
 <?php if (($_smarty_tpl->tpl_vars['belvg_field']->value['is_require'])) {?><sup class="belvg_fastcheckout_required">*</sup><?php }?></label>
    <input type="text" class="form-control" name="customer_fc_<?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'];?>
" id="customer_fc_<?php echo $_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'];?>
" value="<?php if (isset($_POST[('customer_fc_').($_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'])])) {?><?php echo htmlspecialchars($_POST[('customer_fc_').($_smarty_tpl->tpl_vars['belvg_field']->value['admin_name'])], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" />
</div>
<?php }} ?>
