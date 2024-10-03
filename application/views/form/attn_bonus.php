<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>


<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>


</head>

<body bgcolor="#ECE9D8">

<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">

<fieldset style='width:600px;'><legend><font size='+1'><b>Attendance Bonus</b></font></legend>
<form  name='Att_bonus' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='attn_b_id' id='attn_b_id' ></td></tr><tr><td width='20%'>Rules Name</td><td><input type='text' size='40px' id='ab_rul_name'></td></tr><tr><td width='20%'>Rule</td><td><input type='text' size='40px' id='ab_rule'></td></tr><br/><tr><td align='right' width='20%'>Find Rules Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_attn_name' id='check_attn_name' onchange='find_att_name()'>&nbsp;<input type='button' name='add' onclick='enable_attnbname()' value='NEW'/>&nbsp;<input type='button' name='attb_save' disabled='disabled' onclick='save_atttbname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_attnbname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_attnbname()' value='DELETE'/></td></tr><tr></table></form>
</fieldset>

</div>

</body>
</html>