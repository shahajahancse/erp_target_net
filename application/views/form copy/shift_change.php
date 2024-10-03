<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>


<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>


</head>

<body bgcolor="#ECE9D8">

<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">

<fieldset style='width:600px;'><legend><font size='+1'><b>Shift Manage</b></font></legend>
<form  name='shift_change' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='20%'>Shift Name</td><td><input type='text' size='40px' id='sh_nam'></td></tr><tr><td width='20%'>Shift Time</td><td><select id='shift_time' name='shift_time'><option valu=''></option></select></td></tr><br/><tr><td align='right' width='20%'>Find Shift Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='sh_name' id='sh_name' onchange='shift_change_search()'>&nbsp;<input type='button' name='add' onclick='enable_shiftchange()' value='NEW'/>&nbsp;<input type='button' name='schange_save' disabled='disabled' onclick='save_schange()' value='SAVE'/>&nbsp;<input type='button' onclick='update_shift_time()' value='EDIT'/>&nbsp;</td></tr><tr></table></form>
</fieldset>

</div>

</body>
</html>