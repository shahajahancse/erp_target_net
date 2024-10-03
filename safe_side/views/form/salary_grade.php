<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>


<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>


</head>

<body bgcolor="#ECE9D8">

<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">

<fieldset style='width:600px;'><legend><font size='+1'><b>Salary Grade</b></font></legend>
<form  name='myForm_grade'><table width='90%' border='0' align='center'><tr><td width='40%'>Grade Name</td><td><input type='text' size='40px' id='gr_name' onchange='ajaxSearch_grade()' ></td></tr><tr><td width='40%'>Basic Salary(Start)</td><td><input type='text' size='40px' id='gr_str_basic'></td></tr><tr><td width='20%'>Basic Salary (End)</td><td><input type='text' size='40px' id='gr_end_basic'></td></tr><tr><td width='20%'>Grade Incriment (1st)</td><td><input type='text' size='40px' id='gr_incr1'></td></tr><tr><td width='20%'>Grade phase (1st)</td><td><input type='text' size='40px' id='gr_1st_phase'></td></tr><tr><td width='20%'>Grade Incriment (2nd)</td><td><input type='text' size='40px' id='gr_incr2'></td></tr><tr><td width='20%'>Grade Phase(2nd)</td><td><input type='text' size='40px' id='gr_2nd_phase'></td></tr><br/><tr><td align='center' colspan='2'><input type='button' onclick='ajax_grade_Insert()' value='INSERT'/><input type='button' onclick='ajax_grade_update()' value='UPDATE'/><input type='button' onclick='ajax_grade_Delete()' value='DELETE'/</td></tr></table></form>
</fieldset>

</div>

</body>
</html>