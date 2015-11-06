{if isset($content)}
	{$content}

{literal}        
<script type="text/javascript">
$('document').ready( function() {
    $('table.frbc_requests a.edit').click(
        function() {
            $('table.frbc_requests tr#frcallbacks_edit_form').fadeOut('slow', 
                function(){
                    $(this).remove();
                })    

            var row = document.createElement('tr');
            row.setAttribute('id', 'frcallbacks_edit_form');
            row.setAttribute('style', 'display:none;'); 
            $(row).insertAfter($(this).parent('td').parent('tr'));
     
            $.ajax({
                type: 'GET',
                url: this.href + '&ajax=true&action=edit',
                async: false,
                cache: false,
                dataType : "json",
                success: function(jsonData) {
                    if (jsonData.status == 'error') {
                        var errors = '';
                        for(error in jsonData.error)
                            //IE6 bug fix
                            if(error != 'indexOf')
                                errors += jsonData.error[error] + "\n";
    			
                        alert(errors);
                        return false;    
                    }
                    else {
                        $(row).html(jsonData.content);
                        $(row).fadeIn('slow');
                        return true;    
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus + "\n"  + errorThrown);
                    return false;    
                }
            });
            
            return false;
        }
    );
})
    
function frCloseEdForm() {

    $('table.frbc_requests tr#frcallbacks_edit_form').fadeOut('normal', function(){
        $(this).remove();
    })    
    return false;
        
}    
    
function frSubmitEdit(a) {

    var tr = $(a).parent('td').parent('tr');
    var tr0 = $(tr).prev('tr');

    var span = '';
    var _id_status = encodeURIComponent($('#id_status', tr).val());
    if (_id_status == 1) {
        span = 'style="background-color:Crimson;color:white" class="color_field"';
    }
    if (_id_status == 2) {
        span = 'style="background-color:RoyalBlue;color:white" class="color_field"';
    }
    var _id_status_val = '<span ' + span + '>' + $('#id_status :selected', tr).text() + '</span>';
    var _id_employee = encodeURIComponent($('#id_employee', tr).val());
    var _id_employee_val = $('#id_employee :selected', tr).text();
    var _employee_note = encodeURIComponent($('#employee_note', tr).val());
    var _employee_note_val = $('#employee_note', tr).val();
    var _date_call = encodeURIComponent($('#date_call').datetimepicker('getDate'));    
    var _date_call_val = $('#date_call', tr).val();    
    var params = 'ajax=true&';
    params += 'id_status=' + _id_status + '&';
    params += 'id_employee=' + _id_employee + '&';
    params += 'employee_note=' + _employee_note + '&';
    params += 'date_call=' + _date_call;

    $.ajax({
        type: 'POST',
	url: a.href,
	async: false,
	cache: false,
	dataType : "json",
	data: params,
	success: function(jsonData) {
            if (jsonData.status == 'error') {
                var errors = '';
                for(error in jsonData.error)
                    //IE6 bug fix
                    if(error != 'indexOf')
                        errors += jsonData.error[error] + "\n";
    			
                alert(errors);
                return false;    
            }
            else {
                $('td:eq(6)', tr0).html(_id_status_val);
                $('td:eq(7)', tr0).html(_id_employee_val);
                $('td:eq(8)', tr0).html(_employee_note_val);
                $('td:eq(9)', tr0).html(_date_call_val);

		getCBRequest();
                $(tr).fadeOut('normal', function(){
                    $(this).remove();
                })    
            }
	},
	error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: unable to save \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });

    return false;
        
}    
    
</script>
{/literal}        

{/if}
  