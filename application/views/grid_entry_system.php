<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MSH Payroll Reports</title>

  <?php $base_url = base_url();   
    $base_url = base_url();
	
	?>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>themes/redmond/jquery-ui-1.8.2.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>themes/ui.jqgrid.css" />
	 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>css/calendar.css" />
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
	<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.min.js"></script>
	<script src="<?php echo $base_url; ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/grid_content.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/calendar_eu.js" type="text/javascript"></script>
	

</head>
<body bgcolor="#ECE9D8">
<div align="center" style=" margin:0 auto; width:1000px; min-height:555px; overflow:hidden;">
<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
<form name="grid">
<div>

<fieldset style="width:95%;"><legend><font size='+1'><b>Date</b></font></legend>
First Date: <input type="text" name="firstdate" id="firstdate" style="width:100px;"/>

	<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'grid',
		// input name
		'controlname': 'firstdate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>
&nbsp;&nbsp; TO &nbsp;&nbsp; Second Date: <input type="text" name="seconddate" id="seconddate" style="width:100px;"/>
 
 <script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'grid',
		// input name
		'controlname': 'seconddate'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>
 </div>
</fieldset>
<br />
<div>
<fieldset style='width:95%;'><legend><font size='+1'><b>Category Options</b></font></legend>
<table>
<tr>
<td>Start</td><td>:</td><td><select name='grid_start' id='grid_start' style="width:250px;" onchange='grid_get_all_data()'>
<option value='Select'>Select</option><option selected value='all'>ALL</option>
</select></td>
<td>Dept. </td><td>:</td><td><select id='grid_dept' name='grid_dept' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
<tr><td>Section </td><td>:</td><td><select id='grid_section' name='grid_section' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Block </td><td>:</td><td><select id='grid_line' name='grid_line' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
<tr><td>Desig. </td><td>:</td><td><select id='grid_desig' name='grid_desig' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Sex </td><td>:</td><td><select id='grid_sex' name='grid_sex' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></select></td>
</tr>
<tr><td>Status</td><td>:</td><td><select id='grid_status' name='grid_status' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
<td>Floor</td><td>:</td><td><select id='grid_position' name='grid_position' style="width:250px;" onChange="grid_all_search()"><option value=''></option></select></td>
</tr>
</table>
</form>
</fieldset>
</div>

