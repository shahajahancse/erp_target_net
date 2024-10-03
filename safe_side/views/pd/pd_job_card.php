<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Production Job Card</title>
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

$count = count($values["emp_id"]);

//$count = 3;
for($i = 0; $i<$count;$i++)
{
	//echo $i;
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

	$this->load->view('head_english');
	echo "<span style='font-size:13px; font-weight:bold;'>";
	echo "Job Card Report from  $grid_firstdate -TO- $grid_seconddate";
	echo "</span>";
	echo "<br /><br />";
	
	$emp_id = $values["emp_id"][$i];
	echo "<table border='0' style='font-size:13px; margin-bottom:10px; position:relative; left:50px;' width='400' align='center'>";
	echo "<tr>";
	echo "<td width='70'>";
	echo "<strong>Emp ID</strong>";
	echo "</td>";
	echo "<td width='10'>";
	echo ":";
	echo "</td>";
	echo "<td width='100'>";
	echo $values["emp_id"][$i];
	echo "</td>";
	
	echo "<td width='50'>";
	echo "<strong>Name </strong>";
	echo "</td>";
	echo "<td width='10'> ";
	echo ":";
	echo "</td>";
	echo "<td width='150'>";
	echo $values["emp_full_name"][$i];
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td >";
	echo "<strong>Proxi NO. </strong>";
	echo "</td>";
	echo "<td>";
	echo ":";
	echo "</td>";
	echo "<td >";
	echo $values["proxi_id"][$i];
	echo "</td>";
	
	echo "<td>";
	echo "<strong>Section </strong>";
	echo "</td>";
	echo "<td>";
	echo ":";
	echo "</td>";
	echo "<td >";
	echo $values["sec_name"][$i];
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>";
	echo "<strong>DOJ </strong>";
	echo "</td>";
	echo "<td>";
	echo ":";
	echo "</td>";
	echo "<td>";
	echo $values["emp_join_date"][$i];
	echo "</td>";
	
	echo "<td >";
	echo "<strong>Floor</strong>";
	echo "</td>";
	echo "<td>";
	echo ":";
	echo "</td>";
	echo "<td >";
	echo $values["posi_name"][$i];
	echo "</td>";
	echo "</tr>";
	echo "<table>";
	if(isset($values[$emp_id]["date"]))
	{
	$count1 = count($values[$emp_id]["date"]);
	
	echo "<table class='sal' width='500' border='1' bordercolor='#000000' cellspacing='0' cellpadding='3' style='text-align:center; font-size:13px;'> <th>Date</th><th>Article</th><th>Order No</th><th>Process</th><th>Color</th><th>Size</th><th>Qty</th><th>Remarks</th><th>Sign</th>";
	for($k = 0; $k<$count1;$k++)
	{
		//echo $values[$emp_id]["shift_log_date"][$k];
		//echo "<br>";
		
		echo "<tr>";
	
		echo "<td>&nbsp;";
		echo date("M-d-Y", strtotime($values[$emp_id]["date"][$k]));
		echo "</td>";
		
		echo "<td>";
		echo $values[$emp_id]["article_id"][$k];
		echo "</td>";
		
		$article_id =$values[$emp_id]["article_id"][$k];
		$order_number = $this->db->where("article_id",$article_id)->get('pd_style_infos')->row()->order_number;
		
		echo "<td>";
		echo $order_number;
		echo "</td>";
		
		$process_id =$values[$emp_id]["process_id"][$k];
		$process_name = $this->db->where("process_id",$process_id)->get('pd_process_setups')->row()->process_name;
		echo "<td style='text-transform:uppercase;'>&nbsp;";
		echo $process_name;
		echo "</td>";
		
		
		
		$color_id =$values[$emp_id]["color_id"][$k];
		$color_name = $this->db->where("color_id",$color_id)->get('pd_color_infos')->row()->color_name;
		echo "<td>&nbsp;";
		echo $color_name;
		echo "</td>";
		
		
		$size_id =$values[$emp_id]["size_id"][$k];
		$size_name = $this->db->where("size_id",$size_id)->get('pd_size_infos')->row()->size_name;
		echo "<td>&nbsp;";
		echo $size_name;
		echo "</td>";
		
		echo "<td>";
		echo $values[$emp_id]["quantity"][$k];
		echo "</td>";
		
		echo "<td>&nbsp;";
		echo "&nbsp";
		echo "</td>";
		
		echo "<td>&nbsp;";
		echo "&nbsp";
		echo "</td>";
		
		echo "</tr>";
	}
			
	echo "</table>";
	}
	echo "<br>";
	echo "<table border='0' style='font-size:13px;'width='500' cellspacing='0' cellpadding='0'>";
	echo "<tr align='center'>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "DISTRIBUTOR";
	echo "</td>";
	
	echo "<td>&nbsp;</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "INCHARGE";
	echo "</td>";
	
	echo "<td>&nbsp;</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "A.P.M";
	echo "</td>";
	
	echo "<td>&nbsp;</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "P.M";
	echo "</td>";
	
	echo "<td>&nbsp;</td>";
			
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "G.M";
	echo "</td>";
	
	/*echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "PRESENT ERROR";
	echo "</td>";
		
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "LATE COUNT";
	echo "</td>";
	
	echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
	echo "OVERTIME";
	echo "</td>";*/
			
	echo "</tr>";
			
	echo "<tr align='center'>";
		
	echo "<td>";
	echo "&nbsp";
	echo "</td>";
		
	echo "<td>";
	echo "&nbsp";
	echo "</td>";
	
	echo "<td>";
	echo "&nbsp";
	echo "</td>";
			
	echo "<td>";
	echo "&nbsp";
	echo "</td>";

	echo "<td>";
	echo "&nbsp";
	echo "</td>";
	
	echo "<td>";
	echo "&nbsp";
	echo "</td>";
	
	echo "<td>";
	echo "&nbsp";
	echo "</td>";

	
	echo "<td>";
	echo "&nbsp";
	echo "</td>";
	
	echo "</tr>";
	echo "</table>";
	echo "<br /><br />";
	
	echo "</div>";
	echo "<br>";
	//echo $i."helpough";
}
?>

</div>
</body>
</html>
