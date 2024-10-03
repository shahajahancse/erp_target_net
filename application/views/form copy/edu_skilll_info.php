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
<fieldset style='width:95%;'><legend><font size='+1'><b>Education & Skill</b></font></legend>

<div align="center" style=" width:100%; overflow:hidden; " >
<div class="perinfo" style="width:80%; ">
<form  name='eduskill' ><table width='100%' border='0' align='center'><tr><td width='30%'>Emp ID</td><td><input type='text' size='30px' id='edu_empid' ></td></tr><tr><td width='30%'>Emp Last Dgree</td><td><input type='text' size='30px' id='emp_last_dg'></td></tr><tr><td width='20%'>Passing year</td><td><input type='text' size='30px' id='pass_year'></td></tr><tr><td width='30%'>Passing Institute</td><td><input type='text' size='30px' id='edu_insti'></td></tr><tr><td width='20%'>Emp skill dept.</td><td><input type='text' size='30px' id='skill_dept'></td></tr><tr><td width='30%'>Year of Skill</td><td><input type='text' size='30px' id='skill_year'></td></tr><tr><td width='20%'>Company Name</td><td><input type='text' size='30px' id='skill_com_na'></td></tr><br/><tr><td align='right' width='20%'>Find ID :</td><td><input style='background-color:yellow;' type='text' size='15px' id='edu_skill_empid' onchange='ajaxSearch_edu_skill()' ><input type='button' name='add' onclick='edu_enable_save()' value='NEW'/><input type='button' name='edu_save' disabled='disabled' onclick='ajax_edu_skill_Insert()' value='SAVE'/><input type='button' onclick='ajaxu_edu_update()' value='EDIT'/></td></tr></table></form>
</div>
</div>

</fieldset>
</body>
</html>