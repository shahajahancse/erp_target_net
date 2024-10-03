<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Montly EOT Register</title>
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
Monthly Allowance Report of <?php echo "$start_date"; ?></span>
<br />
<br />


<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;">
<th>SL</th>
<th>Emp ID</th>
<th>Punch Card No.</th>
<th>Employee Name</th>
<th>Department</th> 
<th>Section</th> 
<th>Line No. </th> 
<th>Designation</th> 
<th>Shift</th> 
<th>Total 1st Tiffin Bill</th> 
<th>Total 2nd Tiffin Bill</th> 
<th>Total Night Bill</th> 
<th>Total Bill</th> 


<?php
$total_first_tiffin_allo_amount = 0;
$total_second_tiffin_allo_amount = 0;
$total_night_allo_amount = 0;
$all_total = 0;
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
	
	echo "<td  style='text-align:left;' >";
	echo $values["emp_name"][$i];
	echo "</td>";
	
	/*echo "<td>";
	$year= trim(substr($values["doj"][$i],0,4));
	$month = trim(substr($values["doj"][$i],5,2));
	$tarik = trim(substr($values["doj"][$i],8,2));
	$date_format = date("d-M-y", mktime(0, 0, 0, $month, $tarik, $year));
	echo $date_format;
	echo "</td>";*/
	
	echo "<td    style='text-align:left;'>";
	echo $values["dept_name"][$i];
	echo "</td>";
	
	echo "<td   style='text-align:left;'>";
	echo $values["sec_name"][$i];
	echo "</td>";
	
	echo "<td   style='text-align:left;'>";
	echo $values["line_name"][$i];
	echo "</td>";
	
	echo "<td  style='text-align:left;'>";
	echo $values["desig_name"][$i];
	echo "</td>";
	
	echo "<td >";
	echo $values["emp_shift"][$i];
	echo "</td>";
	
	
	echo "<td  style='text-align:center;' >";
	echo $values["first_tiffin_allo_amount"][$i];
	echo "</td>";
	
	$total_first_tiffin_allo_amount = $total_first_tiffin_allo_amount + $values["first_tiffin_allo_amount"][$i];
	
	echo "<td  style='text-align:center;' >";
	echo $values["second_tiffin_allo_amount"][$i];
	echo "</td>";
	
	$total_second_tiffin_allo_amount = $total_second_tiffin_allo_amount + $values["second_tiffin_allo_amount"][$i];
	
	echo "<td  style='text-align:center;' >";
	echo $values["night_allo_amount"][$i];
	echo "</td>";
	
	$total_night_allo_amount = $total_night_allo_amount + $values["night_allo_amount"][$i];
	
	$total = $values["first_tiffin_allo_amount"][$i] + $values["second_tiffin_allo_amount"][$i] + $values["night_allo_amount"][$i];
	
	echo "<td  style='text-align:center;' >";
	echo $total;
	echo "</td>";
	$all_total = $all_total + $total;
	echo "</tr>";
}

?>

<tr>
<td  colspan="9" style="text-align:center; font-weight:bold;" >
Grand Total
</td>
<td style="text-align:right; font-weight:bold;" ><?php echo number_format($total_first_tiffin_allo_amount); ?>/=</td>
<td style="text-align:right; font-weight:bold;" ><?php echo number_format($total_second_tiffin_allo_amount); ?>/=</td>
<td style="text-align:right; font-weight:bold;" ><?php echo number_format($total_night_allo_amount); ?>/=</td>
<td style="text-align:right; font-weight:bold;" ><?php echo number_format($all_total); ?>/=</td></tr>
</table>
</div>
</div>
</body>
</html>