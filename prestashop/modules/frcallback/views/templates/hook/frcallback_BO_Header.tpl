<!------------------------ CALLBACK --------------------------->
{literal}
<script type="text/javascript">
$('document').ready( function() {
    var divNotif = $('#notifs_icon_wrapper'); 
    if (divNotif) {       
        var newNotiff = document.createElement('div');
        newNotiff.setAttribute('id', 'frcallbacks_notif');
        newNotiff.setAttribute('class', 'notifs');
        newNotiff.innerHTML = 
            '<span class="number_wrapper" id="frcallbacks_notif_number_wrapper" style="display: none;">' +
            '<span id="frcallbacks_notif_value">0</span>' +
            '</span>' +
            '<div class="notifs_wrapper" id="frcallbacks_notif_wrapper">' +
{/literal}
            '<h3>{l s='Callback Requests'  mod='frcallback'}</h3>' +
            '<p id="frcallbacks_notif_mess" class="no_notifs">{l s='No new callback requests on your shop.' mod='frcallback'}</p>' +
            '<ul></ul>' +
            '<p><a href="{$tab_link}">{l s='Show all requests' mod='frcallback'}</a></p>' +
{literal}
            '</div>';
        $(newNotiff).appendTo(divNotif);  

        $(newNotiff).click(function(){
            wrapper_id = $(this).attr("id");
            if(!$("#" + wrapper_id + "_wrapper").is(":visible")) {
                $(".notifs_wrapper").hide();
                $("#" + wrapper_id + "_number_wrapper").hide();
                $("#" + wrapper_id + "_wrapper").show();
            }
            else {
                $("#" + wrapper_id + "_wrapper").hide();
            }
        });

        getCBRequest(autorefresh_notifications);
        
    }
});

function getCBRequest(refresh) {
{/literal}
    $.post("{$notif_link}", 
{literal}
        function(data) {
            if (data) {
                var divNotif = $('#notifs_icon_wrapper'); 
                if (divNotif) {       
                    json = jQuery.parseJSON(data);
                    $("p#frcallbacks_notif_mess").html(json.mess);
                    $("#frcallbacks_notif_value").text(json.count);
                    if (json.count > 0) {
                        $("#frcallbacks_notif_number_wrapper").show();
                    }
                    else {
			$("#frcallbacks_notif_number_wrapper").hide();
                    }
    
                    if(refresh)
                        setTimeout("getCBRequest()",60000);
		}
            }
        }
    );
        
}

</script>
{/literal}               
<link media="all" type="text/css" rel="stylesheet" href="{$base_url}/modules/frcallback/views/css/frcallback_admin.css">
<!------------- END ------- CALLBACK ------------END------------>
