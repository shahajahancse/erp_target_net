<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Extra OT Job Card</title>
<link rel="stylesheet" type="text/css" href="../../../../../../css/print.css" media="print" />
</head>

<body>

<?php 
//print_r($values);
$emp_id_count = count($values["emp_id"]);

for($i = 0 ; $i < $emp_id_count; $i++)
{
	$emp_id  = $values["emp_id"][$i];
	
	?>

	<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif; min-height:1000px;">
		<div >
		<?php
		echo $this->load->view("head_english"); 
		?>
		<span style="font-size:13px; font-weight:bold;">
			Extra OT Report from
			<?php 
			echo $grid_firstdate; 
			echo "- TO - ";
			echo $grid_firstdate; 
			?>
		</span>
		</div>
		<?php
		echo "<table border='0' style='font-size:13px;' width='480'>";
			echo "<tr>";
				echo "<td width='70'>";
				echo "<strong>Emp ID:</strong>";
				echo "</td>";
				echo "<td width='200'>";
				echo $values["emp_id"][$i];
				echo "</td>";
				echo "<td width='50'>";
				echo "<strong>Name :</strong>";
				echo "</td>";
				echo "<td width='150'>";
				echo $values["emp_full_name"][$i];
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td >";
				echo "<strong>Proxi NO. :</strong>";
				echo "</td>";
				echo "<td >";
				echo $values["proxi_id"][$i];
				echo "</td>";
				
				echo "<td>";
				echo "<strong>Section :</strong>";
				echo "</td>";
				echo "<td >";
				echo $values["sec_name"][$i];
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td>";
				echo "<strong>Line :</strong>";
				echo "</td>";
				echo "<td>";
				echo $values["line_name"][$i];
				echo "</td>";
				echo "<td>";
				echo "<strong>Desig :</strong>";
				echo "</td>";
				echo "<td>";
				echo $values["desig_name"][$i];
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td>";
				echo "<strong>DOJ :</strong>";
				echo "</td>";
				echo "<td>";
				echo $values["emp_join_date"][$i];
				echo "</td>";
				
				echo "<td >";
				echo "<strong>Dept :</strong>";
				echo "</td>";
				echo "<td >";
				echo $values["dept_name"][$i];
				echo "</td>";
			echo "</tr>";
		echo "<table>";
		?>
		<br />
		<table cellpadding="0" cellspacing="0" border="1" style='font-size:13px;'>
		<th>Date</th><th>IN Time</th><th>OUT Time</th><th>OT Hour</th><th>Extra OT Hour</th>
	<?php
	$shift_log_count = count($values[$emp_id]["shift_log_date"]);
	$ot_hour = 0;
	$extra_ot_hour = 0;
	for($k = 0 ; $k < $shift_log_count; $k++)
	{
		/*echo "<br>".$values[$emp_id]["shift_log_date"][$k];		
		echo "IN=".$values[$emp_id]["in_time"][$k];
		echo "OUT=".$values[$emp_id]["out_time"][$k];
		echo "OT=".$values[$emp_id]["ot_hour"][$k];
		echo "EX_OT=".$values[$emp_id]["extra_ot_hour"][$k];*/
		?>
		<tr>
		<td align="center"> 
		<?php 
		$shift_date =  $values[$emp_id]["shift_log_date"][$k]; 
		echo $shift_date = date("d-M-Y", strtotime($shift_date)); 
		?> 
		</td>
		<td align="center"> 
		<?php 
		if($values[$emp_id]["in_time"][$k] =='00:00:00')
		{
			echo "&nbsp;"; 
		}
		else 
		{
			$in_time =  $values[$emp_id]["in_time"][$k];
			$hour = trim(substr($in_time,0,2));
			$minute = trim(substr($in_time,3,2));
			$sec = trim(substr($in_time,6,2));
			echo $time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));  
		}	
		?> 
		</td>
		<td align="center"> 
		<?php 
		if($values[$emp_id]["out_time"][$k] =='00:00:00')
		{
			echo "&nbsp;"; 
		}
		else 
		{
			$out_time =  $values[$emp_id]["out_time"][$k];
			$hour = trim(substr($out_time,0,2));
			$minute = trim(substr($out_time,3,2));
			$sec = trim(substr($out_time,6,2));
			echo $time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));  
		}	
		?> 
		</td>
		<td align="center"> <?php echo $values[$emp_id]["ot_hour"][$k]; $ot_hour = $ot_hour + $values[$emp_id]["ot_hour"][$k];?> </td>
		<td align="center"> <?php echo $values[$emp_id]["extra_ot_hour"][$k]; $extra_ot_hour = $extra_ot_hour + $values[$emp_id]["extra_ot_hour"][$k]; ?> </td>
		</tr>
		<?php
		
	}
	?>
	<td style="font-weight:bold; text-align:center;" colspan="3"> Total </td>
	<td style="font-weight:bold; text-align:center;" align="center"><?php  echo  $ot_hour;?></td>
	<td style="font-weight:bold; text-align:center;" align="center"><?php echo  $extra_ot_hour;?></td>
	</table>
	</div>
	<br />
	<?php
}

?>		

</body>
</html>