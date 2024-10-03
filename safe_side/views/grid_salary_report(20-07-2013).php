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
		
	<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.min.js"></script>
	<script src="<?php echo $base_url; ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/grid_content.js" type="text/javascript"></script>
    <script src="<?php echo $base_url; ?>js/production.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/calendar_eu.js" type="text/javascript"></script>
	

</head>
<body bgcolor="#ECE9D8">
<div align="center" style=" margin:0 auto; width:1000px; min-height:555px; overflow:hidden;">
<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
<form name="grid">
<div>

<fieldset style='width:95%;'><legend><font size='+1'><b>Month & Year</b></font></legend>
<?php $this->load->view('month_year_salary_report'); ?>
<br /><br /> 
</fieldset>
</div>
<br />
<div>
<fieldset style='width:95%;'><legend><font size='+1'><b>Category Options</b></font></legend>
<table>
<tr>
<td>Start</td><td>:</td><td><select name='grid_start' id='grid_start' style="width:250px;" onchange='grid_get_all_data()' /><option value='Select'>Select</option><option value='all'>ALL</option></select></td>
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
</fieldset>
</div>
<div>
<br />

<fieldset style='width:95%;'><legend><font size='+1'><b>Salary Reports</b></font></legend>
<table width="100%"  style="font-size:11px; ">
<tr>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;"  value="Montly Salary Sheet" onClick="grid_monthly_salary_sheet()"></td>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" name='view' onclick='sal_summary_report()' value='Salary Summary Report'/></td>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" value="Pay Slip" onClick="grid_pay_slip()"></td>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;" value="Production Salary Sheet" onClick="production_salary_sheet()"></td>
</tr>
<tr>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;"  value="Wages Card" onClick="grid_production_wages_card()"></td>
<td style="width:20%;"></td>
<td style="width:20%;"></td>
<td style="width:20%;"></td>
</tr>
</table>

</fieldset>
<br />
<fieldset style='width:95%;'><legend><font size='+1'><b>Others Benefit Report</b></font></legend>
<table width="100%"  style="font-size:11px; ">
<tr>
<td style="width:20%;"><input type="button" style=" width:100%; font-size:100%;"  value="Maternity Benefit Report" onClick="grid_maternity_benefit()"></td>
<td style="width:20%;"></td>
<td style="width:20%;"></td>
<td style="width:20%;"></td>
</tr>
</table>

</fieldset>
</div>

</form>

</div>
<div style="float:right;">
<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
</div>
<!--<div id="pager1"></div>-->

<div id="viewid"></div>
</div>
</body>
</html>