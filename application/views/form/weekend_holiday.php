<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>

 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />
 
<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>


</head>

<body>

<fieldset style='width:600px;'><legend><font size='+1'><b>Weekend Entry</b></font></legend>
<form name='work_off'>
<table border='0' cellpadding='2'cellspacing='2'>
<tr><td>Date</td><td>:</td><td><input type='text' name='work_off_date' id='work_off_date' size='16'></td></tr>
<tr><td width='42%'>Employee ID</td><td width='5%'>:</td><td width='60%'><input type='text' name='work_off_empid' id='work_off_empid' size='16'></td></tr>
<tr><td>Start</td><td>:</td><td><select style="width:120px;" name='work_off_start' id='work_off_start' onchange='add_work_off()' /><option value='select'>Select</option><option value='all'>ALL</option></select></td></tr>
<tr><td>Department </td><td>:</td><td><select style="width:120px;"  id='dept_work_off' name='dept_work_off' ><option value=''></option></select></td></tr>
<tr><td>Section </td><td>:</td><td><select style="width:120px;" id='section_work_off' name='section_work_off' ><option value=''></option></select></td></tr>
<tr><td>Line No </td><td>:</td><td><select style="width:120px;" id='line_work_off' name='line_work_off' ><option value=''></option></select></td> </tr>
<tr><td>Designation </td><td>:</td><td><select style="width:120px;" id='desig_work_off' name='desig_work_off'><option value=''></option></select></td></tr><tr><td></td><td></td><td><input type='button' name='btn' id='btn' onclick='save_work_off()' value='Save' size='15'></td></tr></table></form>Note : Date Format [YYYY-MM-DD] Time format [HH:MM:SS]
</fieldset>
<br />
<br />
<fieldset style='width:600px;'><legend><font size='+1'><b>Present to Absent Entry</b></font></legend>
<form name='present_absent'>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="52%">Employee ID</td><td width="5%">:</td>
<td><input type='text' name='empid_present_absent' id='empid_present_absent' size='16'></td></tr>

<tr><td>Select Date</td><td>:</td>
<td><input type='text' name='startdate_present_absent' id='startdate_present_absent' size='16'>
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'present_absent',
		// input name
		'controlname': 'startdate_present_absent'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
</script>
</td></tr>
<tr><td></td><td></td>
<td><input type='button' onclick='manual_entry_Delete()' value='DELETE'/></td></tr>
</table>
</form>

</fieldset>


</body>
</html>