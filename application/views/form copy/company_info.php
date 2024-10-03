<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Company Info</title>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>

<style type="text/css">
.cominfo td{
padding-left:5px;
font-weight:bold;

}
.cominfo select{
width:265px;
}
</style>

</head>

<body bgcolor="#ECE9D8">
<fieldset style='width:95%;'><legend><font size='+1'><b>Company Information</b></font></legend>

<div align="center" style=" width:100%; overflow:hidden;" >
<div  style="width:90%;">
<form name='cominfo' class="cominfo">
<table width='100%' border='0' align='center' style='padding:10px'>
<tr><td>Emp ID</td><td><input type='text' size='40px' id='com_empid' name='com_empid'></td>
<td>Punch Card No.</td><td><input type='text' size='40px' id='idcard'></td></tr>
<tr><td>Department</td><td><select id='dept' name='sele'><option value=''></option></select></td>
<td>Section</td><td><select id='sec' name='section' ><option value=''></option></select></td></tr>
<tr><td>Line Number</td><td><select id='line' name='line' ><option value=''></option></select></td>
<td>Designation</td><td><select id='desig' name='desig' onchange='com_info_grade()'><option value=''></option></select></td></tr>
<tr><td>Operation</td><td><select id='operation' name='operation'><option value=''></option></select></td>
<td>Position</td><td><select id='position' name='position' ><option value=''></option></select></td></tr>
<tr><td>Salary Grade</td><td><select id='salg' name='salg' onchange='com_info_empstat()'><option value=''></option></select></td>
<td>Emp Status</td><td><select id='empstat' name='empstat' ><option value=''></option></select></td></tr>
<tr><td>Emp Shift</td><td><select id='empshift' name='empshift' ><option value=''></option></select></td>
<td>OT Entitle</td><td><select id='otentitle' name='otentitle' ><option value=''></option></select></td></tr>
<tr><td>Transport Entitle</td><td><select id='transport' name='transport' ><option value=''></option></select></td>
<td>Lunch Entitle</td><td><select id='lunch' name='lunch' ><option value=''></option></select></td>
<tr><td>Att. Bonus</td><td><select id='attbonus' name='attbonus' onchange='com_info_alert()'><option value=''></option></select></td>
<td>Emp join date</td><td><input  type='text' size='35px' id='ejd' name="ejd">
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'cominfo',
		// input name
		'controlname': 'ejd'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>

</td></tr>
<tr><tr><td>Salary Withdraw</td><td><select id='saldraw' name='saldraw' ><option value=''></option></select></td> <td>Salary Type</td><td><select id='saltype' name='saltype' ><option value=''></option></select></td> </tr>

</table>
<table width='60%' border='0' align='center' style='padding:10px'>
<tr style='background-color:#CCCCCC'><td>Salary</td><td><table width='100%' border='0' align='center' ><tr><td>Gross</td><td><input style='width:120px;' type='text' size='40px' id='gsal' onchange='basic_sal_cal()'></td><td>Basic</td><td><input style='width:120px;' type='text' size='40px' id='bsal' disabled='disabled'></td></tr><tr><td>House</td><td><input style='width:120px;' type='text' size='40px' id='hrent' disabled='disabled'></td><td>Medical</td><td><input style='width:120px;' type='text' size='40px' id='mallow' disabled='disabled'></td></tr></table></td></tr></table>
<br/><br/><br/>
<table>

<tr><td align='center' colspan='2'>Find ID :<input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange='com_info_Search()'>&nbsp;<input type='button' name='add' onclick='enable_save()' value='NEW'/>&nbsp;<input type='button' name='save' disabled='disabled' onclick='com_info_insert()' value='SAVE'/>&nbsp;<input type='button' onclick='com_info_edit()' value='EDIT'/></td></tr></table></form>
</div>
</div>

</fieldset>
</body>
</html>