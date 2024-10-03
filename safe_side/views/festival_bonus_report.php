<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Festival Bonus</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />


</head>

<body>

<?php 
$row_count=count($value);
if($row_count >7)
{
$page=ceil($row_count/7);
}
else
{
$page=1;
}

$k = 0;

			
			$basic = 0;
			$house_rent = 0;
			$medical_all = 0;
			$gross_sal = 0;
			$abs_deduct = 0;
			$payable_basic = 0;
			$payable_house_rent =0;
			$payable_madical_allo =0;
			$pay_wages = 0;
			$att_bonus =0;
			$trans_allaw = 0;
			$lunch_allaw =0;
			$others_allaw = 0;
			$total_allaw =0;
			$ot_hour =0;
			$ot_rate =0;
			$ot_amount =0;
			$gross_pay =0;
			$adv_deduct =0;
			$provident_fund =0;
			$others_deduct =0;
			$total_deduct =0;
			$pbt =0;
			$tax =0;
			$net_pay =0;
			
			$stam_value = 10;
			$total_stam_value = 0;
			?>
			<table>
			
			<?php
for ( $counter = 1; $counter <= $page; $counter ++)
{
?>

<table height="auto"  class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:13px; width:100%;">

<tr height="85px">
<td colspan="17" align="center">

<div style="text-align:left; position:relative; top:20px; padding-left:10px;">
<?php 
$date = date('d-m-Y');
echo "Payment Date : $date"; ?>
</div>
 
<?php $this->load->view("head_english"); ?>
<?php if($grid_status == 4){ echo 'Resign '; }?>Festival Bonus of 
<?php 
$date = $salary_month;
$year=trim(substr($date,0,4));
$month=trim(substr($date,5,2));
$day=trim(substr($date,8,2));
$date_format = date("F-Y", mktime(0, 0, 0, $month, $day, $year));
echo $date_format;

?>

</td>
</tr>


  <tr height="20px">
    <td  width="15" height="20px"><div align="center"><strong>SI. No</strong></div></td>
    <td width="30" height="20px"><div align="center"><strong>Name of Employee</strong></div></td>
	<td width="14" height="20px"><div align="center"><strong>Card No</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Designation</strong></div></td>
	 <td width="80" height="20px"><div align="center"><strong>Section</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Joining Date</strong></div></td>
	<td width="25" height="20px"><div align="center"><strong>Grade</strong></div></td>
    <td width="20" height="20px"> <div align="center"><strong>Basic</strong></div></td>
    <td width="17" height="20px"><div align="center"><strong>H/Rent</strong></div></td>
    <td width="15" height="20px"><div align="center"><strong>Medical</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Gross Salary</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Service Month</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Bonus %</strong></div></td>
    <td width="22" height="20px"><div align="center"><strong>Festival Bonus</strong></div></td> 
    <td width="20" height="20px"><div align="center"><strong>Deduction (Stamp)</strong></div></td>
    <td width="22" height="20px"><div align="center"><strong>Net Payable</strong></div></td>
	<td  width="180"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
  </tr>
  
<?php
			
	if($counter == $page)
  	{
   		$modulus = ($row_count-1) % 7;
    	$per_page_row=$modulus;
	}
   	else
   	{
    	$per_page_row=6;
   	}
  	
   	$total_pay_wages	= 0;
	$total_ot_hours   	= 0;
	$total_ot_amount  	= 0;
	$total_att_bonus	= 0;
	$total_gross_pays	= 0;
	$total_net_pays		= 0;
	$total_festival_bonus = 0;
	for($p=0; $p<=$per_page_row;$p++)
	{
		echo "<tr height='70' style='text-align:center;' >";
		echo "<td >";
		echo $k+1;
		echo "</td>";
		
		echo "<td style='width:100px;'>";
		print_r($value[$k]->emp_full_name);
		echo '<br>';
		if($grid_status == 4)
		{
			$resign_date = $this->grid_model->get_resign_date_by_empid($value[$k]->emp_id);
			if($resign_date != false){
			echo $resign_date = date('d-M-y', strtotime($resign_date));}
		}
		echo "</td>"; 
				
		echo "<td>";
		print_r($value[$k]->emp_id);
		//echo $row->emp_id;
		echo "</td>";
				
		echo "<td>";
		print_r($value[$k]->desig_name);
		//echo $row->desig_name;
		echo "</td>";
		
		echo "<td>";
		print_r($value[$k]->sec_name);
		//echo $row->desig_name;
		echo "</td>";
				
				
		echo "<td>";
		$date = $value[$k]->emp_join_date;
		//print_r($value[$k]->emp_join_date);
		$year=trim(substr($date,0,4));
		$month=trim(substr($date,5,2));
		$day=trim(substr($date,8,2));
		$date_format = date("d-M-y", mktime(0, 0, 0, $month, $day, $year));
		echo $date_format;
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->gr_name);
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->basic_sal);
		$basic = $basic + $value[$k]->basic_sal;
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->house_r);
		//echo $row->house_r;
		$house_rent = $house_rent + $value[$k]->house_r;
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->medical_a);
		//echo $row->medical_a;
		$medical_all = $medical_all + $value[$k]->medical_a;
		echo "</td>";
				 
		echo "<td>";
		print_r ($value[$k]->gross_sal);
		//echo "<strong>$row->gross_sal</strong>";
		$gross_sal = $gross_sal + $value[$k]->gross_sal;
		echo "</td>";
				
		echo "<td>";
		$effective_date = trim(substr($salary_month,1,7));
		$effective_date = $this->salary_process_model->get_bonus_effective_date($effective_date);
		echo $service_month = $this->salary_process_model->get_service_month($effective_date,$value[$k]->emp_join_date);
		
		echo "</td>";
		
		echo "<td>";
		$bouns_rule = $this->salary_process_model->get_festival_bonus_rule($service_month);
		if($bouns_rule)
		echo $bouns_rule['bonus_percent'];
		echo "</td>";		
		
		echo "<td>";
		print_r ($value[$k]->festival_bonus);
		echo "</td>";
		
		echo "<td>";
		echo '10';
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->festival_bonus - 10);
		$total_festival_bonus = $total_festival_bonus + $value[$k]->festival_bonus - 10;
		$net_pay = $net_pay + $value[$k]->festival_bonus - 10;
		echo "</td>";
				
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
			
		echo "</tr>"; 
		$k++;
	}
	?>
	<tr>
		<td align="center" colspan="15"><strong>Total Per Page</strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_festival_bonus);?></strong></td>
	</tr>
	<?php
	if($counter == $page)
   		{?>
			<tr height="10">
            <td colspan="15" align="center">
			<strong>Grand Total Amount Tk</strong></td>
			<td align="right"><strong><?php echo $english_format_number = number_format($net_pay);?></strong></td>
			
			</tr>
			<?php } ?>
			
			<table width="100%" height="80px" border="0" align="center" style="margin-bottom:85px; font-family:Arial, Helvetica, sans-serif;">
			<tr height="80%" >
			<td colspan="28"></td>
			</tr>
			<tr height="20%">
			<td  align="center">Prepared By (HRM Dept.)</td>
			<td align="center">Checked BY (Account Dept.)</td>
			<td  align="center">Asst. Manager(Admin & HRM)</td>
			<td  align="center">Factory Manager</td>
			<td  align="center">Authorized By</td>
			</tr>
			
			</table>
			</table>
			  
			<?php

		}

?>
</table>

</body>
</html>