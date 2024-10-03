<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MSH Payroll Reports</title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>themes/redmond/jquery-ui-1.8.2.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>themes/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />
		
	<script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/production.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>
	

</head>
<body bgcolor="#ECE9D8">
<div align="center" style=" margin:0 auto; width:1000px; min-height:555px; overflow:hidden;">
<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
<form name="grid" target="_blank">
<div>
<fieldset style='width:95%;'><legend><font size='+1'><b>Date</b></font></legend>
<table>
<tr>
<td>First Date </td><td>:</td><td> <input type="text" name="firstdate" id="firstdate" style="width:100px;"/></td>
<td>
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
</td>
<td>TO Second Date</td><td>:</td><td> <input type="text" name="seconddate" id="seconddate" style="width:100px;"/></td>
<td>
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
</td>
</tr>
<tr>
<td>First Time</td><td>:</td><td> <input name="f_time" id="f_time" style="width:100px;" /> </td><td></td>
<td>TO Second Time</td><td>:</td><td> <input name="s_time" id="s_time" style="width:100px;"/></td><td></td>
</tr>
</table>

</fieldset>
 </div>
<br />
<div>
<fieldset style='width:95%;'><legend><font size='+1'><b>Category Options</b></font></legend>
<table>
<tr>
<td>Start</td><td>:</td><td><select name='grid_start' id='grid_start' style="width:250px;" onchange='grid_get_all_data_production()' /><option value='Select'>Select</option><option value='all'>ALL</option></select></td>
<td>Dept. </td><td>:</td><td><select id='grid_dept' name='grid_dept' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></td>
</tr>
<tr><td>Section </td><td>:</td><td><select id='grid_section' name='grid_section' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></td>
<td>Block </td><td>:</td><td><select id='grid_line' name='grid_line' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></td>
</tr>
<tr><td>Desig. </td><td>:</td><td><select id='grid_desig' name='grid_desig' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></td>
<td>Sex </td><td>:</td><td><select id='grid_sex' name='grid_sex' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></select></td>
</tr>
<tr><td>Status</td><td>:</td><td><select id='grid_status' name='grid_status' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></td>
<td>Floor</td><td>:</td><td><select id='grid_position' name='grid_position' style="width:250px;" onChange="grid_all_search_production()"><option value=''></option></select></td>
</tr>
</table>
</fieldset>
</div>
<div>
<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Daily Reports</b></font></legend>
<table width="100%"  style="font-size:11px; ">
<tr >
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Production Report" onClick="grid_daily_production_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Production Summary" onClick="grid_daily_production_summary()"></td>
<td style="width:20%;"></td>
<td style="width:20%;"></td>
</tr>
<!--<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Out Punch Miss" onClick="grid_daily_out_punch_miss_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Out & IN Report" onClick="grid_daily_out_in_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily OT" onClick="grid_daily_ot()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Punch Report" onClick="grid_daily_punch_report()"></td>
</tr>-->
<?php
$user_id = $this->acl_model->get_user_id($this->session->userdata('username'));
$acl     = $this->acl_model->get_acl_list($user_id);
if(!in_array(10,$acl))
{
?>
<!--<tr>
<td style="width:20%; background-color: #666666;"><input type="button" style="width:100%; font-size:100%;" value="Daily EOT" onClick="grid_daily_eot()"></td>
<td style="width:20%; background-color: #666666;"><input type="button" style="width:100%; font-size:100%;" value="Actual Present Report" onClick="grid_actual_present_report()"></td>
<td style="width:20%; background-color: #666666;"><input type="button" style="width:100%; font-size:100%;" value="Daily Allowance" onClick="grid_daily_allowance_bills()"></td>
<td style="width:20%;"></td>
</tr>-->
<?php } ?>
</table>

</fieldset>
<br />

<fieldset style='width:95%;'><legend><font size='+1'><b>Monthly Reports</b></font></legend>
<table width="75%"  style="font-size:11px; float: left;">
<tr >

<td style="width:30%;"><input type="button" style=" width:100%; font-size:100%;" value="Monthly Cost Sheet" onClick="production_monthly_cost_sheet()"></td>
<td style="width:30%;"><input type="button" style=" width:100%; font-size:100%;" value="Monthly Attn. Register" onClick="production_monthly_attn_register()"></td>
</tr>
</table>

</fieldset>
<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Continuous Reports</b></font></legend>
<table width="75%"  style="font-size:11px; float: left;">
<tr >
<td style="width:30%;"><input type="button" style=" width:100%; font-size:100%;" value="Section wise Production Summary " onClick="grid_continious_section_production_summary()"></td>
<td style="width:30%;"><input type="button" style=" width:100%; font-size:100%;" value="Floor wise Production Summary " onClick="grid_continious_floor_production_summary()"></td>
<td style="width:20%;"></td>
</tr>
</table>

</fieldset>
<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Other Reports</b></font></legend>
<table  width="100%"  style="font-size:11px; ">
<tr>
<!--<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="App. Latter" onClick="grid_app_letter()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="ID Card Bangla" onClick="grid_id_card()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="ID Card English" onClick="grid_id_card_english()"></td>-->
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Production Summary" onClick="production_summary()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Production Job Card" onClick="production_job_card()"></td>
<td style="width:20%;"></td>
<td style="width:20%;"></td>
</tr>
</table>

</fieldset>

</div>

</form>

</div>
<div style="float:right;">
<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
</div>


<div id="viewid"></div>
</div>
</body>
</html>