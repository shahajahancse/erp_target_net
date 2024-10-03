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

<fieldset style='width:600px;'><legend><font size='+1'><b>Attendance Entry</b></font></legend>
<form name='entry'><table width='100%' border='0' cellpadding='0' cellspacing='0'><tr><th colspan='2' scope='col' align='center'></th></tr><tr><td colspan='3'></td></tr><tr><td width='50%'><div style='width:100%; height:auto; overflow:hidden; margin:0 auto; '><table width='100%' border='0' cellpadding='0'cellspacing='2'><tr><td width='42%'>Employee ID</td><td width='5%'>:</td><td width='53%'><input type='text' name='empid' id='empid' size='16'></td></tr>
<tr><td>Time </td><td>:</td><td><input type='text' name='time' id='time' size='16'> [HH:MM:SS]</td></tr>

<tr><td>Start Date </td><td>:</td><td><input type='text' name='startdate' id='startdate' size='16'>
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'entry',
		// input name
		'controlname': 'startdate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>

</td></tr>
<tr><td>End Date </td><td>:</td><td><input type='text' name='enddate' id='enddate' size='16'>
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'entry',
		// input name
		'controlname': 'enddate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>

</td></tr>
<tr><td>Category </td><td>:</td><td><select style="width:150px;" name='in_time' id='in_time' onchange='intime()'><option value='Select'>Select</option><option value='all'>All</option></select></td></tr>
<tr><td>Department </td><td>:</td><td><select style="width:150px;" id='dept' name='dept' onchange='manual_entry_dept()'><option value=''></option></select></td></tr><tr><td>Section </td><td>:</td><td><select style="width:150px;" id='section' name='section' onchange='manual_entry_section()'><option value=''></option></select></td></tr><tr><td>Line No </td><td>:</td><td><select style="width:150px;" id='line' name='line' onchange='manual_entry_desig()'><option value=''></option></select></td> </tr><tr><td>Designation </td><td>:</td><td><select style="width:150px;" id='desig' name='desig' onchange='manual_entry_desig()'><option value=''></option></select></td></tr>
<tr><td></td><td></td><td><input type='button' name='btn' id='btn' onclick='manual_entry_save()' value='Save' size='15'></td></tr></table></div></td><td width='20%'></td></tr></table></form>
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