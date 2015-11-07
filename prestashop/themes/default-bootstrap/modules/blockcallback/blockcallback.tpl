{literal}
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
{/literal}
<!-- Block blockcallback -->

{*<div id="blockcallback_block_left">*}
<div class="blockcallback_block_left">
    <a class="callback-js" rel="nofollow">Обратный звонок</a>
    <div class="callback-popup">
        <div class="h4">Оставьте заявку</div>
        <p>и наш менеджер свяжется с<br>Вами в ближайшее время</p>
        <div class="block_content">
            <form id="form_callback" action="{$smarty.server.REQUEST_URI}" method="post">
            {if !empty($blockcallback_msg)}
				<script type="text/javascript">
					show_callbackmessage("{$blockcallback_msg}");
				</script>
                <p class="{if isset($blockcallback_error) && $blockcallback_error}blockcallback_error{else}blockcallback_success{/if}">{$blockcallback_msg}</p>
            {/if}
                {*<input id="BlockCallbackName" name="BlockCallbackName" value="{if isset($blockcallback_error) && $blockcallback_error}{$smarty.post.BlockCallbackName|escape:'htmlall':'UTF-8'}{/if}" type="text" placeholder="Ваше имя" required />*}

                {*<input id="BlockCallbackPhone" name="BlockCallbackPhone" value="{if isset($blockcallback_error) && $blockcallback_error}{$smarty.post.BlockCallbackPhone|escape:'htmlall':'UTF-8'}{/if}" type="tel" placeholder="Телефон" pattern={literal}"\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}"{/literal} required/>*}

                <input name="BlockCallbackName" value="{if isset($blockcallback_error) && $blockcallback_error}{$smarty.post.BlockCallbackName|escape:'htmlall':'UTF-8'}{/if}" type="text" placeholder="Ваше имя" required/>

                <input name="BlockCallbackPhone" value="{if isset($blockcallback_error) && $blockcallback_error}{$smarty.post.BlockCallbackPhone|escape:'htmlall':'UTF-8'}{/if}" type="tel" placeholder="Телефон" pattern={literal}"\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}"{/literal} required/>

                <button type="submit" class="button-green" name="submitBlockCallback">Отправить</button>
            </form>
        </div>
    </div>
</div>
<!-- /Block blockcallback -->
