<div style='display:none'>
	<div class='contact-top'></div>

	<div class='contact-content'>
			<h1 class='contact-title'>{l s='CallBack Request!' mod='frcallback'}</h1>
			<div class='contact-loading' style='display:none'></div>
			<div class='contact-message' style='display:none'></div>


			<form action='#' style='display:none'>
				<label for='contact-name'>{l s='Name:' mod='frcallback'}</label>
				<input type='text' id='contact-name' class='contact-input' name='name' tabindex='1001' />
				<label for='contact-phone'>{l s='Phone:' mod='frcallback'}</label>
				<input type='text' id='contact-phone' class='contact-input' name='phone' tabindex='1002' />
				<label for='contact-message'>{l s='Message:' mod='frcallback'}</label>
				<textarea id='contact-message' class='contact-input' name='message' cols='20' rows='4' tabindex='1004'></textarea>
				<br/>                        
				<label>&nbsp;</label>
				<button type='submit' class='contact-send contact-button' tabindex='1006'>{l s='Send' mod='frcallback'}</button>
				<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>{l s='Cancel' mod='frcallback'}</button>
				<br/>
				<input type='hidden' name='token' value='{$to}'/>
{*				<div class='contact-info'>{l s='* type only numbers - no spaces or other characters.' mod='frcallback'}</div> *}
			</form>

	</div>
	<div class='contact-bottom'>{l s='We will call you back within an hour or more, specified by you.' mod='frcallback'}</div>
</div>


