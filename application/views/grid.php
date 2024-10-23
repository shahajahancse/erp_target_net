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
	<script src="<?php echo base_url(); ?>js/grid_content.js" type="text/javascript"></script>
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
<td>Block </td><td>:</td><td><select id='grid_line' name='grid_line' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
<tr><td>Desig. </td><td>:</td><td><select id='grid_desig' name='grid_desig' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Sex </td><td>:</td><td><select id='grid_sex' name='grid_sex' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></select></td>
</tr>
<tr><td>Status</td><td>:</td><td><select id='grid_status' name='grid_status' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Floor</td><td>:</td><td><select id='grid_position' name='grid_position' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>

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
</tr>
<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Out Punch Miss" onClick="grid_daily_out_punch_miss_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Out & IN Report" onClick="grid_daily_out_in_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily OT" onClick="grid_daily_ot()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Daily Punch Report" onClick="grid_daily_punch_report()"></td>
</tr>
<?php
$user_id = $this->acl_model->get_user_id($this->session->userdata('username'));
$acl     = $this->acl_model->get_acl_list($user_id);
if(!in_array(10,$acl))
{
?>
<tr>
<td style="width:20%; background-color: #666666;"><input type="button" style="width:100%; font-size:100%;" value="Daily EOT" onClick="grid_daily_eot()"></td>
<td style="width:20%; background-color: #666666;"><input type="button" style="width:100%; font-size:100%;" value="Actual Present Report" onClick="grid_actual_present_report()"></td>
<td style="width:20%; background-color: #666666;"><input type="button" style="width:100%; font-size:100%;" value="Daily Allowance" onClick="grid_daily_allowance_bills()"></td>
<td style="width:20%;"></td>
</tr>
<?php } ?>
</table>

</fieldset>
<br />

<fieldset style='width:95%;'><legend><font size='+1'><b>Monthly Reports</b></font></legend>
<table width="75%"  style="font-size:11px; float: left;">
<tr >
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" value="Attendance Register" onClick="grid_monthly_att_register()"></td>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" value="OT Register" onClick="grid_monthly_ot_register()"></td>
<?php
$user_id = $this->acl_model->get_user_id($this->session->userdata('username'));
$acl     = $this->acl_model->get_acl_list($user_id);
if(!in_array(10,$acl))
{
?>
<td style="width:20%; background-color: #666666;">
<input type="button" style=" width:100%; font-size:100%; " value="EOT Register" onClick="grid_monthly_eot_register()">
</td>
<?php } ?>

<!--<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" value="EOT Summary" onClick=""></td>-->
<!--<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" value="Leave Ledger" onClick=""></td>-->

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
<tr>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;"  value="Increment Report" onClick="grid_continuous_incre_report()"></td>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;"  value="Promotion Report" onClick="grid_continuous_prom_report()"></td>
<td style="width:20%;"></td>
</tr>
</table>

</fieldset>

<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Other Reports</b></font></legend>
<table  width="100%"  style="font-size:11px; ">
<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Generate Employee List" onclick="get_employee_list()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="App. Latter" onClick="grid_app_letter()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="ID Card Bangla" onClick="grid_id_card()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="ID Card English" onClick="grid_id_card_english()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Job Card" onClick="grid_actual_job_card()"></td>
</tr>
<tr>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="New Join Report" onClick="grid_new_join_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Resign Report" onClick="grid_resign_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Separation Report" onClick="grid_left_report()"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Genaral Report" onClick="grid_general_info()"></td>
</tr>

<tr>
<td style="width:20%;">
<?php
$user_id = $this->acl_model->get_user_id($this->session->userdata('username'));
$acl     = $this->acl_model->get_acl_list($user_id);
if(!in_array(10,$acl))
{
?>
<input type="button" style="width:100%; font-size:100%;" value="EOT Job Card" onClick="grid_extra_ot()">
<?php } ?>
</td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Earn Leave Report" onClick="grid_earn_leave()"></td>

<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Pitch Rate Letter" onClick="new_join_letter_report(1)"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Stuff Appoinment Letter" onClick="new_join_letter_report(2)"></td>
<td style="width:20%;"><input type="button" style="width:100%; font-size:100%;" value="Fixed Appoinment Letter" onClick="new_join_letter_report(3)"></td>
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
<!--<div id="pager1"></div>-->

<div id="viewid"></div>
</div>



<script>
	var grid_actual_job_card_window; // Declare a variable outside the function to store the window reference

	function grid_actual_job_card(){
		var firstdate = document.getElementById('firstdate').value;    
		if(firstdate == ''){
			alert("Please select First date");
			return;
		}
		var seconddate = document.getElementById('seconddate').value;    
		if(seconddate == ''){
			alert("Please select Second date");
			return;
		}
		
		var grid_start = document.getElementById('grid_start').value;
		if(grid_start == 'Select'){
			alert("Please select Category options");
			return;
		}
		
		$grid  = $("#list1");
		var id_array = $grid.getGridParam('selarrrow');
		var spl = (id_array.join('xxx'));
		
		if(spl == ''){
			alert("Please select Employee ID");
			return;
		}
		
		var hostname = window.location.hostname;
		var url =  "http://" + hostname + "/erp_target_net/index.php/grid_con/grid_actual_job_card/" + firstdate + "/" + seconddate + "/" + spl;

		if (!grid_actual_job_card_window || grid_actual_job_card_window.closed) {
			grid_actual_job_card_window = window.open(url, 'grid_actual_job_card', "menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
		} else {
			grid_actual_job_card_window.location.href = url;
		}
		
		grid_actual_job_card_window.moveTo(0,0);    
		grid_actual_job_card_window.focus(); // Bring the window to focus
	}

</script>


<script>
	function get_employee_list()
{

	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target_net/index.php/grid_con/get_employee_list/";
	
	app_letter = window.open(url,'app_letter',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	app_letter.moveTo(0,0);
}
</script>
</body>
</html>