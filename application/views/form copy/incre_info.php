<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Info</title>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>

<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>
<script>
function enableemstate() {
document.getElementById('empstat').disabled=false;
}
</script>
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
<div align="center" style=" width:900px; overflow:hidden;" >
<div  style="width:900px;">
<div id="error_id" style="display:none; color:red;">
<?php echo $validation_errors =  validation_errors(); ?>
</div>
<?php  
if($validation_errors != '')
{
	echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(document.getElementById('error_id').innerHTML);</SCRIPT>"; 
}
?>
<form name='cominfo' class="cominfo"  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>index.php/emp_increment_con/increment_info" >
<table cellpadding="0" cellspacing="0" width='900px' border='0' align='center'>
<tr>
  <td width='135px'>Emp Id </td>
  <td width='250px'>
    <input type='text' size='29px' id='empid' name='empid' value="<?php echo set_value('empid'); ?>"  required />
  
    </td>
<td width='135px'>Effective Date</td>
<td><input type='text' size='25px' id='entdate' name="entdate"  value="<?php echo set_value('entdate'); ?>" />
  <script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'cominfo',
		// input name
		'controlname': 'entdate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script></td>
  
</tr>
</table>



<table width='900px' cellpadding="0" cellspacing="0" border='0' align='center'>

  <td width="135">Department</td>
  <td width="252">
  	<select style="width:198px;" id='dept' name='dept' disabled="disabled">
		<?php $department_name = $this->processdb->get_department_name();
		foreach($department_name->result() as $rows) { 
			if($this->input->post('dept') == $rows->dept_id) {?>
				<option value="<?php echo $rows->dept_id; ?>" selected="selected"><?php echo $rows->dept_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->dept_id; ?>"><?php echo $rows->dept_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>
	</select>
  </td>
  <td>Section</td>
<td>
	<select style="width:198px;" id='sec' name='sec' disabled="disabled">
    	<?php $section_name = $this->processdb->get_section_name();
		foreach($section_name->result() as $rows) { 
			if($this->input->post('sec') == $rows->sec_id) {?>
				<option value="<?php echo $rows->sec_id; ?>" selected="selected"><?php echo $rows->sec_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->sec_id; ?>"><?php echo $rows->sec_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>
  	</select>
</td>
</tr>
<tr>
<td>Line Number</td>
<td>
	<select style="width:198px;" id='line' name='line' disabled="disabled">
		<?php $line_name = $this->processdb->get_line_name();
		foreach($line_name->result() as $rows) { 
			if($this->input->post('line') == $rows->line_id) {?>
				<option value="<?php echo $rows->line_id; ?>" selected="selected"><?php echo $rows->line_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->line_id; ?>"><?php echo $rows->line_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>
</td>
  <td width="134">Designation</td>
  <td width="379">
	<select style="width:198px;" id='desig' name='desig' disabled="disabled">
    	<?php $designation_name = $this->processdb->get_designation_name();
		foreach($designation_name->result() as $rows) { 
			if($this->input->post('desig') == $rows->desig_id) {?>
				<option value="<?php echo $rows->desig_id; ?>" selected="selected"><?php echo $rows->desig_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->desig_id; ?>"><?php echo $rows->desig_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>
	</select>
 </td>
</tr>
<tr>
  <td>Emp Status</td>
  <td>
	<select style="width:198px;" id='empstat' name='empstat'  disabled="disabled" >
    	<?php $status_name = $this->processdb->get_status_name();
		foreach($status_name->result() as $rows) { 
			if($this->input->post('empstat') == $rows->stat_id) {?>
				<option value="<?php echo $rows->stat_id; ?>" selected="selected"><?php echo $rows->stat_type; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->stat_id; ?>"><?php echo $rows->stat_type; ?></option>	
			<?php } ?>	
			
		<?php } ?>		
  	</select>

  </td>
  <td>Salary Grade</td><td>
	<select style="width:198px;" id='salg' name='salg'>
		<?php $grade_name = $this->processdb->get_grade_name();
		foreach($grade_name->result() as $rows) { 
			if($this->input->post('salg') == $rows->gr_id) {?>
				<option value="<?php echo $rows->gr_id; ?>" selected="selected"><?php echo $rows->gr_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->gr_id; ?>"><?php echo $rows->gr_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>
	</td>
</tr>

</table>


<table cellpadding="0" cellspacing="0" width='900px' border='0' align='center'>
  <tr style='background-color:#CCCCCC'>
    <td width="35px">Salary</td>
    <td>
	<table cellpadding="0" cellspacing="0"  width='865px' border='0' align='center' >
      <tr>
        <td  width="92px">Gross</td>
        <td width="250px"><input name="text8" type='text' id='gsal'  onchange='basic_sal_cal()' size='29px'  value="<?php echo set_value('text8'); ?>" required/></td>
        <td width="135px">Basic</td>
        <td  style="background-color:#ECE9D8"><input name="text8" type='text' disabled='disabled' id='bsal'  size='29px' /></td>
      </tr>
      <tr>
        <td>House</td>
        <td><input name="text8" type='text' disabled='disabled' id='hrent'  size='29px' /></td>
        <td>Medical</td>
        <td style="background-color:#ECE9D8"><input name="text8" type='text' disabled='disabled' id='mallow' size='29px' /></td>
      </tr>
    </table></td>
  </tr>
</table>
 <input type='button' name='add' onclick='clear_data_incre_prom()' value='NEW'/>&nbsp;<input type="submit" name='pi_save'   value='SAVE'  style="display:none"/>&nbsp;<input type="submit" name="pi_edit" id="pi_edit" disabled="disabled" onclick="enableemstate()"  value='EDIT'/></form>Find ID :
  <input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange="com_incre_prom_search()"  />
  
  </div>
   </div>
<?php if($this->input->post('pi_edit')) {echo "<SCRIPT LANGUAGE=\"JavaScript\">document.cominfo.pi_edit.disabled = false; document.cominfo.pi_save.disabled = true;</SCRIPT>";} ?>
 
</body>
</html>