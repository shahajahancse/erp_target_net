<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Info</title>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>

<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>

<style type="text/css">
.cominfo td{
font-weight:bold;

}
.cominfo select{
width:265px;
}
.bangla{
font-family:SolaimanLipi;
font-size:15px;
}
</style>

</head>

<body bgcolor="#ECE9D8">
<div align="center" style=" width:100%; overflow:hidden;" >
<div  style="width:90%;">
<div id="error_id" style="display:none;">
<?php echo $validation_errors =  validation_errors(); ?>
</div>
<?php  
if($validation_errors != '')
{
	echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(document.getElementById('error_id').innerHTML);</SCRIPT>"; 
}
?>
<form name='cominfo' class="cominfo"  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>index.php/emp_info_con/personal_info_view1" >
<table cellpadding="0" cellspacing="0" width='100%' border='0' align='center'>
<tr>
  <td width='14%'>Emp Id </td>
  <td width="26%">
    <input type='text' size='29px' id='empid' name='empid' value="<?php echo set_value('empid'); ?>"/>
  
    </td>
  <td width='14%'></td>
  <td width="26%">
    
  </td>
  <td width="20%" rowspan="6"><div style='width:150; height:120px; float:left; padding:5px; '><img id='img'  name='image' alt=''><div id='emp_status' style='font-size:14px;color:blue;'></div></div></td>
</tr>

<tr><td width='14%'>Full Name(English)</td>
<td><input  type='text' size='29px' id='name' name="name" value="<?php echo set_value('name'); ?>"></td>
<td width='14%'>Full Name(Bangla)</td>
<td><input style="width:196px;" class="bangla" type='text' id='bname' name="bname" value="<?php echo set_value('bname'); ?>"></td>
</tr>




<tr><td width='14%'>Mother's Name</td>
<td><input type='text' size='29px' id='mname' name="mname" value="<?php echo set_value('mname'); ?>"></td>
<td width='14%'>Father's Name</td>
<td><input type='text' size='29px' id='fname' name="fname" value="<?php echo set_value('fname'); ?>"></td>
</tr>
<tr><td width='14%'>Present Add.</td>
<td><input type='text' size='29px' id='padd' name='padd' value="<?php echo set_value('padd'); ?>"></td>
<td width='14%'>Permanent Add.</td>
<td><input type='text' size='29px' id='fadd' name='fadd' value="<?php echo set_value('fadd'); ?>"></td>
</tr>
<tr><td width='14%'>Date Of Birth</td>
<td><input type='text' size='25px' id='dob' name="dob"  value="<?php echo set_value('dob'); ?>" />
  <script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'cominfo',
		// input name
		'controlname': 'dob'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script></td>
<td>Photo</td><td><input type='file' value='Image Source' name='userfile' id='source' size="15px" /></td>
</tr>
<tr><td width='14%'>Religion</td>
<td> <select style="width:198px;"  id='reli' name="reli">
  <option value='1'>Islam</option>
  <option value='2'>Hindu</option>
  <option value='3'>Christian</option>
  <option value='4'>Buddish</option>
</select></td>
<td width='14%'>Sex</td>
<td><select style="width:198px;" id='sex' name="sex"><option value='1'>Male</option><option value='2'>Female</option></select></td>
</tr>
<tr><td width='14%'>Marital Status</td>
<td><select style="width:198px;" id='ms' name="ms"><option value='1'>Unmarried</option><option value='2'>Married</option></select></td>
<td width='14%'>Blood Group</td>
<td><select style="width:198px;" id='bgroup' name="bgroup"><option value='0'>None</option><option value='1'>A+</option><option value='2'>A-</option><option value='3'>B+</option><option value='4'>B-</option><option value='5'>AB+</option><option value='6'>AB-</option><option value='7'>O+</option><option value='8'>O-</option></select></td>
</tr></table>

<table width='100%' cellpadding="0" cellspacing="0" border='0' align='center' style='padding:2px'>
<tr><td width="14%">Punch Card No.</td>
  <td width="26%"><input  type='text' id='idcard' name="idcard" size='29px'  value="<?php echo set_value('idcard'); ?>"/></td>
  <td width="14%">Department</td>
  <td width="46%"><select style="width:198px;" id='dept' name='dept'><option value=''></option></select></td>
</tr>
<tr><td>Section</td>
<td><select style="width:198px;" id='sec' name='sec' >
    <option value=''></option>
  </select></td>
  <td>Designation</td>
  <td><select style="width:198px;" id='desig' name='desig' onchange='com_info_grade()'>
    <option value=''></option>
  </select></td>
