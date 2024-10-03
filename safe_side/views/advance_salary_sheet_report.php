<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Advance Salary Sheet</title>
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

			
			$grnd_total_advance_salary = 0;
			$grand_total_ot_amount = 0;
			?>
			<table>
			
			<?php
for ( $counter = 1; $counter <= $page; $counter ++)
{
?>

<table height="auto"  class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:13px; width:100%;">

<tr height="85px">
<td colspan="18" align="center">

<div style="text-align:left; position:relative; top:20px; padding-left:10px;">
<?php 
//$date = date('d-m-Y');
//echo "Payment Date : $date"; ?>
</div>
 
<?php $this->load->view("head_english"); ?>
<?php if($grid_status == 4){ echo 'Resign '; }?>Advance Salary Sheet of 
<?php 
$date = $salary_month;
$year=trim(substr($date,0,4));
$month=trim(substr($date,5,2));
$day=trim(substr($date,8,2));
$date_format = date("F-Y", mktime(0, 0, 0, $month, $day, $year));
echo $date_format;

//MANUALLY DEFINE SALARY DAYS
$payable_salary_days = 15;

?>

</td>
</tr>


  <tr height="20px">
    <td width="15" height="20px"><div align="center"><strong>SI. No</strong></div></td>
    <td width="30" height="20px"><div align="center"><strong>Name of Employee</strong></div></td>
	<td width="14" height="20px"><div align="center"><strong>Card No</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Designation</strong></div></td>
	<td width="80" height="20px"><div align="center"><strong>Section</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Joining Date</strong></div></td>
	<td width="25" height="20px"><div align="center"><strong>Grade</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Basic Salary</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>House Rent</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Medical</strong></div></td>
    <td width="45" height="20px"><div align="center"><strong>Gross Salary</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong><?php echo $payable_salary_days; ?> Days Salary Payable Amount</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>OT Rate</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>OT Hour</strong></div></td>
     <td width="35" height="20px"><div align="center"><strong>EOT Hour</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>OT+EOT Amount</strong></div></td>
    <td width="22" height="20px"><div align="center"><strong>Net Payable</strong></div></td>
	<td width="180"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
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
  	
   	$total_advance_salary = 0;
	$total_ot_amount = 0;
		
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
		$emp_id = $value[$k]->emp_id;
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
		
		$salary_structure = $this->common_model->salary_structure($value[$k]->gross_sal);
		
		echo "<td>";
		echo $basic_sal = $salary_structure['basic_sal'];
		echo "</td>";
		
		echo "<td>";
		echo $house_rent = $salary_structure['house_rent'];
		echo "</td>";
		
		echo "<td>";
		echo $medical_allow = $salary_structure['medical_allow'];
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->gross_sal);
		$gross_sal = $value[$k]->gross_sal;
		echo "</td>";
			
		echo "<td>";
		$last_day = date("t", strtotime($salary_month));
		echo $payable_amount = round(($gross_sal / $last_day * $payable_salary_days));
		echo "</td>";
		
		$ot_title =$this->common_model->get_ot_title($value[$k]->emp_id);//1=stuff
			
		echo "<td>";
		if($ot_title=="1") 
		echo $ot_rate = 0; 
		else 
		echo $ot_rate = $salary_structure['ot_rate'];
		echo "</td>";
				 
		//CREATE START DATE AND END DATE FOR OT AND EOT HOUR
		$year = date('Y',strtotime($salary_month));
		$month = date('m',strtotime($salary_month));
		
		$start_date = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		$end_date = date("Y-m-d", mktime(0, 0, 0, $month, $payable_salary_days, $year));
		
		
		echo "<td>";
		if($ot_title=="1") {$ot_hour = 0;}
		else 
		{
			$ot_hour = $this->salary_process_model->ot_hour_between_date($emp_id, $start_date, $end_date);
		}
		echo $ot_hour;
		echo "</td>";
		
		echo "<td>";
		if($ot_title=="1") {$eot_hour = 0;}
		else 
		{
			$eot_hour = $this->salary_process_model->eot_hour_between_date($emp_id, $start_date, $end_date);
		}
		echo $eot_hour;
		echo "</td>";
				
		echo "<td>";
		echo $ot_amount = round((($ot_hour + $eot_hour) * $ot_rate),2);	
		$total_ot_amount = $total_ot_amount + $ot_amount;
		$grand_total_ot_amount = $grand_total_ot_amount + $ot_amount;
		echo "</td>";
		
		echo "<td>";
		echo $net_pay = round($payable_amount + $ot_amount);
		$total_advance_salary = $total_advance_salary + $net_pay;
		$grnd_total_advance_salary = $grnd_total_advance_salary + $net_pay;
		echo "</td>";		
						
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
			
		echo "</tr>"; 
		$k++;
		
		//ADVANCE LOAN ENTRY TO THE DATABASE
		$data = array(
					'emp_id' 		=> $emp_id,
					'loan_amt'		=> $net_pay,
					'pay_amt'		=> $net_pay,
					'loan_date'		=> '2012-10-01',
					'loan_status'	=> 1
					);
		//$this->db->insert('pr_advance_loan', $data);
	}
	?>
	<tr>
		<td align="center" colspan="15"><strong>Total Per Page</strong></td>
        <td align="right"><strong><?php echo $total_ot_amount = number_format($total_ot_amount);?></strong></td>
		<td align="right"><strong><?php echo $total_advance_salary = number_format($total_advance_salary);?></strong></td>
	</tr>
	<?php
	if($counter == $page)
   		{?>
			<tr height="10">
            <td colspan="15" align="center">
			<strong>Grand Total Amount Tk</strong></td>
            <td align="right"><strong><?php echo $grand_total_ot_amount = number_format($grand_total_ot_amount);?></strong></td>
			<td align="right"><strong><?php echo $grnd_total_advance_salary = number_format($grnd_total_advance_salary);?></strong></td>
			
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