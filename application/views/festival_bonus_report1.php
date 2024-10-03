<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Festival Bouns Report</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />


</head>

<body>
<div style="margin:0 auto; width:950px; height:auto; overflow:hidden;">
<?php $this->load->view("head_english"); ?>
<div style="margin:0 auto; width:100%; height:auto; overflow:hidden; text-align:center; font-family:'Arial Black', Gadget, sans-serif; font-weight:bold;">Festival Bouns Report of
<?php 
$date = $salary_month;
$year=trim(substr($date,0,4));
$month=trim(substr($date,5,2));
$day=trim(substr($date,8,2));
$date_format = date("F-Y", mktime(0, 0, 0, $month, $day, $year));
echo $date_format;?>
</div>
<table border="1" style="border:thin; border-collapse:collapse; font-size:14px;">
  <tr height="10px">
    <td  width="15" height="20px"><div align="center"><strong>SI. No</strong></div></td>
    <td width="30" height="20px"><div align="center"><strong>Name of Employee</strong></div></td>
	<td width="14" height="20px"><div align="center"><strong>Card No</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Designation</strong></div></td>
	 <td width="25" height="20px"><div align="center"><strong>Section</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Joining Date</strong></div></td>
	<td width="25" height="20px"><div align="center"><strong>Grade</strong></div></td>
    <td width="20" height="20px"> <div align="center"><strong>Basic</strong></div></td>
    <td width="17" height="20px"><div align="center"><strong>H/Rent</strong></div></td>
    <td width="15" height="20px"><div align="center"><strong>Medical</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Gross Salary</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Service Month</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Bonus %</strong></div></td>
    <td width="22" height="20px"><div align="center"><strong>Deduction ( Stamp )</strong></div></td>
    <td width="22" height="20px"><div align="center"><strong>Festival Bonus</strong></div></td> 
    <td  width="180"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
  
<?php
	$i = 1;	
	$total_festival_bonus = 0;
	foreach($value->result() as $rows)
	{
		echo "<tr height='80px' style='text-align:center;' >";
		echo "<td >";
		echo $i;
		echo "</td>";
		
		echo "<td>";
		print_r($rows->emp_full_name);
		echo '<br>';
		if($grid_status == 4)
		{
			$resign_date = $this->grid_model->get_resign_date_by_empid($rows->emp_id);
			if($resign_date != false){
			echo $resign_date = date('d-M-y', strtotime($resign_date));}
		}
		echo "</td>"; 
				
		echo "<td>";
		print_r($rows->emp_id);
		//echo $row->emp_id;
		echo "</td>";
				
		echo "<td>";
		print_r($rows->desig_name);
		//echo $row->desig_name;
		echo "</td>";
		
		echo "<td>";
		print_r($rows->sec_name);
		//echo $row->desig_name;
		echo "</td>";
				
				
		echo "<td>";
		$date = $rows->emp_join_date;
		//print_r($rows->emp_join_date);
		$year=trim(substr($date,0,4));
		$month=trim(substr($date,5,2));
		$day=trim(substr($date,8,2));
		$date_format = date("d-M-y", mktime(0, 0, 0, $month, $day, $year));
		echo $date_format;
		echo "</td>";
			
		echo "<td>";
		print_r ($rows->gr_name);
		echo "</td>";
			
		echo "<td>";
		print_r ($rows->basic_sal);
		echo "</td>";
			
		echo "<td>";
		print_r ($rows->house_r);
		//echo $row->house_r;
		echo "</td>";
			
		echo "<td>";
		print_r ($rows->medical_a);
		//echo $row->medical_a;
		echo "</td>";
				 
		echo "<td>";
		print_r ($rows->gross_sal);
		//echo "<strong>$row->gross_sal</strong>";
		echo "</td>";
		
		echo "<td>";
		$effective_date = trim(substr($salary_month,1,7));
		$effective_date = $this->salary_process_model->get_bonus_effective_date($effective_date);
		echo $service_month = $this->salary_process_model->get_service_month($effective_date,$rows->emp_join_date);
		
		echo "</td>";
		
		echo "<td>";
		$bouns_rule = $this->salary_process_model->get_festival_bonus_rule($service_month);
		if($bouns_rule)
		echo $bouns_rule['bonus_percent'];
		echo "</td>";		
		
		echo "<td>";
		echo 10;
		echo "</td>";
		
		echo "<td>";
		print_r ($rows->festival_bonus - 10);
		$total_festival_bonus = $total_festival_bonus + $rows->festival_bonus - 10;
		echo "</td>";
			
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
			
		echo "</tr>"; 
		$i++;
	}
	?>
	<tr>
		<td align="center" colspan="13"><strong>Total Per Page</strong></td>
		<td align="right"><strong><?php echo $total_festival_bonus = number_format($total_festival_bonus);?></strong></td>
		<td></td>
	</tr>
	
</table>
</div>
</body>
</html>