<div style="margin:0 auto; width:100%; overflow:hidden;">
<br />
<fieldset style="width:95%;"><legend><font size='+1'><b>Entry Management</b></font></legend>
<div style="margin:0 auto; width:100%; overflow:hidden; height:auto;">
	<?php
		$user_id = $this->acl_model->get_user_id($this->session->userdata('username'));
		$acl     = $this->acl_model->get_acl_list($user_id);
		if(!in_array(10,$acl)) { ?>

		<div style="margin:0 auto; width:48%; overflow:hidden; float:left;">
		<fieldset style="width:90%;"><legend><font size="+1"><b>Attendance</b></font></legend>
		<form name='manual_attendance'>
		<table>
		<tr><td>Time </td><td>:</td><td><input type='text' name='manual_time' id='manual_time' size='16'></td>
		<td><input type='button' name='btn' id='btn' onclick='manual_attendance_entry()' value='Insert' size='12'></td></tr>
		<tr><td></td><td></td><td> <span style="font-size:12px;"> [HH:MM:SS]</span></td></tr>
		</table>
		</form>
		</fieldset>
		</div>

		<div style="margin:0 auto; width:48%; overflow:hidden; float:right;">
		<fieldset style='width:90%;'><legend><font size='+1'><b>Present to Absent</b></font></legend>
		<form name='present_absent'>
		<table>
		<tr><td><input type='button' onclick='manual_entry_Delete()' value='Delete'/></td></tr>
		<tr><td><span style="font-size:12px;">[Select First & Second date and employee ID]</span></td></tr>
		</table>
		</form>
		</fieldset>
		</div>
	<?php } ?>

	<!-- present entry form -->
	<div style="margin:0 auto; width:100%; overflow:hidden; float:left;">
		<fieldset style='width:95%;'><legend><font size='+1'><b>Manual Attend</b></font></legend>
			<div id="present_entry" class="nav_head" style="margin-top: 13px;">
				<form method="post" id="present_entry_form" style="">
					<div style="width:100%; display: flex; margin-bottom: 15px;">
						<div class="form-group">
							<label class="">From Date</label>
							<input class="con-input" id="first_date" name="first_date" autocomplete="off">
							<script language="JavaScript">
								var o_cal = new tcal ({
									// form name
									'formname': 'present_entry_form',
									// input name
									'controlname': 'first_date'
								});
								
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;
							</script>
						</div>
						<div class="form-group">
							<label class="">To Date</label>
							<input class="con-input" id="second_date" name="second_date" autocomplete="off">
							<script language="JavaScript">
								var o_cal = new tcal ({
									// form name
									'formname': 'present_entry_form',
									// input name
									'controlname': 'second_date'
								});
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;
							</script>
						</div>
						<div class="form-group">
							<label class="">Time</label>
							<input class="con-input" id="time" name="time" placeholder="hh:mm:ss">
						</div>
					</div>

					<div class="input-group" style="width:100%;">
						<span class="input-group-btn" style="display: flex; gap: 15px;">
							<input class="btn btn-primary" onclick='present_entry(event)' type="button" value='Save' />
							<!-- <input class="btn btn-info" onclick="log_sheet(event)" type="button" value="Attn. Sheet"> -->
							<input class="btn btn-danger" onclick="present_absent(event)" type="button" value="Absent">
							<input class="btn btn-danger" onclick="log_delete(event)" type="button" value="Log Delete">
						</span>
					</div><!-- /input-group -->
				</form>
			</div>

			<style>
				.con-input {
					margin-top: 5px;
					padding: 2px;
					height: 15px;
					outline: none;
					max-width: 75%
				}
				.form-group {
					text-align: -webkit-left;
				}
				.hints {
					color: #436D19;
					font-weight: bold;
				}
			</style>
		</fieldset>
	</div>
	<!-- present entry form -->

	<div style="margin:0 auto; width:48%; overflow:hidden; float:left;">
		<fieldset style='width:90%;'><legend><font size='+1'><b>Weekend</b></font></legend>
			<form name='manual_attendance'>
				<table>
					<tr>
						<td>
							<input type='button' name='btn' id='btn' onclick='save_work_off(1)' value='Insert' size='15'>
							<input type='button' name='btn' id='btn' onclick='save_work_off(2)' value='Delete' size='15'>
						</td>
					</tr>
					<tr>
						<td>
							<span style="font-size:12px;">[Select First date and employee ID]</span>
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div>

	<div style="margin:0 auto; width:48%; overflow:hidden; float:right;">
		<fieldset style='width:90%;'><legend><font size='+1'><b>Holiday</b></font></legend>
			<form name='manual_attendance'>
				<table>
					<tr>
						<td></td>
						<td>
							<input type='text' size='16px' id='holiday_description' placeholder='Description'>
							<input type='button' name='holiday_save_id' onclick='save_holiday(1)' value='Insert'/>
							<input type='button' name='holiday_save_id' onclick='save_holiday(2)' value='Delete'/>
						</td>
					</tr>

					<tr>
						<td></td>
						<td>
							<span style="font-size:12px;">[Select First date & insert description]</span>
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div>
	<br /><br /><br /><br /><br /><br />

	<div style="margin:0 auto; width:100%; overflow:hidden; float:left;">
		<fieldset style='width:95%;'><legend><font size='+1'><b>Festival Bonus</b></font></legend>
			<form name='manual_attendance'>
			<table style="margin:0 auto; width:70%;">
			<tr><td>Actual Amount</td><td><input type='text' size='16px' id=''></td> 
			<tr><td colspan="2" align="center">OR</td></tr>
			<tr><td>Percentage</td><td><input type='text' size='16px' id=''></td></tr>
			<tr><td colspan="2" align="center"> <input type='button' name=''  onclick='' value='Insert'/></td></tr>
			<tr><td></td><td><span style="font-size:12px;"></span></td></tr>
			</table>
			</form>
		</fieldset>
	</div>


	<div style="margin:0 auto; width:100%; overflow:hidden; float:left;">
		<fieldset style='width:95%;'><legend><font size='+1'><b>Maternity Entry</b></font></legend>
			<form name='manual_attendance' id="maternity_entry_form">
			
			<table style="margin:0 auto; width:70%;">
				<tr>
					<td width="30%"><label>Prenatal notice<span style="color: red;">*</span> </label></td>
					<td>
						<input name="inform_date" id="inform_date" class="form-control input-sm date"
							required>
							<script language="JavaScript">
								var o_cal = new tcal ({
									// form name
									'formname': 'maternity_entry_form',
									// input name
									'controlname': 'inform_date'
								});
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;
							</script>
						</td>
				</tr>
				<tr>
					<td><label>Probable delivery date<span style="color: red;">*</span> </label></td>
					<td><input name="probability" onChange="change_date_ml()" onkeyup="change_date_ml()" onclick="change_date_ml()" onblur="change_date_ml()" id="probability"
							class="form-control input-sm date" required>
							<script language="JavaScript">

								var o_cal = new tcal ({
									// form name
									'formname': 'maternity_entry_form',
									// input name
									'controlname': 'probability'
								});
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;

								

								
							</script>
					</td>
				</tr>
				<tr>
					<td><label>Leave start date<span style="color: red;">*</span> </label></td>
					<td><input name="start_date" id="start_date" class="form-control input-sm" readonly></td>
				</tr>
				<tr>
					<td><label>Leave end date<span style="color: red;">*</span> </label></td>
					<td><input name="end_date" id="end_date" class="form-control input-sm" readonly></td>
				</tr>
				<tr>
					<td><label>First Payment Date <span style="color: red;">*</span> </label></td>
					<td>
						<input name="first_pay" id="first_pay" class="form-control input-sm date" required>
						<script language="JavaScript">
								var o_cal = new tcal ({
									// form name
									'formname': 'maternity_entry_form',
									// input name
									'controlname': 'first_pay'
								});
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;
							</script>
				
				</td>
				</tr>
				<tr>
					<td><label>Second Payment Date <span style="color: red;">*</span> </label></td>
					<td>
						<input name="second_pay" id="second_pay" class="form-control input-sm date" required>
						<script language="JavaScript">
								var o_cal = new tcal ({
									// form name
									'formname': 'maternity_entry_form',
									// input name
									'controlname': 'second_pay'
								});
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;
							</script>
				</td>
				</tr>
				<tr>
					<td><label>Payment day<span style="color: red;">*</span> </label></td>
					<td><input type="number" name="pay_day" id="pay_day" class="form-control input-sm" required>
					<script language="JavaScript">
								var o_cal = new tcal ({
									// form name
									'formname': 'maternity_entry_form',
									// input name
									'controlname': 'probability'
								});
								// individual template parameters can be modified via the calendar variable
								o_cal.a_tpl.yearscroll = false;
								o_cal.a_tpl.weekstart = 6;
							</script>
				</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input onclick="save(event)" type='button' name='' onclick='' value='Insert' />
					</td>
				</tr>
				<tr>
					<td></td>
					<td><span style="font-size:12px;"></span></td>
				</tr>
			<tr><td></td><td><span style="font-size:12px;"></span></td></tr>
			</table>
			</form>
		</fieldset>
	</div>


