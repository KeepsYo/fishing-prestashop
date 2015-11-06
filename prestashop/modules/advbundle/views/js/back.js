/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

function fieldhide()
{
	var value = $('select[name="id_discount_type"]').val();
	if (value == 0)
	{
		$('#all_percent_discount').parents('.form-group').first().hide();
		$('#all_price_amount').parents('.form-group').first().hide();
		$('.bundle_amount_disc').hide();
	}

	if (value == 1)
	{
		$('#all_percent_discount').parents('.form-group').first().show();
		$('#all_price_amount').parents('.form-group').first().hide();
		$('.bundle_amount_disc').hide();
	}

	if (value == 2)
	{
		$('#all_percent_discount').parents('.form-group').first().hide();
		$('#all_price_amount').parents('.form-group').first().show();
		$('#allow_remove_item').attr('disabled', true).attr('checked', false).parents('.form-group').first().hide();
		$('.bundle_amount_disc').hide();
	}

	if (value == 3)
	{
		$('#all_percent_discount').parents('.form-group').first().hide();
		$('#all_price_amount').parents('.form-group').first().hide();
		$('.bundle_amount_disc').show();
	}

	if (value != 2)
	{
		if ($('tr.bundle_product_line').size() <= 2)
			$('#allow_remove_item').attr('disabled', true).parents('.form-group').first().hide();
		else
			$('#allow_remove_item').attr('disabled', false).parents('.form-group').first().show();
	}
}

function getbundle_exclude()
{
	return $('input[name="bundle_exclids"]').val();
}

function jsLoadSettings()
{
	console.warn('load js settings ok');
	disabled_comb();
	hidecomb();
	fieldhide();
	InitDnd('table.bundle_table');
}

function hidecomb()
{
	$('.bundle_table #custom_combination').each(function(){
		var id = $(this).data('idp');
		if ($(this).attr('checked'))
			$('tr#combination_container_'+id).show();
		else
			$('tr#combination_container_'+id).hide();
	});
}

function disabled_comb()
{
	$('.include_comb').each(function(e){
		var ipa = $(this).data('ipa');
		var idp = $(this).data('idp');
		if ($('.def_comb#advbundle_combination_'+idp+'_'+ipa).attr('checked') != 'checked')
		{
			if ($(this).attr('checked') == 'checked')
				$(this).parents('table').first().find('.def_comb#advbundle_combination_'+idp+'_'+ipa).attr('disabled', false);
			else
				$(this).parents('table').first().find('.def_comb#advbundle_combination_'+idp+'_'+ipa).attr('disabled', true);
		}
		else
			$(this).attr('checked', true);
	});
}

