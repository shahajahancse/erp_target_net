<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Salary Summery Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../../css/print.css" media="print" />
</head>

<body>
<?php //print_r($values); 
//echo $daily_status;
$base_url = base_url();
$url = $base_url."index.php/payroll_con/salary_summary_report_export";
?>
<div>
<div id="no_print" style="float:right;">
<!--<a href="<?php //echo $url ?>"><img height="30px" width="30px" src="<?php //echo $base_url.'images/xls.jpg'; ?>" align="" /></a>-->
</div>
<?php 
$this->load->view("head_english"); 
?>
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
Salary Summery Report</span>
<br />
<br />
<table border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:13px;">
<th>SL</th><th>Emp ID</th><th>Punch Card No.</th><th>Employee Name</th> <th>Designation</th><th>DOJ</th> <th>Department</th> <th>Section</th> <th>Line No. </th> <th>Shift</th>
<th>Basic Salary</th><th>House Rent</th><th>Medical Allow.</th><th>Gross Salary</th>

<?php
$g_total = 0;
$count = count($values["emp_id"]);
for($i=0; $i<$count; $i++ )
{
	echo "<tr>";
	
	echo "<td>";
	echo $k = $i+1;
	echo "</td>";
	
	echo "<td>";
	echo $values["emp_id"][$i];
	echo "</td>";
	
	echo "<td>";
	echo "&nbsp;";
	echo $values["proxi_id"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["emp_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["desig_name"][$i];
	echo "</td>";
	
	echo "<td>";
	$year= trim(substr($values["doj"][$i],0,4));
	$month = trim(substr($values["doj"][$i],5,2));
	$tarik = trim(substr($values["doj"][$i],8,2));
	$date_format = date("d-M-y", mktime(0, 0, 0, $month, $tarik, $year));
	echo $date_format;
	echo "</td>";
	
	echo "<td >";
	echo $values["dept_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["sec_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["line_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["emp_shift"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["basic_sal"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["house_rent"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["medi_allo"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["gross_sal"][$i];
	$g_total = $g_total + $values["gross_sal"][$i];
	echo "</td>";
	
	
	echo "</tr>";
}

?>

</table>

<h3> Grand Total: <?php echo $english_format_number = number_format($g_total);   ?> </h3>
</div>
</body>
</html>
