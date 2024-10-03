<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>


<style type="text/css">
.perinfo td{
padding-left:10px;
font-weight:bold;
}
.perinfo select{
width:265px;
}
</style>

</head>

<body bgcolor="#ECE9D8">
<fieldset style='width:95%;'><legend><font size='+1'><b>Personal Information</b></font></legend>

<?php 
if(isset($error))
{
	echo $error;
}
if(isset($data))
{
	echo $data;
}
?>
<div align="center" style=" width:100%; overflow:hidden;" >
<div class="perinfo" style="width:80%; float:left;">

<form  name='com_per_info' enctype="multipart/form-data" method="post" action="<?php echo base_url();?>index.php/payroll_con/personal_info_view" >
<table width='100%' border='0' align='center' style='padding:10px'>
<tr><td width='40%'>Emp Id</td><td><input type='text' size='40px' name='empid' id='empid' ></td>
<td width='20%'>Full Name</td><td><input type='text' size='40px' id='name' name="name"></td></tr>
<tr><td width='20%'>Mother's Name</td><td><input type='text' size='40px' id='mname' name="mname"></td>
<td width='20%'>Father's Name</td><td><input type='text' size='40px' id='fname' name="fname"></td></tr>
<tr><td width='20%'>Present Add.</td><td><input type='text' size='40px' id='padd' name='padd' name="padd" ></td>
<td width='40%'>Permanent Add.</td><td><input type='text' size='40px' id='fadd' name='fadd'  name="fadd"></td></tr>
<tr><td width='20%'>Date Of Birth</td><td><input type='text' size='40px' id='dob' name="dob" style="width:240px;" >
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'com_per_info',
		// input name
		'controlname': 'dob'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>


</td>
<td>Photo</td><td>

<input type='file' value='Image Source' name='userfile' id='source'></td></tr>
<tr><td width='20%'>Religion</td><td><select id='reli' name="reli"><option value='1'>Islam</option><option value='2'>Hindu</option><option value='3'>Christian</option><option value='4'>Buddish</option></select></td>
<td width='20%'>Sex</td><td><select id='sex' name="sex"><option value='1'>Male</option><option value='2'>Female</option></select></td></tr>
<tr><td width='20%'>Marital Status</td><td><select id='ms' name="ms"><option value='1'>Unmarried</option><option value='2'>Married</option></select></td>
<td width='20%'>Blood Group</td><td><select id='bgroup' name="bgroup"><option value='0'>None</option><option value='1'>A+</option><option value='2'>A-</option><option value='3'>B+</option><option value='4'>B-</option><option value='5'>AB+</option><option value='6'>AB-</option><option value='7'>O+</option><option value='8'>O-</option></select></td></tr></table><br/><table><tr><td align='right' width='15%'>Find ID:</td><td><input style='background-color:yellow;' type='text' size='15px' name='pi_empid' id='pi_empid' onchange='ajaxSearch()'>&nbsp;
<a href=""  style=" text-decoration:none;">  
<input type='button' name='add' value='NEW'/>
</a>
&nbsp;<input type='submit' name='pi_save'  value='SAVE'/>&nbsp;
<input type='submit' name='pi_edit' value='EDIT'/>&nbsp;
<input type='button' onclick='ajaxDelete()' value='DELETE'/></td></tr><tr></table>
</form>
</div>


<div style='width:150; height:200px; float:left; padding:5px; '><img id='img'  name='image' alt=''><div id='emp_status' style='font-size:14px;color:blue;'></div></div>
</div>

</fieldset>
</body>
</html>