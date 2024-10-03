<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Monthly Salary Report</title>
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
			
			$stam_value = 5;
			$total_stam_value = 0;
			?>
			<table >
			
			<?php
for ( $counter = 1; $counter <= $page; $counter ++)
{
?>

<table height="auto"  class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:13px; width:auto;">

<tr height="85px">

<?php if($deduct_status == "Yes"){?> 
<td colspan="32" align="center">
<?php }else{ ?>
<td colspan="30" align="center">
<?php } ?>

<div style="text-align:left; position:relative; top:20px; padding-left:10px;">
<?php 
$date = date('d-m-Y');
echo "Payment Date : $date"; ?>
</div>
 
<?php $this->load->view("head_english"); ?>
<?php if($grid_status == 4){ echo 'Resign '; }?>Monthly Salary Sheet of 
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
	 <td width="25" height="20px"><div align="center"><strong>Section</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Joining Date</strong></div></td>
	<td width="25" height="20px"><div align="center"><strong>Grade</strong></div></td>
    <td width="20" height="20px"> <div align="center"><strong>Basic</strong></div></td>
    <td width="17" height="20px"><div align="center"><strong>H/Rent</strong></div></td>
    <td width="15" height="20px"><div align="center"><strong>Medical</strong></div></td>
    <td width="35" height="20px"><div align="center"><strong>Gross    Salary</strong></div></td>
    <td width="31" height="20px"><div align="center"><strong>Payable Days</strong></div></td>
    <td width="30" height="20px"><div align="center"><strong>Present Days</strong></div></td>
    <td width="23" height="20px"><div align="center"><strong>Weekly holyday</strong></div></td>
	<td colspan="4" height="20px"><div align="center"><strong>leave</strong></div></td>
    <td width="22" height="20px"><div align="center"><strong>Abssnt Days</strong></div></td>
	 <td width="22" height="20px"><div align="center"><strong>Abssnt Deduct</strong></div></td>
    <td width="25" height="20px"><div align="center"><strong>Payable wages</strong></div></td>
    <td width="32" height="20px"><div align="center"><strong>OT Hrs</strong></div></td>
    <td width="24" height="20px"><div align="center"><strong>OT  Rate</strong></div></td>
    <td width="42" height="20px"><div align="center"><strong>OT Amount</strong></div></td>
	<td  width="15" height="20px"><div align="center"><strong>Attn.    Bonus</strong></div></td>
 	<td  width="33" height="20px"><div align="center"><strong>Gross Payable</strong></div></td>
	<?php if($deduct_status == "Yes"){?> 
     <td colspan="4" height="20px"><div align="center"><strong>Deduction</strong></div></td>
	 <?php }else{ ?>
	  <td colspan="2" height="20px"><div align="center"><strong>Deduction</strong></div></td>
	  <?php } ?>  
      <td width="22" height="20px"><div align="center"><strong>Net Payable</strong></div></td>
	 <td  width="180"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
  </tr>
  <tr height="10px">
  <td colspan="14"><div align="center"><strong></strong></div></td>
  <td width="15"><div align="center"><strong>C/L</strong></div></td>
	<td width="15"><div align="center"><strong>S/L</strong></div></td>
	<td width="15"><div align="center"><strong>E/L</strong></div></td>
	<td width="15"><div align="center"><strong>F/L</strong></div></td>
	<td colspan="8"></td>
	
	<td width="37"><div align="center"><strong>Stamp</strong></div></td>
	<td width="22"><div align="center"><strong>Adv.</strong></div></td>
	<?php if($deduct_status == "Yes"){?>
	<td width="37"><div align="center"><strong>Hour</strong></div></td>
	<td width="22"><div align="center"><strong>Amount.</strong></div></td>
	<?php } ?>
	<td width="22"><div align="center"><strong></strong></div></td>
	<td width="180"><div align="center"><strong></strong></div></td>
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
	
	for($p=0; $p<=$per_page_row;$p++)
	{
		echo "<tr height='70' style='text-align:center;' >";
		echo "<td >";
		echo $k+1;
		echo "</td>";
		
		echo "<td>";
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
		print_r ($value[$k]->total_days);
		//echo $row->total_days;
		echo "</td>"; 
		
		echo "<td>";
		print_r ($value[$k]->att_days);
		//echo $row->att_days;
		echo "</td>"; 
				
		echo "<td>";
		print_r ($value[$k]->holiday_or_weeked);
		//echo "ho_day" . $row->holiday_or_weeked;
		echo "</td>"; 
				
		$total_leave = $value[$k]->c_l + $value[$k]->s_l + $value[$k]->e_l;
				
		echo "<td>";
		print_r ($value[$k]->c_l);
		//echo "cl".$row->c_l;
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->s_l);
		//echo "sl".$row->s_l;
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->e_l);
		//echo "el".$row->e_l;
		echo "</td>";
				
		echo "<td>";
		echo 0;
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->absent_days);
		//echo "abs".$row->absent_days;
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->abs_deduction);
		//echo "abs".$row->absent_days;
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->pay_wages);
		//echo "p_W".$row->pay_wages;
		$pay_wages = $pay_wages + $value[$k]->pay_wages;
		$total_pay_wages  = $total_pay_wages  + $value[$k]->pay_wages;
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->ot_hour);
		//echo "ot".$row->ot_hour;
		$ot_hour = $ot_hour + $value[$k]->ot_hour; 
		$total_ot_hours   = $total_ot_hours + $value[$k]->ot_hour; 
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->ot_rate);
		//echo "o_r".$row->ot_rate;
		$ot_rate = $ot_rate + $value[$k]->ot_rate; 
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->ot_amount);
		//echo "o_m".$row->ot_amount;
		$ot_amount = $ot_amount + $value[$k]->ot_amount; 
		$total_ot_amount   = $total_ot_amount + $value[$k]->ot_amount; 
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->att_bonus);
		//echo "a_b".$row->att_bonus;
		$att_bonus = $att_bonus + $value[$k]->att_bonus;
		$total_att_bonus   = $total_att_bonus + $value[$k]->att_bonus; 
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->gross_pay);
		//echo "g_p".$row->gross_pay;
		$gross_pay = $gross_pay + $value[$k]->gross_pay; 
		$total_gross_pays   = $total_gross_pays + $value[$k]->gross_pay; 
		echo "</td>";
		
		echo "<td>";
		//print_r ($value[$k]->others_deduct);
		//echo "st".$row->others_deduct;
		
		if($value[$k]->gross_pay <= $stam_value)
		{
			echo '0';
			$gross_salary = $value[$k]->net_pay; 
			$total_stam_value = $total_stam_value;
		}
		else
		{
			echo $stam_value;
			$gross_salary = $value[$k]->net_pay - $stam_value; 
			$total_stam_value = $total_stam_value + $stam_value;
		}
		$others_deduct = $others_deduct + $value[$k]->others_deduct; 
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->adv_deduct);
		//echo "ad".$row->adv_deduct;
		$adv_deduct = $adv_deduct + $value[$k]->adv_deduct; 
		echo "</td>";
		
		if($deduct_status == "Yes")
		{
			echo "<td>";
			print_r ($value[$k]->deduct_hour);
			echo "</td>";
			
			echo "<td>";
			$deduct_amount = $value[$k]->deduct_amount;
			$deduct_amount = round($deduct_amount,2);
			echo $deduct_amount;
			
			echo "</td>";
			$gross_salary = $gross_salary -$deduct_amount;
		}
				
		echo "<td>";
		echo $gross_salary;
		//echo "<strong>net .$row->net_pay</strong>";
		$net_pay = $net_pay + $gross_salary;
		$total_net_pays   = $total_net_pays + $gross_salary;  
		echo "</td>";
			
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
			
		echo "</tr>"; 
		$k++;
	}
	?>
	<tr>
		<td align="center" colspan="20"><strong>Total Per Page</strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_pay_wages);?></strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_ot_hours);?></strong></td>
		<td></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_ot_amount);?></strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_att_bonus);?></strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_gross_pays);?></strong></td>
		<?php if($deduct_status == "Yes"){?>
		<td colspan="4"></td>
		 <?php }else{ ?>
		 <td colspan="2"></td>
		 <?php } ?>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_net_pays);?></strong></td>
		<td></td>
	</tr>
	<?php
	if($counter == $page)
   		{?>
			<tr height="10">
			<?php if($deduct_status == "Yes"){?>
			<td colspan="30" align="center">
			 <?php }else{ ?>
			 <td colspan="28" align="center">
			 <?php } ?>
			<strong>Grand Total Amount Tk</strong></td>
			<td align="right"><strong><?php echo $english_format_number = number_format($net_pay);?></strong></td>
			<td></td>
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