</tr>
<tr><td height="26">Line Number</td>
<td><select style="width:198px;" id='line' name='line' ><option value=''></option></select></td>
  <td>Position</td>
  <td><select style="width:198px;" id='position' name='position' >
    <option value=''></option>
  </select></td>
</tr>
<tr><td>Operation</td><td><select style="width:198px;" id='operation' name='operation'><option value=''></option></select></td>
  <td>Emp Status</td>
  <td><select style="width:198px;" id='empstat' name='empstat' >
    <option value=''></option>
  </select></td>
</tr>
<tr><td>Salary Grade</td><td><select style="width:198px;" id='salg' name='salg' onchange='com_info_empstat()'><option value=''></option></select></td>
  <td>OT Entitle</td>
  <td><select style="width:198px;" id='otentitle' name='otentitle' >
    <option value=''></option>
  </select></td>
</tr>
<tr><td>Emp Shift</td><td><select style="width:198px;" id='empshift' name='empshift' ><option value=''></option></select></td>
  <td>Lunch Entitle</td>
  <td><select style="width:198px;" id='lunch' name='lunch' >
    <option value=''></option>
  </select></td>
</tr>
<tr><td>Transport Entitle</td><td><select style="width:198px;" id='transport' name='transport' ><option value=''></option></select></td>
  <td>Emp join date</td>
  <td><input  type='text' size='25px' id='ejd' name="ejd" value="<?php echo set_value('bname'); ?>" />
      <script language="JavaScript" type="text/javascript">
	var o_cal = new tcal ({
		// form name
		'formname': 'cominfo',
		// input name
		'controlname': 'ejd'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>  </td>
<tr><td>Att. Bonus</td><td><select style="width:198px;" id='attbonus' name='attbonus' onchange='com_info_alert()'><option value=''></option></select></td>
  <td>Salary Type</td>
  <td><select style="width:198px;" id='saltype' name='saltype' >
    <option value=''></option>
  </select></td>
</tr>
<tr><tr><td>Salary Withdraw</td><td><select style="width:198px;" id='saldraw' name='saldraw' ><option value=''></option></select></td> <td>&nbsp;</td><td>&nbsp;</td> </tr>
</table>


 
<table width='100%' border='0' align='center'>
<tr><td width='14%'>Emp Last Dgree</td>
  <td width="26%"><input name="text2" type='text' id='emp_last_dg' size='29px'  value="<?php echo set_value('text2'); ?>"/></td>
  <td width='14%'>Passing year</td>
  <td width="46%"><input name="text3" type='text' id='pass_year' size='29px'  value="<?php echo set_value('text3'); ?>"/></td></tr>
<tr><td width='14%'>Passing Institute</td>
<td><input name="text4" type='text' id='edu_insti' size='29px'  value="<?php echo set_value('text4'); ?>"/></td>
<td width='14%'>Emp skill dept.</td>
<td><input name="text5" type='text' id='skill_dept' size='29px'  value="<?php echo set_value('text5'); ?>"/></td></tr>
<tr><td width='14%'>Year of Skill</td>
<td><input name="text6" type='text' id='skill_year' size='29px'  value="<?php echo set_value('text6'); ?>"/></td>
<td width='14%'>Company Name</td>
<td><input name="text7" type='text' id='skill_com_na' size='29px'  value="<?php echo set_value('text7'); ?>"/></td></tr></table>

<table cellpadding="0" cellspacing="0" width='100%' border='0' align='center'>
  <tr style='background-color:#CCCCCC'>
    <td width="6%">Salary</td>
    <td width="94%"><table cellpadding="0" cellspacing="0"  width='100%' border='0' align='center' >
      <tr>
        <td width="9%">Gross</td>
        <td width="27%"><input name="text8" type='text' id='gsal'  onchange='basic_sal_cal()' size='29px'  value="<?php echo set_value('text8'); ?>"/></td>
        <td width="15%">Basic</td>
        <td width="49%"><input name="text8" type='text' disabled='disabled' id='bsal'  size='29px' /></td>
      </tr>
      <tr>
        <td>House</td>
        <td><input name="text8" type='text' disabled='disabled' id='hrent'  size='29px' /></td>
        <td>Medical</td>
        <td><input name="text8" type='text' disabled='disabled' id='mallow' size='29px' /></td>
      </tr>
    </table></td>
  </tr>
</table>
 <input type='button' name='add' onclick='enable_save()' value='NEW'/>&nbsp;<input type="submit" name='pi_save' disabled='disabled'  value='SAVE'  />&nbsp;<input type="submit" name="pi_edit" id="pi_edit" disabled="disabled"  value='EDIT'/></form>Find ID :
  <input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange="com_info_Search1()"  />
  
  </div>
   </div>

 
</body>
</html>