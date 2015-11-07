<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 13:35:53
         compiled from "d:\Works\Lessons\prestashop-less\prestashop\admin141orpqdn\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25152563cf3097ae839-90279912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52c10962855edc929815065a6c7925a2a9310062' => 
    array (
      0 => 'd:\\Works\\Lessons\\prestashop-less\\prestashop\\admin141orpqdn\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1446128212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25152563cf3097ae839-90279912',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cf3097b23b0_44928304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cf3097b23b0_44928304')) {function content_563cf3097b23b0_44928304($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
