<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Information</title>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>

<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>

<style type="text/css">
	tr td {
		padding: 4px;
	}
.cominfo td{
/* font-weight:bold; */

}
.cominfo select{
width:265px;
}
.bangla{
font-family:SolaimanLipi;
font-size:15px;
}
form input:focus,form textarea:focus,form select:focus {
  border:1px solid #666;
  background:#e3f1f1;
  }
  select, input, textarea, button {outline:solid 1px gray; resize:none; padding:1px;}
button {outline:solid 1px  #408080; resize:none; margin-right:10px; padding:2px;}

</style>

</head>

<body bgcolor="#ECE9D8">
<div align="left" style=" width:; overflow:hidden;" >
<div  style="width:;">
<div id="error_id" style="display:none; color:red;">
<?php echo $validation_errors =  validation_errors(); ?>
</div>
<?php  
if($validation_errors != '')
{
	echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(document.getElementById('error_id').innerHTML);</SCRIPT>"; 
}
?>
<form name='cominfo' class="cominfo"  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>index.php/emp_info_con/personal_info_view1" >
	
<fieldset style="background:#F2F2E6;">
<table cellpadding="0" cellspacing="1" width='' border='0' align=''>
<tr>
	<td colspan="4" style="text-align:left"><h3><b>Personal Information</b></h3></td>
</tr>


<tr>
  <td>Name(Eng)</td>
  <td><input  type='text' style="width:170px;" id='name' name="name" value="<?php echo set_value('name'); ?>"></td>
  <td>Name(Bng)</td>
 <td><input  style="width:170px;font-family:SUtonnyMJ"  type='text' id='bname' name="bname" value="<?php echo set_value('bname'); ?>"></td>
</tr>

<tr><td>Mother's Name(Eng)</td>
<td><input type='text' style="width:170px;" id='mname' name="mname" value="<?php echo set_value('mname'); ?>"></td>
<td>Mother's Name(Bng)</td>
<td><input type='text' style="width:170px;font-family:SUtonnyMJ" id='m_name_bn' name="m_name_bn" value="<?php echo set_value('m_name_bn'); ?>"></td>
</tr>
<tr><td>Father's Name(Eng)</td>
<td><input type='text' style="width:170px;" id='fname' name="fname" value="<?php echo set_value('fname'); ?>"></td>
<td>Father's Name(Bng)</td>
<td><input type='text' style="width:170px;font-family:SUtonnyMJ" id='f_name_bn' name="f_name_bn" value="<?php echo set_value('f_name_bn'); ?>"></td>
</tr>
<tr><td>Spouse Name(Eng)</td>
<td><input type='text' style="width:170px;" id='spouse_name' name="spouse_name" value="<?php echo set_value('spouse_name'); ?>"></td>
<td>Spouse Name(Bng)</td>
<td><input type='text' style="width:170px;font-family:SUtonnyMJ" id='spouse_name_bn' name="spouse_name_bn" value="<?php echo set_value('spouse_name_bn'); ?>"></td>
</tr>
<tr>
<td>No.of Children</td>
<td><input type='text' style="width:170px;" id='no_child' name="no_child" value="<?php echo set_value('no_child'); ?>"></td>
</tr>
<!-- <tr><td>Present Add.</td>
<td><input type='text' style="width:170px;" id='padd' name='padd' value="<?php echo set_value('padd'); ?>"></td>
<td>Permanent Add.</td>
<td><input type='text' style="width:170px;" id='fadd' name='fadd' value="<?php echo set_value('fadd'); ?>"></td>
</tr> -->
<tr><td>Date Of Birth</td>
<td><input type='text' size='21px' id='dob' name="dob"  value="<?php echo set_value('dob'); ?>" />
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
<td>Photo</td><td><input type='file' value='Image Source' name='userfile' id='source' style="width:166px;" /></td>
</tr>
<tr><td>Religion</td>
<td> 
	<select style="width:174px;"  id='reli' name="reli">
		<?php $religion_name = $this->processdb->get_religion_name();
		foreach($religion_name->result() as $rows) { 
			if($this->input->post('reli') == $rows->religion_id) {?>
				<option value="<?php echo $rows->religion_id; ?>" selected="selected"><?php echo $rows->religion_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->religion_id; ?>"><?php echo $rows->religion_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	    	  
	</select>
</td>
<td>Sex</td>
<td>
	<select style="width:174px;" id='sex' name="sex">
		<?php $sex_name = $this->processdb->get_sex_name();
		foreach($sex_name->result() as $rows) { 
			if($this->input->post('sex') == $rows->sex_id) {?>
				<option value="<?php echo $rows->sex_id; ?>" selected="selected"><?php echo $rows->sex_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->sex_id; ?>"><?php echo $rows->sex_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	  	
	</select>
</td>
</tr>
<tr><td>Marital Status</td>
<td>
	<select style="width:174px;" id='ms' name="ms">
		<?php $matital_status_name = $this->processdb->get_matital_status_name();
		foreach($matital_status_name->result() as $rows) { 
			if($this->input->post('ms') == $rows->marrital_status_id) {?>
				<option value="<?php echo $rows->marrital_status_id; ?>" selected="selected"><?php echo $rows->marrital_status_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->marrital_status_id; ?>"><?php echo $rows->marrital_status_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	  	
	</select>
</td>
<td>Blood Group</td>
<td>
	<select style="width:174px;" id='bgroup' name="bgroup">
		<?php $blood_name = $this->processdb->get_blood_name();
		foreach($blood_name->result() as $rows) { 
			if($this->input->post('bgroup') == $rows->blood_id) {?>
				<option value="<?php echo $rows->blood_id; ?>" selected="selected"><?php echo $rows->blood_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->blood_id; ?>"><?php echo $rows->blood_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	  	
	</select>
</td>
</tr>
<tr>
	<td>Education(Eng)</td>
  	<td><input  type='text' style="width:170px;" id='education' name="education" value="<?php echo set_value('education'); ?>"></td>
	<td>Education(Bng)</td>
  	<td><input  type='text' style="width:170px;font-family:SUtonnyMJ" id='edu_bn' name="edu_bn" value="<?php echo set_value('edu_bn'); ?>"></td>
</tr>
<tr>
	<td>NID</td>
  	<td><input  type='text' style="width:170px;" id='nid' name="nid" value="<?php echo set_value('nid'); ?>"></td>

	<td>Personal Phone</td>
  	<td><input  type='text' style="width:170px;" id='personal_phone' name="personal_phone" value="<?php echo set_value('personal_phone'); ?>"></td>
	
</tr>
<tr>
<td>Emergency Phone</td>
<td><input  type='text' style="width:170px;" id='emergency_phone' name="emergency_phone" value="<?php echo set_value('emergency_phone'); ?>"></td>
</tr>
<tr>
	<td colspan="4" style="text-align:left"><h3>Present Address</h3></td>
</tr>

<tr>
  <td>Village(Eng)</td>
  <td><input  type='text' style="width:170px;" id='pre_vill' name="pre_vill" value="<?php echo set_value('pre_vill'); ?>"></td>
  <td>Village(Bng)</td>
  <td><input  type='text' style="width:170px;font-family:SUtonnyMJ" id='pre_vill_bn' name="pre_vill_bn" value="<?php echo set_value('pre_vill_bn'); ?>"></td>
</tr>

<tr>
	  
<td>District</td>
 <td>
	<select  id='pre_district' name="pre_district" style="width:175px;">
		<option value="">Select Distict</option>	
		<?php $pre_district = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_districts');
		foreach($pre_district->result() as $rows) { 
			if($this->input->post('pre_district') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>
			
		<?php } ?>	
	</select>

 </td>
	 <td>Upazila</td>
	<td>
		<select class="pre_upazilaa" id='pre_upazila' name="pre_upazila" style="width:175px;">
		<option value="">Select Upazila</option>	
		<?php $pre_upazila = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_upazilas');
		foreach($pre_upazila->result() as $rows) { 
			if($this->input->post('pre_upazila') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>

	</td>




</tr>
<tr>
<td>Post Office</td>
  	<td>
		<select class='pre_postt' id='pre_post' name="pre_post" style="width:175px;">
		<option value="">Select Post Office</option>	
		<?php $pre_post = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_post_offices');
		foreach($pre_post->result() as $rows) { 
			if($this->input->post('pre_post') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>
	</td>
</tr>



<tr>
	<td colspan="4" style="text-align:left"><h3>Permanent Address</h3></td>
</tr>

<tr>
  <td>Village(Eng)</td>
  <td><input  type='text' style="width:170px;" id='per_vill' name="per_vill" value="<?php echo set_value('per_vill'); ?>"></td>
  <td>Village(Bng)</td>
  <td><input  type='text' style="width:170px;" id='per_vill_bn' name="per_vill_bn" value="<?php echo set_value('per_vill_bn'); ?>"></td>
  

</tr>

<tr>
<td>District</td>
 <td>
	<select  id='per_district' name="per_district" style="width:175px;">
		<option value="">Select Distict</option>	
		<?php $per_district = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_districts');
		foreach($per_district->result() as $rows) { 
			if($this->input->post('per_district') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>
			
		<?php } ?>	
	</select>

 </td>
	 <td>Upazila</td>
	<td>
		<select class="per_upazilaa" id='per_upazila' name="per_upazila" style="width:175px;">
		<option value="">Select Upazila</option>	
		<?php $per_upazila = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_upazilas');
		foreach($per_upazila->result() as $rows) { 
			if($this->input->post('per_upazila') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>

	</td>
</tr>
<tr>
<td>Post Office</td>
  	<td>
		<select class='per_postt' id='per_post' name="per_post" style="width:175px;">
		<option value="">Select Post Office</option>	
		<?php $per_post = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_post_offices');
		foreach($per_post->result() as $rows) { 
			if($this->input->post('per_post') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>
	</td>
</tr>




<tr>
	<td colspan="4" style="text-align:left"><h3>Official Information</h3></td>
</tr>


<tr>
  <td>Emp Id </td>
  <td><input name="empid" type='text' id='empid' style="width:170px;"  value="<?php echo set_value('empid'); ?>"/></td>
  <td>Punch Card No.</td>
  <td><input name="idcard" type='text' id='idcard' style="width:170px;"  value="<?php echo set_value('idcard'); ?>"/></td>
  <td width="20%" rowspan="8"><img id='img'  name='image' alt=''><div id='emp_status' style='font-size:14px;color:blue;'></div></td>
</tr>

<tr>
    <td width="135px">Department</td>
	<td>
	<select style="width:174px;" id='dept' name='dept'>
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

	<td>Salary Withdraw</td><td>
      <select style="width:174px;" id='saldraw' name='saldraw' >
          <?php $salary_withdraw_name = $this->processdb->get_salary_withdraw_name();
          foreach($salary_withdraw_name->result() as $rows) { 
              if($this->input->post('saldraw') == $rows->sal_withdraw_id) {?>
                  <option value="<?php echo $rows->sal_withdraw_id; ?>" selected="selected"><?php echo $rows->sal_withdraw_name; ?></option>
              <?php } else { ?>	
                  <option value="<?php echo $rows->sal_withdraw_id; ?>"><?php echo $rows->sal_withdraw_name; ?></option>	
              <?php } ?>	
          <?php } ?>	    	
      </select>
	</td> 

</tr>
<tr><td>Section</td>
<td>
	<select style="width:174px;" id='sec' name='sec' >
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
  <td>Designation</td>
  <td>
	<select style="width:174px;" id='desig' name='desig'>
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
<tr><td>Block Number</td>
<td>
	<select style="width:174px;" id='line' name='line' >
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
  <td>Floor</td>
  <td>
	<select style="width:174px;" id='position' name='position' >
		<?php $position_name = $this->processdb->get_position_name();
		foreach($position_name->result() as $rows) { 
			if($this->input->post('position') == $rows->posi_id) {?>
				<option value="<?php echo $rows->posi_id; ?>" selected="selected"><?php echo $rows->posi_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->posi_id; ?>"><?php echo $rows->posi_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
  	</select></td>
</tr>
<tr><td>Operation</td><td>
	<select style="width:174px;" id='operation' name='operation'>
		<?php $operation_name = $this->processdb->get_operation_name();
		foreach($operation_name->result() as $rows) { 
			if($this->input->post('operation') == $rows->ope_id) {?>
				<option value="<?php echo $rows->ope_id; ?>" selected="selected"><?php echo $rows->ope_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->ope_id; ?>"><?php echo $rows->ope_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>
</td>
  <td>Emp Status</td>
  <td>
	<select style="width:174px;" id='empstat' name='empstat' >
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
</tr>
<tr><td>Salary Grade</td><td>
	<select style="width:174px;" id='salg' name='salg'>
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
  <td>OT Entitle</td>
  <td>
  	<select style="width:174px;" id='otentitle' name='otentitle' >
    	<?php $ot_name = $this->processdb->get_yes_no_asc();
		foreach($ot_name->result() as $rows) { 
			if($this->input->post('otentitle') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
  	</select>
</td>
</tr>
<tr><td>Emp Shift</td><td>
	<select style="width:174px;" id='empshift' name='empshift' >
		<?php $shift_name = $this->processdb->get_shift_name();
		foreach($shift_name->result() as $rows) { 
			if($this->input->post('empshift') == $rows->shift_id) {?>
				<option value="<?php echo $rows->shift_id; ?>" selected="selected"><?php echo $rows->shift_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->shift_id; ?>"><?php echo $rows->shift_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>		
	</select>
</td>
  <td>Friday Entitle</td>
<td>
	<select style="width:174px;" id='lunch' name='lunch' >
		<?php $lunch_name = $this->processdb->get_yes_no_desc();
		foreach($lunch_name->result() as $rows) { 
			if($this->input->post('lunch') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	    	
  	</select>
</td>
</tr>
<tr>
  <td>Transport</td>
  <td>
	<select style="width:174px;" id='transport' name='transport' >
		<?php $transport_name = $this->processdb->get_yes_no_desc();
		foreach($transport_name->result() as $rows) { 
			if($this->input->post('transport') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>	
			<?php } ?>	
			
		<?php } ?>
	</select>
</td>
  <td>Emp join date</td>
  <td><input  type='text' size='21px' id='ejd' name="ejd" value="<?php echo set_value('ejd'); ?>"  required/>
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
<tr><td>Att. Bonus</td><td>
	<select style="width:174px;" id='attbonus' name='attbonus' >
		<?php $att_bonus_name = $this->processdb->get_att_bonus_name();
		foreach($att_bonus_name->result() as $rows) { 
			if($this->input->post('attbonus') == $rows->ab_id) {?>
				<option value="<?php echo $rows->ab_id; ?>" selected="selected"><?php echo $rows->ab_rule_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->ab_id; ?>"><?php echo $rows->ab_rule_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>
	</select>
</td>
  <td>Salary Type</td>
<td>
  	<select style="width:174px;" id='saltype' name='saltype' >
		<?php $salary_type_name = $this->processdb->get_salary_type_name();
		foreach($salary_type_name->result() as $rows) { 
			if($this->input->post('saltype') == $rows->sal_type_id) {?>
				<option value="<?php echo $rows->sal_type_id; ?>" selected="selected"><?php echo $rows->sal_type_name; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->sal_type_id; ?>"><?php echo $rows->sal_type_name; ?></option>	
			<?php } ?>	
			
		<?php } ?>	    	
  	</select>
</td>
</tr>
<tr>
	<td width="135px">Accounnt Number</td>
  	<td width="250px"><input name="account" type='text' id='account' style="width:170px;"  value="<?php echo set_value('account'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" /></td>
</tr>

<!-- <tr><td width="135px">Emp Last Dgree</td>
  <td width="250px"><input name="text2" type='text' id='emp_last_dg' style="width:170px;"  value="< ?php echo set_value('text2'); ?>"/></td>
  <td width="135px">Passing year</td>
  <td><input name="text3" type='text' id='pass_year' style="width:170px;"  value="< ?php echo set_value('text3'); ?>"/></td></tr>
<tr><td>Passing Institute</td>
<td><input name="text4" type='text' id='edu_insti' style="width:170px;"  value="< ?php echo set_value('text4'); ?>"/></td>
<td>Emp skill dept.</td>
<td><input name="text5" type='text' id='skill_dept' style="width:170px;"  value="< ?php echo set_value('text5'); ?>"/></td></tr>
<tr><td>Year of Skill</td>
<td><input name="text6" type='text' id='skill_year' style="width:170px;"  value=" ?php echo set_value('text6'); ?>"/></td>
<td>Company Name</td>
<td><input name="text7" type='text' id='skill_com_na' style="width:170px;"  value="< ?php echo set_value('text7'); ?>"/></td></tr> -->

 
      <tr>
        <td  width="92px">Gross</td>
        <td width="250px"><input name="text8" type='text' id='gsal'  onchange='basic_sal_cal()' style="width:170px;"  value="<?php echo set_value('text8'); ?>" required/></td>
        <td width="135px">Basic</td>
        <td ><input name="text8" type='text' disabled='disabled' id='bsal'  style="width:170px;" /></td>
      </tr>
      <tr>
        <td>House</td>
        <td><input name="text8" type='text' disabled='disabled' id='hrent'  style="width:170px;" /></td>
        <td>Medical</td>
        <td ><input name="text8" type='text' disabled='disabled' id='mallow' style="width:170px;" /></td>
      </tr>
	<tr>
        <td>Food</td>
        <td><input name="text8" type='text' disabled='disabled' id='food'  style="width:170px;" /></td>
        <td>Convence</td>
        <td ><input name="text8" type='text' disabled='disabled' id='convence' style="width:170px;" /></td>
    </tr>

		<tr>
        <td  width="92px"><b>Salary</b></td>
        <td width="250px"><input name="com_gross_sal" type='text' id='cgsal'  onchange='basic_sal_call()' style="width:170px;"  value="<?php echo set_value('com_gross_sal'); ?>" required/></td>
        <td width="135px"><b>Basic</b></td>
        <td ><input name="text8" type='text' disabled='disabled' id='cbsal'  style="width:170px;" /></td>
      </tr>
      <tr>
        <td><b>House</b></td>
        <td><input name="text8" type='text' disabled='disabled' id='chrent'  style="width:170px;" /></td>
        <td><b>Medical</b></td>
        <td ><input name="text8" type='text' disabled='disabled' id='cmallow' style="width:170px;" /></td>
      </tr>
	  	<tr>
        <td><b>Food</b></td>
        <td><input name="text8" type='text' disabled='disabled' id='cfood'  style="width:170px;" /></td>
        <td><b>Convence</b></td>
        <td ><input name="text8" type='text' disabled='disabled' id='cconvence' style="width:170px;" /></td>
    </tr>
<tr>
	<td colspan="4" style="text-align:left"><h3><b>Nominee Information</b></h3></td>
</tr>
    <tr>
        <td  width="92px">Nominee Name(Eng)</td>
        <td width="250px"><input name="nomi_name" type='text' id='nomi_name' style="width:170px;"  value="<?php echo set_value('nomi_name'); ?>" required/></td>
		<td  width="92px">Nominee Name(Bng)</td>
        <td width="250px"><input name="nomi_name_bn" type='text' id='nomi_name_bn' style="width:170px;"  value="<?php echo set_value('nomi_name_bn'); ?>" required/></td>
    </tr>
	<tr>
	<td width="135px">Rel. with Nominee</td>
	<td ><input name="nomi_relation" type='text' id='nomi_relation'  style="width:170px;"  value="<?php echo set_value('nomi_relation'); ?>"/></td>
	</tr>
<tr>
  <td>Village(Eng)</td>
  <td><input  type='text' style="width:170px;" id='nomi_vill' name="nomi_vill" value="<?php echo set_value('nomi_vill'); ?>"></td>
  <td>Village(Bng)</td>
  <td><input  type='text' style="width:170px;" id='nomi_vill_bn' name="nomi_vill_bn" value="<?php echo set_value('nomi_vill_bn'); ?>"></td>
  
 <td>District</td>
 <td>
	<select  id='nomi_district' name="nomi_district" style="width:175px;">
		<option value="">Select Distict</option>	
		<?php $nomi_district = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_districts');
		foreach($nomi_district->result() as $rows) { 
			if($this->input->post('nomi_district') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>
			
		<?php } ?>	
	</select>

 </td>
</tr>

<tr>
	 <td>Upazila</td>
	<td>
		<select class="nomi_upazilaa" id='nomi_upazila' name="nomi_upazila" style="width:175px;">
		<option value="">Select Upazila</option>	
		<?php $nomi_upazila = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_upazilas');
		foreach($nomi_upazila->result() as $rows) { 
			if($this->input->post('nomi_upazila') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>

	</td>

  <td>Post Office</td>
  	<td>
		<select class='nomi_postt' id='nomi_post' name="nomi_post" style="width:175px;">
		<option value="">Select Post Office</option>	
		<?php $nomi_post = $this->db->select('*')->order_by('name_bn', 'asc')->get('emp_post_offices');
		foreach($nomi_post->result() as $rows) { 
			if($this->input->post('nomi_post') == $rows->id) {?>
				<option value="<?php echo $rows->id; ?>" selected="selected"><?php echo $rows->name_bn; ?></option>
			<?php } else { ?>	
				<option value="<?php echo $rows->id; ?>"><?php echo $rows->name_bn; ?></option>	
			<?php } ?>	
			
		<?php } ?>	
	</select>
	</td>
</tr>

 <tr>
	<td colspan="4" style="text-align:left"><h3><b>Employee Experience</b></h3></td>
</tr>
    <tr>
        <td  width="92px">Exp. Factory Name</td>
        <td width="250px"><input name="exp_factory" type='text' id='exp_factory' style="width:170px;"  value="<?php echo set_value('exp_factory'); ?>" required/></td>
        <td width="135px">Duration</td>
        <td ><input name="duration" type='text' id='duration'  style="width:170px;"  value="<?php echo set_value('factory'); ?>"/></td>
    </tr>
    <tr>
        <td>Designation</td>
        <td><input name="exp_designation" type='text'  id='exp_designation'  style="width:170px;" value="<?php echo set_value('exp_designation'); ?>"/></td>
    </tr>

</table>
</fieldset>
<div style="width:900px; height:30px; background:#9DA2A6; margin-top:2px">
 <input type="hidden" name="id_skill" id="id_skill" value="<?php echo set_value('id_skill'); ?>"   />
 <input type='button' name='add' onclick='enable_save()' value='NEW'/>&nbsp;<input type="submit" name='pi_save'   value='SAVE'  />&nbsp;<input type="submit" name="pi_edit" id="pi_edit" disabled="disabled"  value='EDIT'/></form><input style="margin-left:20px;" type='button' name='prev' onclick='com_info_prev_Search1()' value='Prev'/>Find ID :
  <input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange="com_info_Search1()"  /><input type='button' name='next' onclick='com_info_next_Search1()' value='Next'/>
  </div>
  </div>
</div>
<?php if($this->input->post('pi_edit')) {echo "<SCRIPT LANGUAGE=\"JavaScript\">document.cominfo.pi_edit.disabled = false; document.cominfo.pi_save.disabled = true;</SCRIPT>";} ?>

    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-2.2.4.js"></script> -->
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {


   

    //nominee Upazila dropdown
    $('#nomi_district').change(function() {
        $('.nomi_upazilaa').addClass('form-control input-sm');
        $(".nomi_upazilaa > option").remove();
        $(".nomi_postt > option").remove();
        var id = $('#nomi_district').val();
        $.ajax({
            type: "POST",
            url:  "ajax_upazila_by_dis/" + id,
            success: function(func_data) {
                $('.nomi_upazilaa').append("<option value=''>-- Select District --</option>");
                $.each(func_data, function(id, name) {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('.nomi_upazilaa').append(opt);
                });
            }
        });
    });

    //nominee post office dropdown
    $('#nomi_upazila').change(function() {
        $('.nomi_postt').addClass('form-control input-sm');
        $(".nomi_postt > option").remove();
        var id = $('#nomi_upazila').val();
        $.ajax({
            type: "POST",
            url:  "ajax_post_office_by_upa_id/" + id,
            success: function(func_data) {
                $('.nomi_postt').append("<option value=''>-- Select District --</option>");
                $.each(func_data, function(id, name) {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('.nomi_postt').append(opt);
                });
            }
        });
    });


    


    //Upazila dropdown
    $('#pre_district').change(function() {
        $('.pre_upazilaa').addClass('form-control input-sm');
        $(".pre_upazilaa > option").remove();
        $(".pre_post > option").remove();
        var id = $('#pre_district').val();
        $.ajax({
            type: "POST",
            url: "ajax_upazila_by_dis/" + id,
            success: function(func_data) {
                $('.pre_upazilaa').append("<option value=''>-- Select District --</option>");
                $.each(func_data, function(id, name) {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('.pre_upazilaa').append(opt);
                });
            }
        });
    });

    //Post Office dropdown
    $('#pre_upazila').change(function() {
        $('.pre_postt').addClass('form-control input-sm');
        $(".pre_postt > option").remove();
        var id = $('#pre_upazila').val();
        $.ajax({
            type: "POST",
            url:  "ajax_post_office_by_upa_id/" + id,
            success: function(upazilaThanas) {
                $('.pre_postt').append("<option value=''>-- Select Upazila --</option>");
                $.each(upazilaThanas, function(id, ut_name) {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(ut_name);
                    $('.pre_postt').append(opt);
                });
            }
        });
    });

    //Upazila dropdown
    $('#per_district').change(function() {
        $('.per_upazilaa').addClass('form-control input-sm');
        $(".per_upazilaa > option").remove();
        $(".per_postt > option").remove();
        var id = $('#per_district').val();
        $.ajax({
            type: "POST",
            url:  "ajax_upazila_by_dis/" + id,
            success: function(func_data) {
                $('.per_upazilaa').append("<option value=''>-- Select District --</option>");
                $.each(func_data, function(id, name) {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('.per_upazilaa').append(opt);
                });
            }
        });
    });

    //Post Office dropdown
    $('#per_upazila').change(function() {
        $('.per_postt').addClass('form-control input-sm');
        $(".per_postt > option").remove();
        var id = $('#per_upazila').val();
        $.ajax({
            type: "POST",
            url: "ajax_post_office_by_upa_id/" + id,
            success: function(upazilaThanas) {
                $('.per_postt').append("<option value=''>-- Select Upazila --</option>");
                $.each(upazilaThanas, function(id, ut_name) {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(ut_name);
                    $('.per_postt').append(opt);
                });
            }
        });
    });
});
</script>
 
</body>
</html>