</div>

</fieldset>

</div>



</div>
<div style="float:right;">
<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
</div>
<!--<div id="pager1"></div>-->

<div id="viewid"></div>
</div>
</body>
</html>

<script>
	function present_entry(e) {
		e.preventDefault();
		$grid  = $("#list1");
		var id_array = $grid.getGridParam('selarrrow');
		var selected_id_list = new Array();
		var emp_id = (id_array.join(','));
		if(emp_id =='')
		{
			alert("Please select Employee ID");
			return;
		}

		first_date = document.getElementById('first_date').value;
		if (first_date == '') {
			alert('Please select First date');
			return false;
		}
		second_date = document.getElementById('second_date').value;
		if (second_date == '') {
			alert('Please select Second date');
			return false;
		}
		time = document.getElementById('time').value;
		if (time == '') {
			alert('Please select Time');
			return false;
		}

		var formdata = $("#present_entry_form").serialize();
		var data = "first_date=" + first_date + "&second_date=" + second_date + "&time=" + time + "&emp_id=" + emp_id + "&" + formdata; // Merge the data
		
		hostname = window.location.hostname;
		pathname = window.location.pathname;
		var folder_name = pathname.split("/");
		folder = folder_name[1];
		url = "http://"+hostname+"/"+folder+"/index.php/entry_system_con/present_entry/";

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function(data) {
				$("#loader").hide();
				if (data == 'success') {
					alert('success', 'Record Inserted Successfully');
				} else {
					alert(data);
				}
			},
			error: function(data) {
				$("#loader").hide();
				alert('Record Not Inserted');
			}
		})
	}

	function present_absent(e) {
		e.preventDefault();
		$grid  = $("#list1");
		var id_array = $grid.getGridParam('selarrrow');
		var selected_id_list = new Array();
		var emp_id = (id_array.join(','));
		if(emp_id =='')
		{
			alert("Please select Employee ID");
			return;
		}

		first_date = document.getElementById('first_date').value;
		if (first_date == '') {
			alert('Please select First date');
			return false;
		}
		second_date = document.getElementById('second_date').value;
		if (second_date == '') {
			alert('Please select Second date');
			return false;
		}
		time = document.getElementById('time').value;

		var formdata = $("#present_entry_form").serialize();
		var data = "first_date=" + first_date + "&second_date=" + second_date + "&time=" + time + "&emp_id=" + emp_id + "&" + formdata; // Merge the data

		hostname = window.location.hostname;
		pathname = window.location.pathname;
		var folder_name = pathname.split("/");
		folder = folder_name[1];
		url = "http://"+hostname+"/"+folder+"/index.php/entry_system_con/present_absent/";

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function(data) {
				$("#loader").hide();
				if (data == 'success') {
					alert('Record Deleted Successfully');
				} else {
					alert(data);
				}
			},
			error: function(data) {
				$("#loader").hide();
				alert('Record Not Deleted');
			}
		})
	}

	function log_delete(e) {
		e.preventDefault();
		$grid  = $("#list1");
		var id_array = $grid.getGridParam('selarrrow');
		var selected_id_list = new Array();
		var emp_id = (id_array.join(','));
		if(emp_id =='')
		{
			alert("Please select Employee ID");
			return;
		}

		first_date = document.getElementById('first_date').value;
		if (first_date == '') {
			alert('Please select First date');
			return false;
		}
		second_date = document.getElementById('second_date').value;
		if (second_date == '') {
			alert('Please select Second date');
			return false;
		}
		time = document.getElementById('time').value;

		var formdata = $("#present_entry_form").serialize();
		var data = "first_date=" + first_date + "&second_date=" + second_date + "&time=" + time + "&emp_id=" + emp_id + "&" + formdata; // Merge the data
		
		hostname = window.location.hostname;
		pathname = window.location.pathname;
		var folder_name = pathname.split("/");
		folder = folder_name[1];
		url = "http://"+hostname+"/"+folder+"/index.php/entry_system_con/log_delete/";

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function(data) {
				if (data == 'success') {
					alert('Shift Log Deleted Successfully');
				} else {
					alert(data);
				}
			},
			error: function(data) {
				alert('Shift Log Not Deleted');
			}
		})
	}
