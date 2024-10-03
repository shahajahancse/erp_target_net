<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Montly OT Register</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />

</head>

<body>

<div style=" margin:0 auto;  width:800px;">
<?php 
$this->load->view("head_english"); 
?>
<!--Report title goes here-->
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:12px; font-weight:bold;">
Monthly OT Report of <?php echo "$start_date"; ?></span>
<br />
<br />


<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;">
<th>SL</th><th>Emp ID</th><th>Punch Card No.</th><th>Employee Name</th> <!--<th>DOJ</th>--> <th>Department</th> <th>Section</th> <th>Line No. </th> <th>Designation</th> <th>Shift</th> <th>Gross Sal</th> <th>OT Rate</th> <th>Total OT Hour</th><th>Total OT Amount</th> 


<?php
$total_ot_hour = 0;
$total_ot_amount = 0;


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
	
	echo "<td width='150'  style='text-align:left;' >";
	echo $values["emp_name"][$i];
	echo "</td>";
	
	/*echo "<td>";
	$year= trim(substr($values["doj"][$i],0,4));
	$month = trim(substr($values["doj"][$i],5,2));
	$tarik = trim(substr($values["doj"][$i],8,2));
	$date_format = date("d-M-y", mktime(0, 0, 0, $month, $tarik, $year));
	echo $date_format;
	echo "</td>";*/
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["dept_name"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["sec_name"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["line_name"][$i];
	echo "</td>";
	
	echo "<td  width='140'  style='text-align:left;'>";
	echo $values["desig_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["emp_shift"][$i];
	echo "</td>";
	
	echo "<td  width='40'  style='text-align:right;' >";
	echo $values["gross_sal"][$i];
	echo "</td>";
	
	echo "<td  style='text-align:right;' >";
	echo $values["ot_rate"][$i];
	echo "</td>";
	
	echo "<td  style='text-align:center;' >";
	echo $values["total_ot_hour"][$i];
	echo "</td>";
	
	
	$ot_hour = $values["total_ot_hour"][$i];	

	$total_ot_hour = $total_ot_hour + $ot_hour;
	
	
	echo "<td  style='text-align:right;' >";
	echo $values["total_ot_amount"][$i];
	echo "</td>";
	
	$ot_amount = $values["total_ot_amount"][$i];	

	$total_ot_amount = $total_ot_amount + $ot_amount;
	echo "</tr>";
}

?>
<tr>
<td  colspan="11" style="text-align:center; font-weight:bold;" >
Grand Total
</td>
<td style="text-align:center; font-weight:bold;" ><?php echo $total_ot_hour; ?></td>
<td style="text-align:right; font-weight:bold;" ><?php echo number_format($total_ot_amount); ?>/=</td>
</table>
</div>
</div>
</body>
</html>
