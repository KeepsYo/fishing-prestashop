<?php /* Smarty version Smarty-3.1.19, created on 2015-11-05 11:59:04
         compiled from "/home/a/alintond/fishing-equipment/public_html/themes/default-bootstrap/modules/blockcallback/blockcallback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1074432561563b1a5886e614-24657368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24874884f19b592abfca30e8c504473f518d180e' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/themes/default-bootstrap/modules/blockcallback/blockcallback.tpl',
      1 => 1444489741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1074432561563b1a5886e614-24657368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockcallback_msg' => 0,
    'blockcallback_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563b1a5888f0c9_14444681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563b1a5888f0c9_14444681')) {function content_563b1a5888f0c9_14444681($_smarty_tpl) {?>
<script type="text/javascript">
jQuery('#form_callback').submit(function()
{
	if( jQuery("input[name=BlockCallbackPhone]").val().lenght < 17 )
	{
		alert('Номер телефона заполнен не корректно!');
		return false;
	}
	if( jQuery("input[name=BlockCallbackName]").val().lenght < 1 )
	{
		alert('Заполните пожалуйста имя!');
		return false;
	}
});

function show_callbackmessage($msg)
{
	if(typeof $msg != undefined && $msg.length > 0) //Проверяем отправлена ли форма
	{
		jQuery.fancybox('<h2>Ваша заявка принята. Наш менеджер свяжется с вами в ближайшее время</h2>');
		
	}
}
</script>

<!-- Block blockcallback -->


<div class="blockcallback_block_left">
    <a class="callback-js" rel="nofollow">Обратный звонок</a>
    <div class="callback-popup">
        <div class="h4">Оставьте заявку</div>
        <p>и наш менеджер свяжется с<br>Вами в ближайшее время</p>
        <div class="block_content">
            <form id="form_callback" action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post">
            <?php if (!empty($_smarty_tpl->tpl_vars['blockcallback_msg']->value)) {?>
				<script type="text/javascript">
					show_callbackmessage("<?php echo $_smarty_tpl->tpl_vars['blockcallback_msg']->value;?>
");
				</script>
                <p class="<?php if (isset($_smarty_tpl->tpl_vars['blockcallback_error']->value)&&$_smarty_tpl->tpl_vars['blockcallback_error']->value) {?>blockcallback_error<?php } else { ?>blockcallback_success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['blockcallback_msg']->value;?>
</p>
            <?php }?>
                

                

                <input name="BlockCallbackName" value="<?php if (isset($_smarty_tpl->tpl_vars['blockcallback_error']->value)&&$_smarty_tpl->tpl_vars['blockcallback_error']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_POST['BlockCallbackName'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" type="text" placeholder="Ваше имя" required/>

                <input name="BlockCallbackPhone" value="<?php if (isset($_smarty_tpl->tpl_vars['blockcallback_error']->value)&&$_smarty_tpl->tpl_vars['blockcallback_error']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_POST['BlockCallbackPhone'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" type="tel" placeholder="Телефон" pattern="\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required/>

                <button type="submit" class="button-green" name="submitBlockCallback">Отправить</button>
            </form>
        </div>
    </div>
</div>
<!-- /Block blockcallback -->
<?php }} ?>
