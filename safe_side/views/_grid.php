<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MSH Payroll Reports</title>

  <?php $base_url = base_url();   
    $base_url = base_url();
	
	?>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>themes/redmond/jquery-ui-1.8.2.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>themes/ui.jqgrid.css" />
	 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>css/calendar.css" />
		
	<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.min.js"></script>
	<script src="<?php echo $base_url; ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/grid_content.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/calendar_eu.js" type="text/javascript"></script>
	

</head>
<body bgcolor="#3263A6">
<div style=" margin:0 auto; width:1000px; min-height:555px; border:#990000 1px solid; overflow:hidden; font-size:12px;">
<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
<form name="grid">
<div>

<fieldset style='width:95%;'><legend><font size='+1'><b>Date</b></font></legend>
First Date: <input type="text" name="firstdate" id="firstdate" style="width:100px;"/>

	<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'grid',
		// input name
		'controlname': 'firstdate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>
&nbsp;&nbsp; TO &nbsp;&nbsp; Second Date: <input type="text" name="seconddate" id="seconddate" style="width:100px;"/>
 
 <script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'grid',
		// input name
		'controlname': 'seconddate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>
 </div>
</fieldset>
<br />
<div>
<fieldset style='width:95%;'><legend><font size='+1'><b>Category Options</b></font></legend>
<table>
<tr>
<td>Start</td><td>:</td><td><select name='grid_start' id='grid_start' style="width:250px;" onchange='grid_get_all_data()' /><option value='Select'>Select</option><option value='all'>ALL</option></select></td>
<td>Dept. </td><td>:</td><td><select id='grid_dept' name='grid_dept' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
<tr><td>Section </td><td>:</td><td><select id='grid_section' name='grid_section' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Line </td><td>:</td><td><select id='grid_line' name='grid_line' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
<tr><td>Desig. </td><td>:</td><td><select id='grid_desig' name='grid_desig' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Sex </td><td>:</td><td><select id='grid_sex' name='grid_sex' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></select></td>
</tr>
<tr><td>Status</td><td>:</td><td><select id='grid_status' name='grid_status' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
</table>
</fieldset>
</div>
<div>
<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Daily Reports</b></font></legend>
<table width="100%"  style="font-size:11px; ">
<tr >
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Present Report" onClick="grid_daily_present_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Absent Report" onClick="grid_daily_absent_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Leave Report" onClick="grid_daily_leave_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Late Report" onClick="grid_daily_late_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Out Punch Miss" onClick="grid_daily_out_punch_miss_report()"></td>
</tr>
</table>

</fieldset>
<br />

<fieldset style='width:95%;'><legend><font size='+1'><b>Monthly Reports</b></font></legend>
<table width="100%"  style="font-size:11px; ">
<tr >
<td ><input type="button" style="width:20%; font-size:100%;" value="Attendance Register" onClick="grid_monthly_att_register()"></td>

</tr>
</table>

</fieldset>
<br />

<fieldset style='width:95%;'><legend><font size='+1'><b>Continuous Reports</b></font></legend>
<table width="100%"  style="font-size:11px; ">
<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Present Report" onClick="grid_continuous_present_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Absent Report" onClick="grid_continuous_absent_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Leave Report" onClick="grid_continuous_leave_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Late Report" onClick="grid_continuous_late_report()"></td>
</tr>
</table>

</fieldset>

<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Other Reports</b></font></legend>
<table  width="100%"  style="font-size:11px; ">
<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="App. Latter" onClick="grid_app_letter()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Pay Slip" onClick="grid_pay_slip()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="ID Card" onClick="grid_id_card()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Job Card" onClick="grid_job_card()"></td>
</tr>
<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Extra OT" onClick="grid_extra_ot()"></td>
</tr>
</table>

</fieldset>

</div>

</form>

</div>
<div style="float:right;">
<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
</div>
<!--<div id="pager1"></div>-->

<div id="viewid"></div>
</div>
</body>
</html>