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
<body bgcolor="#ECE9D8">
<div align="center" style=" margin:0 auto; width:1000px; min-height:555px; overflow:hidden;">
<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
<form name="grid">
<div>

<fieldset style="width:95%;"><legend><font size='+1'><b>Date</b></font></legend>
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
</form>
</fieldset>
</div>

<div style="margin:0 auto; width:100%; overflow:hidden;">
<br />
<fieldset style="width:95%;"><legend><font size='+1'><b>Entry Management</b></font></legend>
<div style="margin:0 auto; width:100%; overflow:hidden;">

<!--<div style="margin:0 auto; width:48%; overflow:hidden; float:left;">
<fieldset style="width:90%;"><legend><font size="+1"><b>Attendance</b></font></legend>
<form name='manual_attendance'>
<table>
<tr><td>Time </td><td>:</td><td><input type='text' name='manual_time' id='manual_time' size='16'></td>
<td><input type='button' name='btn' id='btn' onclick='manual_attendance_entry()' value='Insert' size='12'></td></tr>
<tr><td></td><td></td><td> <span style="font-size:12px;"> [HH:MM:SS]</span></td></tr>
</table>
</form>
</fieldset>
</div>-->

<!--<div style="margin:0 auto; width:48%; overflow:hidden; float:right;">
<fieldset style='width:90%;'><legend><font size='+1'><b>Present to Absent</b></font></legend>
<form name='present_absent'>
<table>
<tr><td><input type='button' onclick='manual_entry_Delete()' value='Delete'/></td></tr>
<tr><td><span style="font-size:12px;">[Select First & Second date and employee ID]</span></td></tr>
</table>
</form>
</fieldset>
</div>-->
<!--<br /><br /><br /><br /><br /><br />-->
<div style="margin:0 auto; width:48%; overflow:hidden; float:left;">
<fieldset style='width:90%;'><legend><font size='+1'><b>Weekend</b></font></legend>
<form name='manual_attendance'>
<table>
<tr><td><input type='button' name='btn' id='btn' onclick='save_work_off()' value='Insert' size='15'></td></tr>
<tr><td><span style="font-size:12px;">[Select First date and employee ID]</span></td></tr>
</table>
</form>
</fieldset>
</div>

<div style="margin:0 auto; width:48%; overflow:hidden; float:right;">
<fieldset style='width:90%;'><legend><font size='+1'><b>Holiday</b></font></legend>
<form name='manual_attendance'>
<table>
<tr><td>Description</td><td><input type='text' size='16px' id='holiday_description'><input type='button' name='holiday_save_id'  onclick='save_holiday()' value='Insert'/></td></tr>
<tr><td></td><td><span style="font-size:12px;">[Select First date & insert description]</span></td></tr>
</table>
</form>
</fieldset>
</div>

</div>

</fieldset>

</div>



</div>
<div style="float:right;">
<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
</div>
<!--<div id="pager1"></div>-->

<div id="viewid"></div>
</div>
</body>
</html>