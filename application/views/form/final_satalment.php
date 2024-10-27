<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Final satalment</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
    <script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>
</head>

<body bgcolor="#ECE9D8">

    <div align="center" style="margin:0 auto; width:100%;">
        <fieldset style='width:600px;'>
            <legend>
                <font size='+1'><b>Employee Data</b></font>
            </legend>
			<form name='leave_holy_days'>
				<table border='0' style='padding:10px'>
					<tr>
						<td width='25%'>Employee ID</td>
						<td colspan='2'><input name='empid_resign' type='text' id='empid_resign' size='25px' /></td>
					</tr>
					<tr>
						<td width='40%'>Resign Date </td>
						<td colspan='2'><input name='start_resign_date' type='text' id='start_resign_date' size='25px' />
							<script language="JavaScript">
							var o_cal = new tcal({
								// form name
								'formname': 'leave_holy_days',
								// input name
								'controlname': 'start_resign_date'
							});
							o_cal.a_tpl.yearscroll = false;
							o_cal.a_tpl.weekstart = 6;
							</script>
						</td>
					</tr>
				</table>
			</form>
            <table border='0' style='padding:10px'>
                <tr>
                    <td><input type='button' name='add' onclick='get_employee_data()' value='Get Data' />
                </tr>
            </table>
        </fieldset>

        <fieldset style='width:600px;'>
            <legend>
                <font size='+1'><b>Employee Information</b></font>

            </legend>

            <table border='0' style='padding:10px;width:100%'>
                <tr>
                    <td width='25%'>Photo</td>
                    <td colspan='2'><img name='image' src='' width='100px' height='100px' /></td>
                </tr>
			</table>
			<div style="display: flex;">
				<table width='50%'>
						
					<tr>
						<td width='25%'>Name</td>
						<td colspan='2'><input name='name' type='text' id='name' size='25px' readonly /></td>
					</tr>
					<tr>
						<td width='25%'>Father Name</td>
						<td colspan='2'><input name='fname' type='text' id='fname' size='25px'readonly /></td>
					</tr>
					<tr>
						<td width='25%'>Mother Name</td>
						<td colspan='2'><input name='mname' type='text' id='mname' size='25px'readonly /></td>
					</tr>
					<tr>
						<td width='25%'>Spouse Name</td>
						<td colspan='2'><input name='bname' type='text' id='bname' size='25px'readonly /></td>
					</tr>
				</table>
				<table width='50%'>
						
	
					<tr>
						<td width='25%'>Section</td>
						<td colspan='2'><input name='section' type='text' id='section' size='25px'readonly /></td>
					</tr>
					<!-- <tr>
							<td width='25%'>Line</td>
							<td colspan='2'><input name='line' type='text' id='line' size='25px' /></td>
						</tr> -->
					<tr>
						<td width='25%'>Department</td>
						<td colspan='2'><input name='department' type='text' id='department' size='25px' readonly/></td>
					</tr>
					<tr>
						<td width='25%'>Designation</td>
						<td colspan='2'><input name='designation' type='text' id='designation' size='25px' readonly/></td>
					</tr>
					<tr>
						<td width='25%'>Joining Date</td>
						<td colspan='2'><input name='joining_date' type='text' id='joining_date' size='25px' readonly/> </td>
					</tr>
					<tr>
						<td width='25%'>Salary</td>
						<td colspan='2'><input name='salary' onkeyup='total_calculation()' onchange='total_calculation()' min='0' value='0' type='number' id='salary' size='25px' /> </td>
					</tr>
				</table>
			</div>
        </fieldset>
		<fieldset style='width:600px;'>
			<legend>
				<font size='+1'><b>Final Satalment</b></font>
			</legend>
			<div width='100%' style="display: flex;">

				<table border='0' style='padding:10px;width:33%'>
					<tr><td style="white-space: nowrap">Present Calculation</td></tr>
					<tr>
						<td width='25%' style="white-space: nowrap">Total days in month</td>
						<td colspan='2'><input onkeyup='total_calculation()' onchange='total_calculation()' name='total_days_year_month' min='0' max='31' value='30' type='text' id='total_days_year_month' size='25px' /> </td>
					</tr>
					<tr>
						<td width='25%' style="white-space: nowrap">Pay Day</td>
						<td colspan='2'><input onkeyup='total_calculation()' onchange='total_calculation()' name='pay_day_year' min='0' value='0' type='text' id='pay_day_year' size='25px' /> </td>
					</tr>
					<tr>
						<td width='25%' style="white-space: nowrap">Total Amount</td>
						<td colspan='2'><input readonly name='total_amount_year' min='0' value='0' type='text' id='total_amount_year' size='25px' /> </td>
					</tr>
				</table>

				<table border='0' style='padding:10px;width:33%'>
					<tr><td style="white-space: nowrap">Leave</td></tr>
					<tr>
						<td width='25%' style="white-space: nowrap">Total Days</td>
						<td colspan='2'><input onkeyup='total_calculation()' onchange='total_calculation()' name='total_days_leave' min='0' value='0' type='text' id='total_days_leave' size='25px' /> </td>
					</tr>
					
					<tr>
						<td width='25%' style="white-space: nowrap">Total Amount</td>
						<td colspan='2'><input readonly name='total_amount_leave' min='0' value='0' type='text' id='total_amount_leave' size='25px' /> </td>
					</tr>
				</table>
				<table border='0' style='padding:10px;width:33%'>
					<tr><td style="white-space: nowrap">Present Month Due</td></tr>
					<tr>
						<td width='25%' style="white-space: nowrap">Total Days</td>
						<td colspan='2'><input onkeyup='total_calculation()' onchange='total_calculation()' name='total_days_present' min='0' value='0' type='text' id='total_days_present' size='25px' /> </td>
					</tr>
					<tr>
						<td width='25%' style="white-space: nowrap">Total Amount</td>
						<td colspan='2'><input readonly name='total_amount_present' min='0' value='0' type='text' id='total_amount_present' size='25px' /> </td>
					</tr>
				</table>
			</div>
			<div>
				<table>
					<tr><td style="white-space: nowrap">Total Amount</td></tr>
					<tr>
						<td colspan='2'><input readonly name='total_amount' min='0' value='0' type='text' id='total_amount' size='25px' /> </td>
					</tr>
					<tr><td><input type="button" value="Submit" onclick="submit_final_satalment()"></td></tr>
				</table>

			</div>
		</fieldset>
    </div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
    function get_employee_data() {
        var empid = document.getElementById('empid_resign').value;
        if (empid == "") {
            alert("Please Enter Employee ID");
            return false;
        }
        var url = "<?php echo site_url('/emp_info_con/com_info_search1'); ?>";

        $.ajax({
            type: "POST",
            url: url,
            data: "empid=" + empid,
            success: function(resp) {
                alldata = resp.split("-*-");
                //alert(alldata);
                otherinfo = alldata[0].split("=*=");
                console.log(otherinfo);
                $('#name').val(otherinfo[0]);
                $('#bname').val(otherinfo[1]);
                $('#fname').val(otherinfo[2]);
                $('#mname').val(otherinfo[3]);

                var img = otherinfo[7];
                hostname = window.location.hostname;
                document.image.src = "http://" + hostname + "/erp_target_net/index.php/uploads/photo/" +
                img;
                com_info = alldata[1].split("=*=");
                console.log(com_info);
                $('#section').val(com_info[3]);
                // $('#line').val(com_info[1]);
                $('#department').val(com_info[2]);
                $('#designation').val(com_info[5]);
                $('#salary').val(com_info[11]);
                $('#joining_date').val(com_info[19]);

            }
        });
    }
    </script>

	<script>
		function total_calculation() {
			if(yearly_calculation()){
				if(leave_calculation()){
					if(present_calculation()){
						total_calculation_amount()
					}
				}
			}
		}
	</script>

	<script>
		function yearly_calculation() {
			var salary = document.getElementById('salary').value;
			var total_days_year_month = document.getElementById('total_days_year_month').value;
			var pay_day_year = document.getElementById('pay_day_year').value;
			$('#total_amount_year').val(parseFloat((salary / total_days_year_month) * pay_day_year).toFixed(2));
            return true;

		}

		function leave_calculation() {
			var salary = document.getElementById('salary').value;
			var total_days_year_month = document.getElementById('total_days_year_month').value;
			var total_days_leave = document.getElementById('total_days_leave').value;
			$('#total_amount_leave').val(parseFloat((salary/total_days_year_month)*total_days_leave).toFixed(2));
			return true;

		}
		function present_calculation() {
			var salary = document.getElementById('salary').value;
			var total_days_year_month = document.getElementById('total_days_year_month').value;
			var total_days_present = document.getElementById('total_days_present').value;
			$('#total_amount_present').val(parseFloat((salary/total_days_year_month)*total_days_present).toFixed(2));
			return true;

		}

		function total_calculation_amount(){
			var total_amount_year = parseFloat(document.getElementById('total_amount_year').value);
			var total_amount_leave = parseFloat(document.getElementById('total_amount_leave').value);
			var total_amount_present = parseFloat(document.getElementById('total_amount_present').value);
			
			$('#total_amount').val(Math.ceil(total_amount_year+total_amount_leave+total_amount_present));
			return true;
		}
	</script>

	<script>
		function submit_final_satalment() {
			var start_resign_date = $('#start_resign_date').val();
			if (start_resign_date == "") {
				alert("Please Enter Start Resign Date");
				return false;
			}

			var salary = document.getElementById('salary').value;
			var total_days_year_month = document.getElementById('total_days_year_month').value;
			var pay_day_year = document.getElementById('pay_day_year').value;
			var total_days_leave = document.getElementById('total_days_leave').value;
			var total_days_present = document.getElementById('total_days_present').value;
			var total_amount_year = parseFloat(document.getElementById('total_amount_year').value);
			var total_amount_leave = parseFloat(document.getElementById('total_amount_leave').value);
			var total_amount_present = parseFloat(document.getElementById('total_amount_present').value);
			var total_amount = parseFloat(document.getElementById('total_amount').value);
			var empid = document.getElementById('empid_resign').value;

			if (salary == "") {
				alert("Please Enter Salary");
				return false;
			}
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('/entry_con/final_satalment_save'); ?>",
				data:{
					start_resign_date:start_resign_date,
					salary:salary,
					total_days_year_month:total_days_year_month,
					pay_day_year:pay_day_year,
					total_days_leave:total_days_leave,
					total_days_present:total_days_present,
					total_amount_year:total_amount_year,
					total_amount_leave:total_amount_leave,
					total_amount_present:total_amount_present,
					total_amount:total_amount,
					empid:empid
				},
				success: function(resp) {
					alert(resp);
				}
			});
		}
	</script>