</script>

<script>
	function eot_modify_entry(e) {
		e.preventDefault();
		var checkboxes = document.getElementsByName('emp_id[]');
		var sql = get_checked_value(checkboxes);
		let emp_id = sql.split(",");
		if (emp_id == '') {
			alert('Please select employee Id');
			return false;
		}

		if (emp_id.length > 1) {
			alert('Please select max one employee Id');
			return false;
		}

		unit_id = document.getElementById('unit_id').value;
		if (unit_id == '') {
			alert('Please select Unit');
			return false;
		}

		first_date = document.getElementById('eot_f_date').value;
		if (first_date == '') {
			alert('Please select First date');
			return false;
		}
		second_date = document.getElementById('eot_s_date').value;
		if (second_date == '') {
			alert('Please select Second date');
			return false;
		}
		eot = document.getElementById('eot').value;
		if (eot == '') {
			alert('Please entry the eot');
			return false;
		}

		var formdata = $("#eot_modify_form").serialize();
		var data = "unit_id=" + unit_id + "&first_date=" + first_date + "&second_date=" + second_date + "&eot=" + eot + "&emp_id=" + emp_id + "&" + formdata; // Merge the data

		loading_open();
		$.ajax({
			type: "POST",
			url: hostname + "entry_system_con/eot_modify_entry",
			data: data,
			success: function(data) {
				loading_close();
				if (data == 'success') {
					alert('success', 'EOT updated Successfully');
				} else {
					alert(data);
				}
			},
			error: function(data) {
				loading_close();
				alert('EOT not updated');
			}
		})
	}

	function log_sheet(e) {
		e.preventDefault();
		var checkboxes = document.getElementsByName('emp_id[]');
		var sql = get_checked_value(checkboxes);
		let emp_id = sql.split(",");
		if (emp_id == '') {
			alert('Please select employee Id');
			return false;
		}
		unit_id = document.getElementById('unit_id').value;
		if (unit_id == '') {
			alert('Please select Unit');
			return false;
		}

		first_date = document.getElementById('first_date').value;
		if (first_date == '') {
			alert('Please select First date');
			return false;
		}
		second_date = document.getElementById('second_date').value;
		if (second_date == '') {
			alert('Please select Second date');
			return false;
		}


		var formdata = $("#present_entry_form").serialize();
		var data="emp_id="+emp_id+"&unit_id="+unit_id+"&first_date="+first_date+"&second_date="+second_date+ "&" + formdata;
		url =  hostname + "entry_system_con/log_sheet/";
		ajaxRequest = new XMLHttpRequest();
		ajaxRequest.open("POST", url, true);
		ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded;charset=utf-8");
		ajaxRequest.send(data);

		ajaxRequest.onreadystatechange = function () {
			if(ajaxRequest.readyState == 4){
				var resp = ajaxRequest.responseText;
				show = window.open('', '_blank', 'menubar=1,resizable=1,scrollbars=1,width=1600,height=800');
				show.document.write(resp);
			}
		}
	}
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		grid_get_all_data()

	});
