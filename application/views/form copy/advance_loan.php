<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>

 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />
 
<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>


</head>

<body bgcolor="#ECE9D8">

<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">

<fieldset style='width:600px;'><legend><font size='+1'><b>Advance Loan</b></font></legend>

<form name="adv_loan">
<table border="0" cellpadding="2" cellspacing="2">
<tr><td>Enter employee ID</td> <td>:</td> <td><input type="text" name="emp_id" id="emp_id" /></td></tr>
<tr><td>Enter loan amount</td> <td>:</td> <td><input type="text" name="loan_amt" id="loan_amt" /></td></tr>
<tr><td>Enter payment/month</td> <td>:</td> <td><input type="text" name="pay_amt" id="pay_amt" /></td></tr>
<tr><td>Select Loan Date</td> <td>:</td>
<td>
<input type='text' name='loan_date' id='loan_date' size='16'>
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'adv_loan',
		// input name
		'controlname': 'loan_date'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>
</td></tr>
<tr><td> </td><td><td><input type='button' name='view' onclick='advance_loan_insert()' value='Submit'/></td></tr>
</table>
</form>
</fieldset>

</div>

</body>
</html>