$(document).ready(function(){
	var is_pack = true;
	if (is_pack)
	{
		$('button[name=submitAddproductAndStay], button[name=submitAddproduct]').live('click', function() {
			if ($('tr.bundle_product_line').size() < 2)
			{
				alert(bundle_min_text);
				return false;
			}
		});

		if (typeof tabs_manager != 'undefined')
		{
			tabs_manager.onLoad('Informations', function(){
				$('input[name="type_product"]').parents('.form-group').first().hide();
				$('#product-pack-container').next('hr').hide();
				$('input[name=type_product]').parent().next('div.separation').hide();
				$('input[name=type_product]').parent().hide();
				$('a#desc-product-duplicate, a#desc-product-stats').parents('li').hide();
			});
			
			tabs_manager.onLoad('ModuleAdvbundle', function(){
				jsLoadSettings();
				$('.include_comb').live('change', function(){
					disabled_comb();
				});

				$('#custom_combination').live('change', function(){
					hidecomb();
				});
				
				$('select[name="id_discount_type"]').live('change', function(){
					fieldhide();
				});

				$('.include_all').live('change', function(){
					if ($(this).attr('checked') == 'checked')
						$(this).parents('table').first().find('.include_comb').attr('checked', true);
					else
					{
						$(this).parents('table').first().find('.include_comb').each(function(){
							var ipa = $(this).data('ipa');
							var idp = $(this).data('idp');
							if ($('.def_comb#advbundle_combination_'+idp+'_'+ipa).attr('checked') != 'checked')
								$(this).attr('checked', false);
						});
					}

					disabled_comb();
				});

				$('.bundle_remove').live('click', function(){
					if (confirm(bundle_delete_product_text))
					{
						var id = $(this).data('id_product');
						$(this).parents('tr').first().remove();
						$('#combination_container_'+id).remove();
						jsLoadSettings();
						ajaxUpdatePriceBundle();
						showSuccessMessage(bundle_dellist_text);
						var arr_list = $('input[name="bundle_exclids"]').val().split(',');
						if (in_arrayMod(id, arr_list))
						{
							for (t in arr_list)
							{
								if (arr_list[t] == id)
								{
									arr_list.splice(t, 1);
									break;
								}
							}
						}

						$('input[name="bundle_exclids"]').val(arr_list.join(','));
						ac.setOptions({extraParams : {exclude_ids : $('input[name="bundle_exclids"]').val(), action : 'list_product'}});
						ac.flushCache();
					}
				});

				var addBundleProduct = function(event, data, formatted)
				{
					var request = new Object();
					request.action = 'getLine';
					request.id = data.id_product;
					$.ajax({
						type: 'POST',
						url: bundle_ajax_link,
						data: request,
						dataType: 'json',
						async : true,
						success: function(jsonData)
						{
							$('.table_product_bundle > tbody').append(jsonData.html);
							jsLoadSettings();
							ajaxUpdatePriceBundle();
							showSuccessMessage(bundle_addlist_text);
							var arr_list = $('input[name="bundle_exclids"]').val().split(',');
							if (!in_arrayMod(data.id_product, arr_list))
								arr_list.push(parseInt(data.id_product));

							$('input[name="bundle_exclids"]').val(arr_list.join(','));
							ac.setOptions({extraParams : {exclude_ids : $('input[name="bundle_exclids"]').val(), action : 'list_product'}});
							ac.flushCache();
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							if (textStatus != 'error' || errorThrown != '')
								showErrorMessage(textStatus + ': ' + errorThrown);				
						}
					});
				};

				var ac = $('#bundle_ajax_product')
					.autocomplete(bundle_ajax_link, {
							minChars: 1,
							max: 10,
							width: 500,
							selectFirst: false,
							scroll: false,
							dataType: 'json',
							formatItem: function(data, i, max, value, term) {
								return value;
							},
							parse: function(data) {
								var mytab = [];
								for (var i = 0; i < data.length; i++)
										mytab[mytab.length] = {data: data[i], value: data[i].name + ' > ' + data[i].reference};

								return mytab;
							},
							extraParams: {
								exclude_ids: getbundle_exclude(),
								action: 'list_product'
							}
						}
					).result(addBundleProduct);
			});

			tabs_manager.onLoad('Associations', function(){
				$('#id_manufacturer').parents('.form-group').first().hide();
				$('#product_autocomplete_input').parents('.form-group').first().hide();
				$('input[name=inputAccessories]').parents('tr').hide();
				$('select[name=id_manufacturer]').parents('tr').hide();
			});
		}

		var hide_array = ['Prices', 'Combinations', 'Features', 'Customization', 'Attachments', 'Suppliers', 'VirtualProduct', 'Pack', 'Quantities'];
		for (key in hide_array)
			$('#link-' + hide_array[key] + ', #product-tab-content-' + hide_array[key]).hide();
	}

	$('.bundle_table input:not(.include_comb, .custom_combination), .bundle_table select,'+
		'#all_percent input, #all_price input, #allow_remove input, .bundle_mode select').live('change', function() {
		ajaxUpdatePriceBundle();
	});
});

function InitDnd(table)
{	
	$(table).tableDnD({
		onDragStart: function(table, row) {
			BundleOriginalOrder = $.tableDnD.serialize();
			$('.combination_container').animate({opacity: 0.2}, 200);
		},
		onDragClass: 'myDragClass',
		onDrop: function(table, row) {
			var pid = $(row).data('id_product');
			if (BundleOriginalOrder != $.tableDnD.serialize())
			{
				$('table.bundle_table tr.combination_container').each(function() {
					$(this).insertAfter('table.bundle_table tr#bundle_product_line_' + $(this).data('id_product'));
				});
			}

			$('.combination_container').animate({opacity: 1}, 200);
			hidecomb();
		}
	});
}

var ajaxUpdatePriceBundle = function()
{
	var data = $('.bundle_table input, .bundle_table select, .bundle_mode select, #all_percent input, #all_price input, #allow_remove input').serializeObject();
	data.action = 'getPrices';

	$.ajax({
		type: 'POST',
		url: bundle_ajax_link,
		data: data,
		dataType: 'json',
		async : true,
		success: function(jsonData)
		{
			$('.bundle_original_incl').html(jsonData.original_incl);
			$('.bundle_original_excl').html(jsonData.original_excl);
			$('.bundle_final_excl').html(jsonData.final_excl);
			$('.bundle_final_incl').html(jsonData.final_incl);
			$('.bundle_disc_incl').html(jsonData.disc_incl);
			$('.bundle_disc_excl').html(jsonData.disc_excl);
			$('.bundle_percent').html('-' + jsonData.percent_disc + '%');
			showSuccessMessage(bundle_updprice_text);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			if (textStatus != 'error' || errorThrown != '')
				showErrorMessage(textStatus + ': ' + errorThrown);				
		}
	});
}