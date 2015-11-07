/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

var decodeEntities = (function() {
	var element = document.createElement('div');
	function decodeHTMLEntities (str)
	{
		if(str && typeof str === 'string')
		{
			str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
			str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
			element.innerHTML = str;
			str = element.textContent;
			element.textContent = '';
		}

		return str;
	}

	return decodeHTMLEntities;
})();

function cartDisplayErrors(jsonData) {
	var errors = '';
	for (error in jsonData.errors)
		if (error != 'indexOf')
			errors += $('<div />').html(jsonData.errors[error]).text() + "\n";
	if (!!$.prototype.fancybox)
		$.fancybox.open([{
			type: 'inline',
			autoScale: true,
			minHeight: 30,
			content: '<p class="fancybox-error">' + errors + '</p>'
		}], {
			padding: 0
		});
	else
		alert(errors);
}

function flatLayer()
{
	var height_combinations = $('.layer_cart_product_info').outerHeight();
	var height_image = $('div.layer_cart_img').outerHeight();
	if (height_combinations > height_image)
	{
		var margin = height_combinations - height_image;
		console.log(height_combinations);
		console.log(height_image);
		$('div.layer_cart_img').css('margin-bottom', margin);
	}
}

function flat_block(block, includePadding, property)
{
    var minHeight = 0;
    $(block).each(function() {
        if ((includePadding === true ? $(this).outerHeight() : $(this).height()) > minHeight)
            minHeight = (includePadding === true ? $(this).outerHeight() : $(this).height());
    });

    if (minHeight > 0)
        $(block).css(property, minHeight);
}

function initSpin()
{
	var html = '<div id="adv-page-loader" class="on" style="display: none;"><span class="opc-spinner"></span></div>';
	$('.adv-bundle-container').parent().prepend(html);
}

function strpos(haystack, needle, offset){
	var i = (haystack + '').indexOf(needle, (offset || 0));
	return i === -1 ? false : i;
};

$(document).ready(function(){
	$('.cart_description small a, td.cart_description > a').each(function(){
		var decoded = decodeEntities($(this).html());
		$(this).html(decoded);
	});

	if (!!$.prototype.fancybox)
	{
		$('div:visible .fancybox, .fancybox.shown').fancybox({
			'hideOnContentClick': true,
			'openEffect'	: 'elastic',
			'closeEffect'	: 'elastic'
		});
	}
})

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function in_arrayMod(value, array)
{
	for (var i in array)
		if ((array[i] + '') === (value + ''))
			return true;
	return false;
}