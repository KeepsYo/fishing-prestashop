<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 17:20:06
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1144926788563a14164145a6-16353791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd6d928bb94bd97c88848aa27c70cc8ecbecfc63' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/advbundle/views/templates/front/css.tpl',
      1 => 1444485529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1144926788563a14164145a6-16353791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BUNDLE_COLOR_MAIN' => 0,
    'BUNDLE_COLOR_BUTTON' => 0,
    'BUNDLE_COLOR_BUTTON_BORDER' => 0,
    'BUNDLE_COLOR_BUTTONH' => 0,
    'BUNDLE_COLOR_BUTTON_BORDERH' => 0,
    'BUNDLE_COLOR_VBUTTON' => 0,
    'BUNDLE_COLOR_VBUTTON_BORDER' => 0,
    'BUNDLE_COLOR_VBUTTONH' => 0,
    'BUNDLE_COLOR_VBUTTON_BORDERH' => 0,
    'BUNDLE_COLOR_ELEMENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563a141645d917_23134081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563a141645d917_23134081')) {function content_563a141645d917_23134081($_smarty_tpl) {?>

<style>
.adv-main-container {
	border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_MAIN']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-tabs .adv-nav-tabs > li.adv-active > a,
.adv-tabs .adv-nav-tabs > li.adv-active > a:hover,
.adv-tabs .adv-nav-tabs > li.adv-active > a:focus {
	border-top: 2px solid <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_MAIN']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.opc-spinner {
	border-top: 5px solid <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_MAIN']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-form-control:hover {
    border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_MAIN']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-btn-cart {
    background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_BUTTON']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
    border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_BUTTON_BORDER']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-btn-cart:hover,
.adv-btn-cart:focus,
.adv-btn-cart:active,
.adv-btn-cart.active {
    background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_BUTTONH']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
    border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_BUTTON_BORDERH']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-btn-view {
    background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_VBUTTON']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
    border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_VBUTTON_BORDER']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
	width: 100%;
	font-size: 22px;
}

.adv-btn-view:hover,
.adv-btn-view:focus,
.adv-btn-view:active,
.adv-btn-view.active {
    background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_VBUTTONH']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
    border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_VBUTTON_BORDERH']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-radio input[type=radio]:checked+label:before, .adv-radio input[type=radio]:hover+label:before {
    border-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_ELEMENT']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.adv-radio label:after {
    background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_ELEMENT']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
    border: 1px solid <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_ELEMENT']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
}


/*.adv-checkbox-nice label:after {
	border: 6px solid <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_ELEMENT']->value, ENT_QUOTES, 'UTF-8', true);?>
 !important;
	border-radius: 50%;
	height: 12px;
	top: 6px;
	left: 6px;
}*/

.adv-checkbox-nice label:after {
	height: 7px;
	top: 7px;
	left: 6px;
	border: 3px solid <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['BUNDLE_COLOR_ELEMENT']->value, ENT_QUOTES, 'UTF-8', true);?>
;
	border-top: none;
	border-right: none;
	transform: rotate(-45deg);
}

</style><?php }} ?>
