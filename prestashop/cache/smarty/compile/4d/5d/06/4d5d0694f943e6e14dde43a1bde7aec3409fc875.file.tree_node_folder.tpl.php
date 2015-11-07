<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:16:04
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\admin\themes\default\template\helpers\tree\tree_node_folder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19174563cb62429bbc5-30105399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d5d0694f943e6e14dde43a1bde7aec3409fc875' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\admin\\themes\\default\\template\\helpers\\tree\\tree_node_folder.tpl',
      1 => 1446128212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19174563cb62429bbc5-30105399',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
    'children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb6242a8ad0_21514046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb6242a8ad0_21514046')) {function content_563cb6242a8ad0_21514046($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\tools\\smarty\\plugins\\modifier.escape.php';
?>
<li class="tree-folder">
	<span class="tree-folder-name">
		<i class="icon-folder-close"></i>
		<label class="tree-toggler"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</label>
	</span>
	<ul class="tree">
		<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['children']->value, 'UTF-8');?>

	</ul>
</li><?php }} ?>
