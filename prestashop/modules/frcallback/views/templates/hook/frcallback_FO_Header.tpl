<!------------------------ CALLBACK --------------------------->
{literal}
<script type="text/javascript">
jQuery(function ($) {
{/literal}
    var sLoading = "{l s='Loading...' mod='frcallback'}";
    var sSend = "{l s='Sending...' mod='frcallback'}";	
    var sThanks = "{l s='Thank you, we will call you back soon!' mod='frcallback'}";
    var sBye = "{l s='Goodbye...' mod='frcallback'}";
    var sFillName = "{l s='Fill "Name". ' mod='frcallback'}";
    var sFillPhone = "{l s='Fill "Phone". ' mod='frcallback'}";
    var sInvalidPhone = "{l s='Invalid phone.' mod='frcallback'}";
    var sEnterMessage = "{l s='Your message. ' mod='frcallback'}";
    var sClose = "{l s='Close' mod='frcallback'}";
    var a_url = "{$actions_link}";
    var load_url = "{$img_ps_dir}loadingAnimation.gif";
    var iMask = "{$mask}";
{literal}
    var contact = {
	message: null,
	init: function () {
            $('a[id*=callback-call]').click(function (e) {
                $.get(a_url, { 'process': 'getForm', 'token': static_token, 'ajax': true }, 
                    function(data){
                        if (data) {
                            json = jQuery.parseJSON(data);
                            $(json.html).frmodal({
                                closeHTML: '<a href="#" title="' + sClose + '" class="modal-close">x</a>',
				position: ['15%',],
				overlayId: 'contact-overlay',
				containerId: 'contact-container',
				onOpen: contact.open,
				onShow: contact.show,
				onClose: contact.close,
                                minHeight: 375
                           });
                           if (iMask.length > 0)
                                $('#contact-phone').mask(iMask);
                        }                                 
                    });
                return false;
            });
        },
	open: function (dialog) {
            if ($.browser.mozilla) {
                $('#contact-container .contact-button').css({
                    'padding-bottom': '2px'
		});
            }
            if ($.browser.safari) {
                $('#contact-container .contact-input').css({
                    'font-size': '.9em'
		});
            }
            var h = 320;
            if ($('#contact-subject').length) {
                h += 26;
            }
            if ($('#contact-cc').length) {
                h += 22;
            }
            var title = $('#contact-container .contact-title').html();
            $('#contact-container .contact-title').html(sLoading + '<center><img src="' + load_url + '"></center>');
            dialog.overlay.fadeIn(200, function () {
                dialog.container.fadeIn(200, function () {
                    dialog.data.fadeIn(200, function () {
			$('#contact-container .contact-content').animate({
                            height: h
                            }, function () {
                                $('#contact-container .contact-title').html(title);
				$('#contact-container form').fadeIn(200, function () {
                                    $('#contact-container #contact-name').focus();
                                    $('#contact-container .contact-cc').click(function () {
                                        var cc = $('#contact-container #contact-cc');
					cc.is(':checked') ? cc.attr('checked', '') : cc.attr('checked', 'checked');
                                    });
                                    if ($.browser.msie && $.browser.version < 7) {
                                        $('#contact-container .contact-button').each(function () {
                                            if ($(this).css('backgroundImage').match(/^url[("']+(.*\.png)[)"']+$/i)) {
                                                var src = RegExp.$1;
						$(this).css({
                                                    backgroundImage: 'none',
                                                    filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' +  src + '", sizingMethod="crop")'
						});
                                            }
					});
                                    }
				});
                            });
                    });
                });
            });
	},
        show: function (dialog) {
            $('#contact-container .contact-send').click(function (e) {
                e.preventDefault();
                if (contact.validate()) {
                    var msg = $('#contact-container .contact-message');
                    msg.fadeOut(function () {
                        msg.removeClass('contact-error').empty();
                    });
                    $('#contact-container .contact-title').html(sSend + '<center><img src="' + load_url + '"></center>');
                    $('#contact-container form').fadeOut(200);
                    $('#contact-container .contact-content').animate({
                        height: '80px'
			}, function () {
                            $('#contact-container .contact-loading').fadeIn(200, function () {
                                var tst = '';
                                if ($('input#frcallback-tst').val()) {
                                    tst = '&test=' + encodeURIComponent($('input#frcallback-tst').val());
                                }
                                $.ajax({
                                    url: a_url,
                                    data: $('#contact-container form').serialize() + '&process=sendForm' + tst,
                                    type: 'post',
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        if (data) {
                                            $('#contact-container .contact-loading').fadeOut(200, function () {
                                                $('#contact-container .contact-title').html(sThanks);
                                                msg.html(data.html).fadeIn(200);
                                                setTimeout(function () {
                                                    $.modal.close();
                                                    }, 5000)
                                            });
                                        }        
                                    },
                                    error: contact.error
				});
                            });
			});
                }
		else {
                    if ($('#contact-container .contact-message:visible').length > 0) {
			var msg = $('#contact-container .contact-message div');
			msg.fadeOut(200, function () {
                            msg.empty();
                            contact.showError();
                            msg.fadeIn(200);
			});
                    }
                    else {
			$('#contact-container .contact-message').animate({
                            height: '30px'
                            }, contact.showError);
                    }
		}
            });
	},
	close: function (dialog) {
            $('#contact-container .contact-message').fadeOut();
            $('#contact-container .contact-title').html(sBye);
            $('#contact-container form').fadeOut(200);
            $('#contact-container .contact-content').animate({
                height: 40
		}, function () {
                    dialog.data.fadeOut(200, function () {
                        dialog.container.fadeOut(200, function () {
                            dialog.overlay.fadeOut(200, function () {
                                $.modal.close();
                            });
			});
                    });
            });
	},
	error: function (xhr) {
            alert(xhr.statusText);
	},
	validate: function () {
            contact.message = '';
            var phone = $('#contact-container #contact-phone').val();
            if (!phone) {
                contact.message += sFillPhone;
            }
/*                    
		else {
                    if (!contact.validatephone(phone)) {
                        contact.message += sInvalidPhone;
                    }
		}
		if (!$('#contact-container #contact-message').val()) {
                    contact.message += sEnterMessage;
		}
*/
/*    
            if (!$('#contact-container #contact-name').val()) {
                ontact.message += sFillName;
            }
*/
            if (contact.message.length > 0) {
                return false;
            }
            else {
                return true;
            }
	},
/*            
	validatephone: function (phone) {
            var at = phone.lastIndexOf("@");
            if (!/^[0-9]{5,12}$/.test(phone))
                return false;

            return true;
	},
*/
        showError: function () {
            $('#contact-container .contact-message')
           	.html($('<div class="contact-error"></div>')
                .append(contact.message))
		.fadeIn(200);
        }
    };

    contact.init();

});
</script>
{/literal}               
<!------------- END ------- CALLBACK ------------END------------>