</script>





<script>
    function change_date_ml() {
        var probability = $('#probability').val();
        // var start_date = $('#start_date').val();
        // var end_date = $('#end_date').val();
        // var unit_id = $('#unit_id').val();


		hostname = window.location.hostname;
		pathname = window.location.pathname;
		var folder_name = pathname.split("/");
		folder = folder_name[1];
		url = "http://"+hostname+"/"+folder+"/index.php/entry_system_con/change_date_ml/";



		
        $.ajax({
            type: "POST",
            url: url,
            data: {
                probability: probability
            },
            success: function(data) {
                var d = JSON.parse(data);
                $('#start_date').val(d.start_date);
                $('#end_date').val(d.end_date);
            }
        })
    }
</script>


<script>


 function save (e) {
	e.preventDefault();
	var inform_date   = $('#inform_date').val();
        var probability   = $('#probability').val();
        var start_date    = $('#start_date').val();
        var end_date      = $('#end_date').val();
        var first_pay     = $('#first_pay').val();
        var second_pay    = $('#second_pay').val();
        var unit_id       = $('#unit_id').val();
        var pay_day       = $('#pay_day').val();
        if (unit_id == '') {
            alert('Please select Unit');
            return false;
        }

        var checkboxes = document.getElementsByClassName('cbox');
        var sql = "";
        var count = 0;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
				console.log(checkboxes[i]);
                sql = checkboxes[i].name.split("_")[2];
            }
        }
        if (count > 1) {
            alert('Select only one employee');
            return false;
        } else if (count == 0) {
            alert('Please select at least one employee');
            return false;
        }
        if (sql == '') {
            alert('Please select employee Id');
            $("#loader").hide();
            return false;
        }



        if (pay_day == '') {
            alert('Please enter the pay day of the month');
            $("#loader").hide();
            return false;
        }
        if (second_pay == '') {
            alert('Please select second pay date');
            $("#loader").hide();
            return false;
        }
        if (first_pay == '') {
            alert('Please select first pay date');
            $("#loader").hide();
            return false;
        }
        if (inform_date == '') {
            alert('Please select information date');
            $("#loader").hide();
            return false;
        }
        if (probability == '') {
            alert('Please select probability date child born');
            $("#loader").hide();
            return false;
        }
        $("#loader").show();




		hostname = window.location.hostname;
		pathname = window.location.pathname;
		var folder_name = pathname.split("/");
		folder = folder_name[1];
		url = "http://"+hostname+"/"+folder+"/index.php/entry_system_con/save_maternity/";

        $.ajax({
            type: "POST",
            url:url,
            data: {
                pay_day      : pay_day,
                inform_date  : inform_date,
                probability  : probability,
                start_date   : start_date,
                end_date     : end_date,
                first_pay    : first_pay,
                second_pay   : second_pay,
                unit_id      : unit_id,
                sql          : sql
            },
            success: function(data) {
                alert(data);
                
            },
            error: function(data) {
                $("#loader").hide();
                alert(data);
            },
            complete: function(data) {
                $("#loader").hide();
            }
        })

}


</script>

