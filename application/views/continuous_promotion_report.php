<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Promotion Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />

</head>

<body>
<div align="center" style=" margin:0 auto; width:800px; overflow:hidden; font-family: 'Times New Roman', Times, serif;">
<?php 
$this->load->view("head_english"); 
?>

<span style="font-size:13px; font-weight:bold;">
Promotion Report from 
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


<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;">
<th>SL</th>
<!--<th>Employee Name</th>-->
<th style="background:#DDDDDD;">New Emp ID</th>
<th>New Dept.</th> 
<th>New Sec.</th> 
<th>New Line </th> 
<th>New Desig.</th> 
<th>New Salary.</th> 
<th style="background:#DDDDDD;">Prev. Emp ID</th>
<th>Prev. Dept.</th> 
<th>Prev. Sec.</th> 
<th>Prev. Line </th> 
<th>Prev. Desig.</th> 
<th>Prev. Salary.</th> 
<th>Effective Date</th>
<?php
//$total_ot_hour = 0;
//$total_ot_amount = 0;


$count = count($values["new_emp_id"]);
for($i=0; $i<$count; $i++ )
{
		
	echo "<tr>";
	
	echo "<td>";
	echo $k = $i+1;
	echo "</td>";
	
	echo "<td style='background:#DDDDDD;'> ";
	echo $values["new_emp_id"][$i];
	echo "</td>";

	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["new_dept"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["new_section"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["new_line"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["new_desig"][$i];
	echo "</td>";
	
	echo "<td  width='60'  style='text-align:center;' >";
	echo $values["new_salary"][$i];
	echo "</td>";
	
	
	/*echo "<td width='150'  style='text-align:left;' >";
	echo $values["emp_name"][$i];
	echo "</td>";*/
	
	
	
	echo "<td style='background:#DDDDDD;'>";
	echo $values["prev_emp_id"][$i];
	echo "</td>";

	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["prev_dept"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["prev_section"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["prev_line"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["prev_desig"][$i];
	echo "</td>";
	
	echo "<td  width='60'  style='text-align:center;' >";
	echo $values["prev_salary"][$i];
	echo "</td>";
	
	
	$sStartDate = date("d-M-Y", strtotime($values["effective_month"][$i])); 
	
	echo "<td  style='text-align:center;' >";
	echo $sStartDate;
	echo "</td>";
	echo "</tr>";
	
	}


?>
</table>
</div>
</div>
</body>
</html>
