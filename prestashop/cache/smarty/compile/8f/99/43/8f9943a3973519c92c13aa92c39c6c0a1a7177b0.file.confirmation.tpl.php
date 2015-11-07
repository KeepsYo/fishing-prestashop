<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 17:15:41
         compiled from "D:\Works\Lessons\prestashop-less\prestashop\themes\default-bootstrap\modules\cashondelivery\views\templates\hook\confirmation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1010563cb60d563b01-12395039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f9943a3973519c92c13aa92c39c6c0a1a7177b0' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\modules\\cashondelivery\\views\\templates\\hook\\confirmation.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1010563cb60d563b01-12395039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop_name' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cb60d585876_75080615',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cb60d585876_75080615')) {function content_563cb60d585876_75080615($_smarty_tpl) {?>
<div class="box">
    <p><?php echo smartyTranslate(array('s'=>'Your order on','mod'=>'cashondelivery'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</span> <?php echo smartyTranslate(array('s'=>'is complete.','mod'=>'cashondelivery'),$_smarty_tpl);?>

        <br />
        <?php echo smartyTranslate(array('s'=>'You have chosen the cash on delivery method.','mod'=>'cashondelivery'),$_smarty_tpl);?>

        <br /><span class="bold"><?php echo smartyTranslate(array('s'=>'Your order will be sent very soon.','mod'=>'cashondelivery'),$_smarty_tpl);?>
</span>
        <br /><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'cashondelivery'),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact-form',true), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smartyTranslate(array('s'=>'customer support','mod'=>'cashondelivery'),$_smarty_tpl);?>
</a>.
    </p>
</div><?php }} ?>
