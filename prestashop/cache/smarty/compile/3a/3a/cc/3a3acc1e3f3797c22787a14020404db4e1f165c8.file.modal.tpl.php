<?php /* Smarty version Smarty-3.1.19, created on 2015-11-07 09:25:03
         compiled from "d:\Works\Verstka\fishing-prestashop\prestashop\admin077kqvuc3\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10520563d993fce50a9-41776530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a3acc1e3f3797c22787a14020404db4e1f165c8' => 
    array (
      0 => 'd:\\Works\\Verstka\\fishing-prestashop\\prestashop\\admin077kqvuc3\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1446128212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10520563d993fce50a9-41776530',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563d993fce8a30_02235969',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563d993fce8a30_02235969')) {function content_563d993fce8a30_02235969($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
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
