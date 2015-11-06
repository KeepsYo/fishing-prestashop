/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

var combinations = [];

function initTab()
{
	clickTab($('#adv-myTab li').first());
	$('#adv-myTab li').live('click', function(e) {
		e.preventDefault()
		clickTab(this);
	});
}

function initSize()
{
	flat_block($('.bundle_attributes'), true, 'min-height');
	flat_block($('.bundle_price'), true, 'min-height');
	flat_block($('.bundle_name'), true, 'min-height');
}

$(document).ready(function(){
	initTab();
	initSpin();
	initSize();

	$('.adv-main-container .adv-combination-select').live('change', function(){
		findCombination();
	});

	$('.adv-main-container input.include_items').live('change', function(){
		if (allow_remove_item)
		{
			var size = $('input.include_items:checked').size();
			if (size < 2)
			{
				$(this).attr('checked', true);
				alert(error_qty_remove);
			}
			else
				findCombination();
		}
	});

	$('.11adv-btn-cart').live('click', function(){
		e.preventDefault();
		$(this).addClass('added');
		if (typeof(ajaxCart) !== 'undefined')
			ajaxCart.add($(this).data('id_product'), null, false, this, 1);
		
	});

	$('.adv-main-container .adv-btn-cart').live('click', function(){
		var data = $('#pack_form').serializeObject();
		data.action = 'add_to_cart';
		var cart_button = this;
		$(cart_button).attr('disabled', true).addClass('adv-disabled').removeClass('adv-added');
		$.ajax({
            type: 'POST',
            url: ajax_bundle_link,
            data: data,
            dataType: 'json',
            cache: false,
            success: function(jsonData, textStatus, jqXHR)
			{
				if (!jsonData.hasError)
				{
					if (typeof(ajaxCart) !== 'undefined' && jsonData.ajax_cart)
					{
						if (typeof(ajaxCart.updateLayer) !== 'undefined')
						{
							$(jsonData.products).each(function(){
								if (this.id != undefined && this.id == parseInt(jsonData.idProduct) && this.idCombination == parseInt(jsonData.idProductAttribute))
									if (contentOnly)
										window.parent.ajaxCart.updateLayer(this);
									else
										ajaxCart.updateLayer(this);
							});
						}

						if (contentOnly)
							window.parent.ajaxCart.updateCartInformation(jsonData);
						else
							ajaxCart.updateCartInformation(jsonData);

						if (contentOnly)
							parent.$.fancybox.close();
					}
					else
						if (contentOnly)
							window.parent.location.href = baseUri + 'order';
						else
							location.href = baseUri + 'order';

					$(cart_button).addClass('adv-added');
				}
				
				if (jsonData.hasError)
				{
					cartDisplayErrors(jsonData);
				}
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                
            },
            complete: function(jqXHR, textStatus) {
                    $(cart_button).removeAttr('disabled').removeClass('adv-disabled');
            }
        });
	});

	$('.adv-main-container a.adv-combination-select:not(.selected)').live('click', function(){
		var id_attribute = $(this).attr('id').split('_');
		var idp = $(this).data('idp');
		$(this).parent().parent().find('a').removeClass('selected');
		$('.adv_list_' + idp + ' #color_to_pick_list li').removeClass('selected');
		$(this).parent().addClass('selected');
		$('.color_pick_hidden_' + idp).val(id_attribute[1]);
		findCombination();
	});

	$('.adv-main-container .adv-spinner-up').live('click', function(e){
        e.preventDefault();
        var currentVal = parseInt($('.adv-spinner-input').val());
        if (!isNaN(currentVal))
            $('.adv-spinner-input').val(currentVal + 1).trigger('keyup');
    });

    $('.adv-main-container .adv-spinner-down').live('click', function(e){
        e.preventDefault();
        var currentVal = parseInt($('.adv-spinner-input').val());
        if (!isNaN(currentVal) && currentVal > 1)
            $('.adv-spinner-input').val(currentVal - 1).trigger('keyup');
        else
            $('.adv-spinner-input').val(1);
    });

	findCombination(true);
});

function findCombination(firstTime)
{
	console.clear();
	var send = true;
	var choice = [];
	var errors = [];
	var result = [];

	if (typeof combinations == 'undefined' || !combinations)
		combinations = [];

	if (Object.size(combinations) > 0)
	{
		$.each(combinations, function(k, val){
			choice[k] = [];
			$('.adv_list_'+ k +' .attribute_select, .adv_list_'+ k +' input[type=hidden], .adv_list_'+ k +' input[type=radio]:checked').each(function(){
				choice[k].push(parseInt($(this).val()));
			});
		})

		delete k;
		delete val;

		$.each(combinations, function(k, val){
			var id_product = k;
			if (typeof combinations[id_product] != 'undefined')
			{
				if (Object.keys(combinations[id_product]).length > 0)
				{
					for (i in combinations[id_product])
					{
						var combinationMatchForm = true;
						$.each(combinations[id_product][i]['attributes'], function(key, value){
							if (!in_array(parseInt(value), choice[id_product]))
								combinationMatchForm = false;
						});

						if (combinationMatchForm)
						{
							result[id_product] = parseInt(combinations[id_product][i]['id_product_attribute']);
							$('.ipa_item_'+id_product).val(combinations[id_product][i]['id_product_attribute']);
							break;
						}
					}
				}
				else
					result[id_product] = 0;
			}
		});

		$.each(combinations, function(k, val){
			if (!array_key_exists(k, result))
				$('.ipa_item_'+k).val(0);
		});

		if (!firstTime && send)
		{
			var data = $('#pack_form').serializeObject();
			data.action = 'change_combination';
			$('.adv-bundle-container').addClass('adv-blur');
			$('#adv-page-loader').fadeIn(200);
			setTimeout(function(){
				$.post(ajax_bundle_link, data, function(jsonData, textStatus) {
					$('.adv-bundle-container').replaceWith(jsonData.html);
					initTab();
					initSize();
					$('.adv-bundle-container').removeClass('adv-blur');
					$('#adv-page-loader').fadeOut(200);
					findCombination(true);
				}, "json");
			}, 100);
		}
	}
}

function arraysEqual(a, b)
{
	if (a === b) return true;
	if (a == null || b == null) return false;
	if (a.length == b.length)
	{
		for (var i = 0; i < a.length; ++i) {
			if (!in_array(a[i], b)) return false;
		}
	}
	else
		return false;
	return true;
}

function array_key_exists( key, search )
{
	if(!search || (search.constructor !== Array && search.constructor !== Object) ){
		return false;
	}

	return search[key] !== undefined;
}

function array_keys(array)
{
	var tmp_array = new Array();
	var cnt = 0;
	if (array.length)
	{
		for (key in array)
		{
			tmp_array[cnt] = key;
			cnt++;
		}
	}

	return tmp_array;
}

function clickTab(link)
{
	$('#adv-myTab li').each(function(){
		$(this).removeClass('adv-active');
	});

	$(link).addClass('adv-active');
	$('#adv-myTabContent div').each(function(){
		$(this).hide();
	});

	$('#adv-myTabContent '+ $(link).find('a').attr('href')).fadeTo(1, 100);
}

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