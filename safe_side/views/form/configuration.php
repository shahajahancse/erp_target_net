<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>


<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>


</head>

<body bgcolor="#ECE9D8">
<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">
<fieldset style='width:600px;'><legend><font size='+1'><b>Department</b></font></legend>
<form  name='department' >
<table width='100%' border='0' align='center' style='padding:10px'>
<tr><td><input type='hidden' size='40px' name='deptid' id='deptid' ></td></tr>
<tr><td width='30%'>Department Name</td><td><input type='text' size='40px' id='deptname'></td></tr>
<tr><td align='right' width='20%'>Find Dept. Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_dept_name' id='check_dept_name' onchange='find_dept_name()'>&nbsp;<input type='button' name='add' onclick='enable_deptname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_deptname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_deptname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_deptname()' value='DELETE'/></td></tr><tr></table>
</form>
</fieldset>

<fieldset style='width:600px;'><legend><font size='+1'><b>Section</b></font></legend>
<form  name='section' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='sectionid' id='sectionid' ></td></tr><tr><td width='30%'>Section Name (Eng)</td><td><input type='text' size='40px' id='sectionname' name='sectionname'></td></tr><br><tr><td width='30%'>Section Name (Bng)</td><td><input  style="font-size:18px;"type='text' size='29' id='sectionnamebng' name='sectionnamebng'></td></tr><br/><tr><td align='right' width='20%'>Find Section Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_section_name' id='check_section_name' onchange='find_section_name()'>&nbsp;<input type='button' name='add' onclick='enable_sectionname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_sectionname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_sectionname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_sectionname()' value='DELETE'/></td></tr><tr></table></form>
</fieldset>

<fieldset style='width:600px;'><legend><font size='+1'><b>Line Number</b></font></legend>
<form  name='line_form' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='lineid' id='lineid' ></td></tr><tr><td width='30%'>Line Name</td><td><input type='text' size='40px' id='linename'></td></tr><br/><tr><td align='right' width='20%'>Find Line Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_line_name' id='check_line_name' onchange='find_line_name()'>&nbsp;<input type='button' name='add' onclick='enable_linename()' value='NEW'/>&nbsp;<input type='button' name='line_save' disabled='disabled' onclick='save_linename()' value='SAVE'/>&nbsp;<input type='button' onclick='update_linename()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_linename()' value='DELETE'/></td></tr><tr></table></form>
</fieldset>

<fieldset style='width:600px;'><legend><font size='+1'><b>Designation</b></font></legend>
<form  name='designation' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='designationid' id='designationid' ></td></tr><tr><td width='30%'>Designation Name(Eng)</td><td><input type='text' size='40px' id='designationname'></td></tr><br><tr><td width='30%'>Designation Name(Bng)</td><td><input style="font-size:18px;"type='text' size='29' id='designationnamebng'></td></tr><br/><tr><td align='right' width='20%'>Find Desig. Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_designation_name' id='check_designation_name' onchange='find_designation_name()'>&nbsp;<input type='button' name='add' onclick='enable_designationname()' value='NEW'/>&nbsp;<input type='button' name='designation_save' disabled='disabled' onclick='save_designationname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_designationname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_designationname()' value='DELETE'/></td></tr><tr></table></form>
</fieldset>

<fieldset style='width:600px;'><legend><font size='+1'><b>Operation</b></font></legend>
<form  name='operation' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='operationid' id='operationid' ></td></tr><tr><td width='30%'>Operation Name</td><td><input type='text' size='40px' id='operationname'></td></tr><br/><tr><td align='right' width='20%'>Find operation Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_operation_name' id='check_operation_name' onchange='find_operation_name()'>&nbsp;<input type='button' name='add' onclick='enable_operationname()' value='NEW'/>&nbsp;<input type='button' name='operationname_save' disabled='disabled' onclick='save_operationname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_operationname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_operationname()' value='DELETE'/></td></tr><tr></table></form>
</fieldset>

<fieldset style='width:600px;'><legend><font size='+1'><b>Position</b></font></legend>
<form  name='position' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='positionid' id='positionid' ></td></tr><tr><td width='30%'>Position Name</td><td><input type='text' size='40px' id='positionname'></td></tr><br/><tr><td align='right' width='20%'>Find position Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_position_name' id='check_position_name' onchange='find_position_name()'>&nbsp;<input type='button' name='add' onclick='enable_positionname()' value='NEW'/>&nbsp;<input type='button' name='designation_save' disabled='disabled' onclick='save_positionname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_positionname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_positionname()' value='DELETE'/></td></tr><tr></table></form>
</fieldset>

</div>

</body>
</html>