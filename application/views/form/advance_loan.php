<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MSH Payroll Reports</title>

  	<?php $base_url = base_url(); $base_url = base_url(); ?>
	
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
		<form name="grid" id="grid" method="POST">
		<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
			<fieldset style='width:95%;'><legend><font size='+1'><b>Category Options</b></font></legend>
				<table>
					<tr>
						<td>Start</td>
						<td>:</td>
						<td>
							<select name='grid_start' id='grid_start' style="width:250px;" onchange='grid_get_all_data()'> <option value='Select'>Select</option><option selected value='all'>ALL</option> 
							</select>
						</td>
						<td>Dept. </td>
						<td>:</td>
						<td>
							<select id='grid_dept' name='grid_dept' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Section </td>
						<td>:</td>
						<td>
							<select id='grid_section' name='grid_section' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
						<td>Block </td>
						<td>:</td>
						<td>
							<select id='grid_line' name='grid_line' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Desig. </td>
						<td>:</td>
						<td>
							<select id='grid_desig' name='grid_desig' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
						<td>Sex </td>
						<td>:</td>
						<td>
							<select id='grid_sex' name='grid_sex' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Status</td>
						<td>:</td>
						<td>
							<select id='grid_status' name='grid_status' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
						<td>Floor</td>
						<td>:</td>
						<td>
							<select id='grid_position' name='grid_position' style="width:250px;" onChange="grid_all_search()"><option value=''></option>
							</select>
						</td>
					</tr>
				</table>
			</fieldset>
			 <br />
			<fieldset style="width:95%;"><legend><font size='+1'><b>Advanced Salary</b></font></legend>
				<div style="margin:0 auto; width:100%; overflow:hidden; height:auto;">
					<div id="present_entry" class="nav_head" style="margin-top: 13px;">

						<div style="width:100%; display: flex; margin-bottom: 15px;">
							<div class="form-group">
								<label class="">From Date</label>
								<input class="con-input" id="first_date" name="first_date" autocomplete="off">
								<script language="JavaScript">
									var o_cal = new tcal ({
										// form name
										'formname': 'grid',
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
										'formname': 'grid',
										// input name
										'controlname': 'second_date'
									});
									// individual template parameters can be modified via the calendar variable
									o_cal.a_tpl.yearscroll = false;
									o_cal.a_tpl.weekstart = 6;
								</script>
							</div>
							<div class="form-group">
								<label class="">Salary Type</label>
								<select name='salary' id='salary' style="width: 250px; height: 25px; margin-top: 5px;"> 
									<option value="">Select</option>
									<option value='gross'>Gross Salary</option>
									<option value='basic'>Basic Salary</option> 
								</select>
							</div>
						</div>

						<div class="input-group" style="width:100%;">
							<span class="input-group-btn" style="display: flex; gap: 15px;">
								<input class="btn btn-primary" onclick='advance_entry(event)' type="button" value='Save' />
							</span>
						</div><!-- /input-group -->

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
				</div>
			</fieldset>
		</div>
		
		<div style="float:right;">
			<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
		</div>
		</form>
	</div>
	<div id="viewid"></div>
</body>
</html>

<script>
	function advance_entry(e) {
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
		salary = document.getElementById('salary').value;
		if (salary == '') {
			alert('Please select salary type');
			return false;
		}
		
		var data = "first_date=" + first_date + "&second_date=" + second_date + "&salary=" + salary + "&emp_id=" + emp_id; // Merge the data
		
		hostname = window.location.hostname;
		pathname = window.location.pathname;
		var folder_name = pathname.split("/");
		folder = folder_name[1];
		url = "http://"+hostname+"/"+folder+"/index.php/entry_system_con/advance_entry/";

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
</script>


<script>
	document.addEventListener("DOMContentLoaded", function() {
		grid_get_all_data()
	});
</script>



