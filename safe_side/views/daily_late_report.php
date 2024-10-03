<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Daily Late Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="../../../../css/SingleRow.css" />
</head>

<body>
<?php //print_r($values); 
//echo $daily_status;
$base_url = base_url();
$url = $base_url."index.php/payroll_con/daily_late_report_export/$year/$month/$date/$col_desig/$col_line/$col_section/$col_dept/$col_all";
?>
<div style=" margin:0 auto;  width:800px;">
<div id="no_print" style="float:right; ">
<!--<a href="<?php //echo $url ?>"><img height="30px" width="30px" src="<?php //echo $base_url.'images/xls.jpg'; ?>" align="" /></a>-->
</div>

<?php 
$this->load->view("head_english"); 
?>
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
Daily Late Report of <?php echo "$date/$month/$year"; ?></span>
<br />
<br />
<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:13px;">
<th>SL</th><th>Emp ID</th><th>Punch Card No.</th><th>Employee Name</th> <!--<th>DOJ</th>--> <th>Department</th> <th>Section</th> <th>Line No. </th> <th>Designation</th> <th>Shift</th> <th>IN Time</th>
<?php
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
	
	/*echo "<td>";
	$year= trim(substr($values["doj"][$i],0,4));
	$month = trim(substr($values["doj"][$i],5,2));
	$tarik = trim(substr($values["doj"][$i],8,2));
	$date_format = date("d-M-y", mktime(0, 0, 0, $month, $tarik, $year));
	echo $date_format;
	echo "</td>";*/
	
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
	echo $values["desig_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["shift_name"][$i];
	echo "</td>";
	
	echo "<td width='80' style='text-align:center'>";
	$values["in_time"][$i];
	$hour = trim(substr($values["in_time"][$i],0,2));
	$minute = trim(substr($values["in_time"][$i],3,2));
	$sec = trim(substr($values["in_time"][$i],6,2));
	$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
	echo $time_format;
	echo "</td>";
	
	
	echo "</tr>";
}

?>

</table>
</div>
</div>
</body>
</html>
