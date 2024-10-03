<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Continuous <?php echo $status; ?> Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../../css/SingleRow.css" />
</head>

<body>
<div style="margin:0 auto; width:800px;">
<?php 
$this->load->view("head_english"); 
?>
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
<?php echo $status; ?> Report from 
<?php 
	$year= trim(substr($start_date,0,4));
	$month = trim(substr($start_date,5,2));
	$tarik = trim(substr($start_date,8,2));
	$date_format = date("d-M-Y", mktime(0, 0, 0, $month, $tarik, $year));
	echo $date_format;
	
	echo " - TO - ";
	
	$year= trim(substr($end_date,0,4));
	$month = trim(substr($end_date,5,2));
	$tarik = trim(substr($end_date,8,2));
	$date_format = date("d-M-Y", mktime(0, 0, 0, $month, $tarik, $year));
	echo $date_format;
	
?></span>
<br />
<br />
<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:13px;">
<th>SL</th><th>Emp ID</th><th>Proxi ID</th><th>Name</th><!--<th>DOJ</th>--><th>Dept.</th><th>Section</th><th>Line</th><th>Designation</th><th>Total <?php echo $status; ?></th>
<?php
//print_r($values);

//echo $values["result"][0]["empid"][0];

$i=0;
$count = count($values["empid"]);
for($i=0; $i<$count; $i++ )
{
	echo "<tr>";
	
	echo "<td>";
	echo $i+1;
	echo "</td>";
	
	echo "<td>";
	echo $values["empid"][$i];
	echo "</td>";
	
	echo "<td>";
	if($values["proxid"][$i] =='')
	{
		echo "&nbsp;";
	}
	else
	{
		echo $values["proxid"][$i];
	}
	echo "</td>";
	
	echo "<td>";
	echo $values["fullname"][$i];
	echo "</td>";
	
	/*echo "<td>";
	$date = $values["jdate"][$i];
	$year=trim(substr($date,0,4));
	$month=trim(substr($date,5,2));
	$day=trim(substr($date,8,2));
	$date_format = date("d-M-y", mktime(0, 0, 0, $month, $day, $year));
	echo $date_format;
	echo "</td>";*/
	
	echo "<td>";
	echo $values["dept_name"][$i];
	echo "</td>";
	
	echo "<td>";
	echo $values["sec_name"][$i];
	echo "</td>";
	
	echo "<td>";
	echo $values["line_name"][$i];
	echo "</td>";
	
	echo "<td>";
	echo $values["desig"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center; font-weight:bold;'>";
	echo $values["total"][$i];
	echo "</td>";
	
	echo "<tr>";
}
?>
</table>
</div>
</body>
</html>
