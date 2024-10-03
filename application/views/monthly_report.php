<html>
<head>
<title>Monthly Attendance Register</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />
</head>
<body>

<?php 
$this->load->view("head_english"); 
?>
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
Attendance Register of <?php echo  $year_month ?> </span>
<br />
<br />

<table class="sal" border='1' cellpadding='0' cellspacing='0' style=" font-size:13px;">

<th>SL #</th><th>Emp Id </th><th>Name</th><th>Dsignation</th>
<?php
        
		foreach ($value->result_array() as $rows => $row)
		{
			$att_month = $row['att_month'];
		}
		$first_y=trim(substr($att_month,0,4));
		$first_m=trim(substr($att_month,5,2));
		$last_date = date("t", mktime(0, 0, 0, $first_m, 1, $first_y));
		for ( $k=1 ; $k <= $last_date ; $k++ )
		{
			echo "<th style='width:20px;'>$k</th>";
		}
		echo "<th>Present</th>";
		echo "<th>Absent</th>";
		echo "<th>Weekend</th>";
		echo "<th>Holiday</th>";
		echo "<th>Leave</th>";
		echo "<th>OT Hour</th>";
$i =1;


foreach ($value->result_array() as $rows => $row)
{
	echo "<tr><td>$i</td><td>";
	echo $row['emp_id'];
	echo "</td><td>";
	echo $row['emp_full_name'];
	echo "</td><td>";
	echo $row['desig_name'];
	echo "</td>";
	
	$p = 0 ;
	$a = 0 ;
	$l = 0 ;
	$w = 0 ;
	$h = 0 ;
	$total_ot = 0;
	$total_eot = 0;
	
	for ( $k=1 ; $k <= $last_date ; $k++ )
	{
		$idate = date("d", mktime(0, 0, 0, 0, $k, 0));
		$date = "date_$idate";
		echo "<td style='text-align:center;'>";
		if($row[$date] =='')
		{
			echo "&nbsp;";
		}
		else
		{
			if($row[$date] == "A")
			{
				echo "<span style='background:#CCCCCC;'> ";
				echo $row[$date];
				echo "</span>";
			}
			else
			{
				echo $row[$date];
				$ot_date = date("Y-m-d", mktime(0, 0, 0, $first_m, $k, $first_y));
				echo "<br>";
				$daily_total_ot = $this->grid_model->get_daily_total_ot_hour($row['emp_id'], $ot_date);
				$daily_total_eot = $this->grid_model->get_daily_total_eot_hour($row['emp_id'], $ot_date);
				echo $daily_total_ot;
				echo "+$daily_total_eot";
				$total_ot = $total_ot + $daily_total_ot;
				$total_eot = $total_eot + $daily_total_eot;
				
			}
			if($row[$date] == "P")
			{
				$p++;
			}
			if($row[$date] == "A")
			{
				$a++;
			}
			if($row[$date] == "L")
			{
				$l++;
			}
			if($row[$date] == "W")
			{
				$w++;
			}
			if($row[$date] == "H")
			{
				$h++;
			}
		}
		echo "</td>";
	}
	echo "<td style='text-align: center;'> $p </td>";
	echo "<td style='text-align: center;'> $a </td>";
	echo "<td style='text-align: center;'>  $w </td>";
	echo "<td style='text-align: center;'> $h </td>";
	echo "<td style='text-align: center;'> $l </td>";
	echo "<td style='text-align: center;'>";
	echo "$total_ot+$total_eot =";
	echo $grand_total_ot = $total_ot + $total_eot; 
	echo "</td>";
	echo "</tr>";
	
	$i++;
}



?>
</table>

</body>
</html>



