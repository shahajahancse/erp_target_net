<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actual Job Card</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);

$present_count = 0;
$absent_count = 0;
$leave_count = 0;
$ot_count = 0;
$late_count = 0;
$wk_off_count = 0;
$holiday_count = 0;
// echo "<pre>";print_r($values);exit;
$count = count($values["emp_id"]);

for($i = 0; $i<$count;$i++)
{
	echo "<div style='min-height:1000px; overflow:hidden;'>";
	$present_count = 0;
	$absent_count = 0;
	$leave_count = 0;
	$ot_count = 0;
	$late_count = 0;
	$wk_off_count = 0;
	$holiday_count = 0;
	$perror_count = 0;
	$total_ot_hour = 0;
	$total_eot_hour = 0;

	$this->load->view('head_english');
	echo "<span style='font-size:13px; font-weight:bold;'>";
	echo "Job Card Report from  $grid_firstdate -TO- $grid_seconddate";
	echo "</span>";
	echo "<br /><br />";
	
	$emp_id = $values["emp_id"][$i];
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
	
	$count1 = count($values[$emp_id]["shift_log_date"]); ?>
	
	<table class='sal' border='1' bordercolor='#000000' cellspacing='0' cellpadding='0' style='text-align:center; font-size:13px; '> 
		<tr>
			<th>Date</th>
			<th>Day</th>
			<th>Shift</th>
			<th>In Time</th>
			<th>Out Time</th>
			<th>Attn.Status</th>
			<th>OT</th>
			<th>EOT</th>
			<th>Weekend</th>
			<th>Night</th>
			<th>Remarks</th>
		</tr>
	<?php for($k = 0; $k<$count1;$k++)
	{
		//echo $values[$emp_id]["shift_log_date"][$k];
		//echo "<br>";
		
		echo "<tr>";
	
		echo "<td>&nbsp;";
		echo $values[$emp_id]["shift_log_date"][$k];
		echo "</td>";

		echo "<td>&nbsp;";
		echo date('l',strtotime($values[$emp_id]["shift_log_date"][$k]));
		echo "</td>";

		echo "<td>&nbsp;";
		echo $values[$emp_id]["emp_shift"][$k];
		echo "</td>";
		
		echo "<td>&nbsp;";
		if($values[$emp_id]["in_time"][$k] == "00:00:00")
		{
			echo "&nbsp;";
		}
		else
		{
			echo date('H:i A', strtotime($values[$emp_id]["in_time"][$k]));
		}
		echo "</td>";
				
		echo "<td>&nbsp;";
		if($values[$emp_id]["out_time"][$k] =="00:00:00")
		{
			echo "&nbsp;";
		}
		else
		{
			echo date('H:i A', strtotime($values[$emp_id]["out_time"][$k]));
		}
		echo "</td>";
		
		echo "<td style='text-transform:uppercase;'>&nbsp;";
		echo $values[$emp_id]["att_status"][$k];
		echo "</td>";
		
		if($values[$emp_id]["att_status"][$k] == "P")
		{
			$present_count++;
		}
		elseif($values[$emp_id]["att_status"][$k] == "A")
		{
			$absent_count++;
		}
		elseif($values[$emp_id]["att_status_count"][$k] == "Leave")
		{
			$leave_count++;
		}
		elseif($values[$emp_id]["att_status"][$k] == "P(Error)")
		{
			$perror_count++;
		}
		elseif($values[$emp_id]["att_status"][$k] == "Work Off")
		{
			$wk_off_count++;
		}
		elseif($values[$emp_id]["att_status"][$k] == "Holiday")
		{
			$holiday_count++;
		}
		
		
		if($values[$emp_id]["remark"][$k] == "Late")
		{
			$late_count++;
		}
		
		
		echo "<td>&nbsp;";
		if($values[$emp_id]["ot_hour"][$k] == 0)
		{
			echo "&nbsp;";
		}
		else
		{
			echo $values[$emp_id]["ot_hour"][$k];
		}
		echo "</td>";
		
		$total_ot_hour = $total_ot_hour + $values[$emp_id]["ot_hour"][$k];
        echo "<td>&nbsp;";
		echo $values[$emp_id]["extra_ot_hour"][$k];
		echo "</td>";
        $total_eot_hour = $total_eot_hour + $values[$emp_id]["extra_ot_hour"][$k];
		
		// echo "<td>&nbsp;";
		// echo $values[$emp_id]["lunch_out"][$k];
		// echo "</td>";
		
		// echo "<td>&nbsp;";
		// echo $values[$emp_id]["lunch_in"][$k];
		// echo "</td>";

		echo "<td>&nbsp;";
		echo 0;
		echo "</td>";

		echo "<td>&nbsp;";
		echo 0;
		echo "</td>";
		
		echo "<td>&nbsp;";
		echo $values[$emp_id]["remark"][$k];
		echo "</td>";
		
		echo "</tr>";
	}
			
	echo "</table>";
	
	echo "<br>";
	echo "<table border='0' style='font-size:13px;'>";
	echo "<tr align='center'>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "PRESENT";
	echo "</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "ABSENT";
	echo "</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "LEAVE";
	echo "</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "WORK OFF";
	echo "</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "HOLIDAY";
	echo "</td>";
	
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "PRESENT ERROR";
	echo "</td>";
		
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "LATE COUNT";
	echo "</td>";
	
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "OVERTIME";
	echo "</td>";

	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "TOTAL PAY DAY";
	echo "</td>";
			
	echo "</tr>";
			
	echo "<tr align='center'>";
		
	echo "<td>";
	echo $present_count;
	echo "</td>";
		
	echo "<td>";
	echo $absent_count;
	echo "</td>";
	
	echo "<td>";
	echo $leave_count;
	echo "</td>";
			
	echo "<td>";
	echo $wk_off_count;
	echo "</td>";

	echo "<td>";
	echo $holiday_count;
	echo "</td>";
	
	echo "<td>";
	echo $perror_count;
	echo "</td>";
	
	echo "<td>";
	echo $late_count;
	echo "</td>";

	
	echo "<td>";
	echo $total_ot_hour+$total_eot_hour;
	echo "</td>";

	echo "<td>";
	echo $present_count+$leave_count+$wk_off_count+$holiday_count+$perror_count;
	echo "</td>";

	echo "</tr>";
	echo "</table>";
	echo "<br /><br />";
	
	echo "</div>";
	echo "<br>";
}
?>

</div>
</body>
</html>
