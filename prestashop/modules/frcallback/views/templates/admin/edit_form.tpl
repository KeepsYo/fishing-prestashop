<td width="10px">&nbsp;</td>
<td width="10px">&nbsp;</td>
<td width="50px">&nbsp;</td>
<td width="100px">&nbsp;</td>
<td width="50px">&nbsp;</td>
<td>&nbsp;</td>
<td valign="top" width="180px">
    <select id="id_status" name="id_status">{$statuses}</select>
</td>
<td valign="top" width="100px">
    <select id="id_employee" name="id_employee">{$empl_array}</select>
</td>
<td valign="top">
    <textarea id="employee_note" name="employee_note" rows="5" cols="15">{$note}
</textarea>
</td>
<td valign="top" align="right"  width="50px">
    <input type="datetime" id="date_call" name="date_call" value="{$date_call}" size="14" class="datepicker datetimepicker">
</td>
<td valign="top" style="white-space: nowrap;" align="center"  width="52px">
    <a title="{l s='Save'}" class="" onclick="return frSubmitEdit(this);" href="index.php?controller=admincallbackrequests&amp;id_request={$id_object}&amp;updatefrbc_requests&amp;token={$token}&amp;action=save">
    <img alt="{l s='Save'}" src="../img/admin/ok.gif">
    </a>
    <a title="{l s='Close'}"  class="" href="#" onclick="return frCloseEdForm();">
    <img alt="{l s='Close'}" src="../img/admin/nav-logout.gif">
</a>
</td>
{literal}   
<script type="text/javascript">
$('input.datetimepicker').datetimepicker({
    showSecond: true,
    nextText: '',
    prevText: '',
{/literal} 
    timeFormat: '{$time_format}',
    dateFormat: '{$date_format}'   
{literal}   
});    
</script>
{/literal} 
