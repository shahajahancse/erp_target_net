<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Process</title>

 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />
 
<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>

</head>

<body bgcolor="#ECE9D8">

<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">

<fieldset style='width:600px;'><legend><font size='+1'><b>Attendance Process</b></font></legend>

<form name="attn_process">
Select Date : 

<input type='text' name='startdate' id='p_start_date' size='16'>
<script language="JavaScript">
	var o_cal = new tcal ({
		// form name
		'formname': 'attn_process',
		// input name
		'controlname': 'p_start_date'
	});
	
	// individual template parameters can be modified via the calendar variable
	o_cal.a_tpl.yearscroll = false;
	o_cal.a_tpl.weekstart = 6;
	
	</script>

<input type='button' name='view' onclick='fetch_data()' value='Fetch Data'/>
<input type='button' name='view' onclick='attendance_process()' value='Process'/>
</form>
</fieldset>

</div>
<div id="loader"  align="center" style="margin:0 auto; width:600px; overflow:hidden; display:none; margin-top:10px;"><img src="<?php echo base_url();?>/images/ajax-loader.gif" /></div>
</body>
</html>