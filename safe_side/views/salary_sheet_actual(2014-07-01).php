<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?php 
	if($grid_status == 1)
	{ echo 'Reguler Employee '; }
	elseif($grid_status == 2)
	{ echo 'New Employee '; }
	elseif($grid_status == 3)
	{ echo 'Left Employee '; }
	elseif($grid_status == 4)
	{ echo 'Resign Employee '; }
	elseif($grid_status == 6)
	{ echo 'Promoted Employee '; }
?>Monthly Salary Sheet of 
<?php 
$date = $salary_month;
$year=trim(substr($date,0,4));
$month=trim(substr($date,5,2));
$day=trim(substr($date,8,2));
$date_format = date("F-Y", mktime(0, 0, 0, $month, $day, $year));
echo $date_format;

?>

</title>
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
			$grand_total_att_bonus =0;
			$grand_total_net_wages_after_deduction = 0;
			$grand_total_net_wages_with_ot = 0;
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
			
			$total_stam_value = 0;
			$grand_total_advance_salary = 0;
			$grand_total_lunch_deduction_hour = 0;
			$grand_total_lunch_deduction_amount = 0;
			$grand_total_absent_deduction = 0;
			$grand_total_stamp_deduction = 0;
			$grand_total_net_wages_without_ot = 0;
			$grand_total_ot_hour = 0;
			$grand_total_ot_amount = 0;
			$grand_total_late_deduction 	= 0;
			$grand_total_hd_deduction 	= 0;
			$grand_total_night_amount_per_page = 0;
			$grand_total_holiday_amount_per_page = 0;
			$grand_total_ariar_amount_per_page = 0;
			$grand_total_half_holiday_amount_per_page = 0;
			$grand_total_friday_amount_per_page = 0;

			
			
			?>
			<table >
			
			<?php
for ( $counter = 1; $counter <= $page; $counter ++)
{
?>

<table align="center"  height="auto"  class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:12px; width:auto;">

<tr height="85px">

<td colspan="37" align="center">

<div style="width:100%">

<div style="text-align:left; position:relative;padding-left:10px;width:20%; float:left; font-weight:bold">
<table>
<?php 
$date = date('d-m-Y');
//echo "Payment Date : $date"; 

$section_name = $value[0]->sec_name;
echo "Section : $section_name<br>";
echo "Page No # $counter of $page";

?>
</table>
</div>

<div style="text-align:center; position:relative;padding-left:10px;width:50%; overflow:hidden; float:left; display:block;">

<?php $this->load->view("head_english"); ?>
<?php 
	if($grid_status == 1)
	{ echo 'Reguler Employee '; }
	elseif($grid_status == 2)
	{ echo 'New Employee '; }
	elseif($grid_status == 3)
	{ echo 'Left Employee '; }
	elseif($grid_status == 4)
	{ echo 'Resign Employee '; }
	elseif($grid_status == 6)
	{ echo 'Promoted Employee '; }
?>Salary Sheet For The Month of  
<?php 
$date = $salary_month;
$sal_year=trim(substr($date,0,4));
$sal_month=trim(substr($date,5,2));
$day=trim(substr($date,8,2));
$date_format = date("F-Y", mktime(0, 0, 0, $sal_month, $day, $sal_year));
echo $date_format;

?>

</div>
 
</div>

</td>
</tr>


  <tr height="20px">
    <td rowspan="2"  width="15" height="20px"><div align="center"><strong>SI. No</strong></div></td>
    <td rowspan="2" width="30" height="20px"><div align="center"><strong>Name of Employee</strong></div></td>
	<td rowspan="2" width="14" height="20px"><div align="center"><strong>Card No</strong></div></td>
    <td rowspan="2" width="25" height="20px"><div align="center"><strong>Designation</strong></div></td>
	 <td rowspan="2" width="25" height="20px"><div align="center"><strong>Section</strong></div></td>
    <td rowspan="2" width="25" height="20px"><div align="center"><strong>Joining Date</strong></div></td>
	<td rowspan="2" width="25" height="20px"><div align="center"><strong>Grade</strong></div></td>
    <td rowspan="2" width="20" height="20px"> <div align="center"><strong>Basic</strong></div></td>
    <td rowspan="2" width="17" height="20px"><div align="center"><strong>H/Rent</strong></div></td>
    <td rowspan="2" width="15" height="20px"><div align="center"><strong>Medical</strong></div></td>
    <td rowspan="2" width="35" height="20px"><div align="center"><strong>Gross Salary</strong></div></td>
    <td rowspan="2" width="31" height="20px"><div align="center"><strong>Day of Month</strong></div></td>
    <td colspan="5" width="30" height="20px"><div align="center"><strong>Present Status</strong></div></td>
    <td rowspan="2" width="25" height="20px"><div align="center"><strong>Pay Days</strong></div></td>
    <td rowspan="2"  width="15" height="20px" style="font-size:10px;"><div align="center"><strong>Attn. Bonus</strong></div></td>
    <td colspan="3" height="20px"><div align="center"><strong>Deduction</strong></div></td>
    <td colspan="3" ><div align="center"><strong>Extra Friday</strong></div></td>
    <td colspan="3" ><div align="center"><strong>Night</strong></div></td>
    
    <td colspan="3" height="20px"><div align="center"><strong>Over Time Status</strong></div></td>
    <td rowspan="2" width="22" height="20px"><div align="center"><strong>Net Pay Amount</strong></div></td>
	<td rowspan="2"  width="180"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
  </tr>
  <tr height="10px">
  	<td width="15" style="font-size:8px;"><div align="center"><strong>Attn. Days</strong></div></td>
	<td width="15" style="font-size:8px;"><div align="center"><strong>Abs. Days</strong></div></td>
  	<td width="15" style="font-size:8px;"><div align="center"><strong>Weekend</strong></div></td>
  	<td width="15" style="font-size:8px;"><div align="center"><strong>Holiday</strong></div></td>
  	<td width="15" style="font-size:8px;"><div align="center"><strong>Leave</strong></div></td>

	<td width="22" style="font-size:8px;"><div align="center"><strong>Abs.</strong></div></td>
	<td width="22" style="font-size:8px;"><div align="center"><strong>Adv.</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Stamp</strong></div></td>
    
    <td width="37" style="font-size:8px;"><div align="center"><strong>Day</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Rate</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Amount</strong></div></td>
    
    <td width="37" style="font-size:8px;"><div align="center"><strong>Day</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Rate</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Amount</strong></div></td>
   
    
    
    
    
    <td width="37" style="font-size:8px;"><div align="center"><strong>OT Hrs</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>OT Rate</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>OT Amt</strong></div></td>
    
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
	$total_net_wages_after_deduction = 0;
	$total_net_wages_with_ot = 0;
	
	$total_gross_sal_per_page = 0;
	$total_advance_per_page = 0;
	$lunch_deduction_hour_per_page = 0;
	$lunch_deduction_amount_per_page = 0;
	$total_absent_deduction_per_page = 0;
	$total_stamp_deduction_per_page = 0;
	$total_net_wages_without_ot_per_page = 0;
	$total_ot_hour_per_page = 0;
	$total_ot_amount_per_page = 0;
	$total_late_deduction_per_page= 0;
	$total_hd_deduction_per_page= 0;
	$total_night_amount_per_page = 0;
	$total_holiday_amount_per_page = 0;
	$total_ariar_amount_per_page = 0;
	$total_half_holiday_amount_per_page = 0;
	$total_friday_amount_per_page = 0;
	
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
		elseif($grid_status == 3)
		{
			$left_date = $this->grid_model->get_left_date_by_empid($value[$k]->emp_id);
			if($left_date != false){
			echo $left_date = date('d-M-y', strtotime($left_date));}
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
				 
		echo "<td style='font-weight:bold;'>";
		print_r ($value[$k]->gross_sal);
		//echo "<strong>$row->gross_sal</strong>";
		$gross_sal = $gross_sal + $value[$k]->gross_sal;
		$total_gross_sal_per_page = $total_gross_sal_per_page + $value[$k]->gross_sal;
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
		print_r ($value[$k]->absent_days);
		//echo "ho_day" . $row->holiday_or_weeked;
		echo "</td>"; 
		
		
		
		echo "<td>";
		print_r ($value[$k]->weekend);
		$friday = $value[$k]->friday;
		echo "<br>($friday)";
		echo "</td>";
				
				
		echo "<td>";
		print_r ($value[$k]->holiday);
		$holiday_allowance_no = $value[$k]->holiday_allowance_no;
		echo "<br>($holiday_allowance_no)";
		//echo "cl".$row->c_l;
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->c_l);
		echo "</td>";
			
		
		
		echo "<td>";
		print_r ($value[$k]->pay_days);
		echo "</td>";
		
		echo "<td style='font-weight:bold;'>";
		print_r ($value[$k]->att_bonus);
		echo "</td>";
		$total_att_bonus = $total_att_bonus + $value[$k]->att_bonus;
		$grand_total_att_bonus = $grand_total_att_bonus + $value[$k]->att_bonus;
		
		
		echo "<td>";
		print_r ($value[$k]->abs_deduction);
		$total_absent_deduction_per_page= $total_absent_deduction_per_page + $value[$k]->abs_deduction;
		$grand_total_absent_deduction 	= $grand_total_absent_deduction + $value[$k]->abs_deduction;
		echo "</td>";

		echo "<td>";
		print_r ($value[$k]->adv_deduct);
		//echo "ad".$row->adv_deduct;
		$adv_deduct = $adv_deduct + $value[$k]->adv_deduct; 
		$total_advance_per_page = $total_advance_per_page + $value[$k]->adv_deduct;
		$grand_total_advance_salary = $grand_total_advance_salary + $value[$k]->adv_deduct;
		echo "</td>";
		
		
		echo "<td>";
		$stam_value = $value[$k]->stamp;
		echo $stam_value;
		$total_stamp_deduction_per_page = $total_stamp_deduction_per_page + $stam_value;
		$grand_total_stamp_deduction 	= $grand_total_stamp_deduction + $stam_value;
		echo "</td>";
		
		
		
		echo "<td>";
		print_r ($value[$k]->friday_allowance_no);
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->friday_allowance_rate);
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->friday_allowance);
		echo "</td>";
		$total_friday_amount_per_page = $total_friday_amount_per_page + $value[$k]->friday_allowance;
		$grand_total_friday_amount_per_page = $grand_total_friday_amount_per_page + $value[$k]->friday_allowance;
		
	
		
		
		
		echo "<td>";
		print_r ($value[$k]->night_allowance_no);
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->night_allowance_rate);
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->night_allowance);
		echo "</td>";
		$total_night_amount_per_page = $total_night_amount_per_page + $value[$k]->night_allowance;
		$grand_total_night_amount_per_page = $grand_total_night_amount_per_page + $value[$k]->night_allowance;
		
		
		

		
		
			
		
		echo "<td>";
		print_r ($value[$k]->ot_hour);
		$ot_hour = $value[$k]->ot_hour;// +  $value[$k]->eot_hour; 
		echo "</td>";
		
		$total_ot_hour_per_page = $total_ot_hour_per_page + $ot_hour; 
		$grand_total_ot_hour = $grand_total_ot_hour + $ot_hour; 
		
		echo "<td>";
		print_r ($value[$k]->ot_rate);
		//echo "o_r".$row->ot_rate;
		$ot_rate = $ot_rate + $value[$k]->ot_rate; 
		echo "</td>";
		
		$ot_amount = round($ot_hour * $value[$k]->ot_rate);
				
		echo "<td>";
		echo $ot_amount;
		echo "</td>";
		
		$total_ot_amount_per_page = $total_ot_amount_per_page + $ot_amount;
		$grand_total_ot_amount = $grand_total_ot_amount + $ot_amount;
		
		$net_pay = $value[$k]->net_pay;
					
		echo "<td style='font-weight:bold;'>";
		echo $net_pay;
		echo "</td>";
		
		$total_net_wages_with_ot = $total_net_wages_with_ot + $net_pay;
		$grand_total_net_wages_with_ot = $grand_total_net_wages_with_ot + $net_pay;
		
		
			
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
			
		echo "</tr>"; 
		$k++;
	}
	?>
	<tr>
		<td align="center" colspan="10"><strong>Total Per Page</strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($total_gross_sal_per_page);?></strong></td>
        <td colspan="7"></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_att_bonus);?></strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($total_absent_deduction_per_page);?></strong></td>
	
        <td align="right" ><strong><?php echo $english_format_number = number_format($total_advance_per_page);?></strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($total_stamp_deduction_per_page);?></strong></td>
       
		 <td colspan="2"></td>
		 <td align="right"><strong><?php echo $english_format_number = number_format($total_friday_amount_per_page);?></strong></td>
		  <td colspan="2"></td>
		 <td align="right"><strong><?php echo $english_format_number = number_format($total_night_amount_per_page);?></strong></td>
        <td align="center"><strong><?php echo $english_format_number = number_format($total_ot_hour_per_page);?></strong></td>
        <td align="right" colspan="1"></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($total_ot_amount_per_page);?></strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($total_net_wages_with_ot);?></strong></td>
		
	</tr>
	<?php
	if($counter == $page)
   		{?>
			<td align="center" colspan="10"><strong>Grand Total</strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($gross_sal);?></strong></td>
        <td colspan="7"></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($grand_total_att_bonus);?></strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($grand_total_absent_deduction);?></strong></td>
		<td align="right"><strong><?php echo $english_format_number = number_format($grand_total_advance_salary);?></strong></td>
	
      
        <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_stamp_deduction);?></strong></td>
         <td colspan="2"></td>
		 <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_friday_amount_per_page);?></strong></td>
        <td colspan="2"></td>
		 <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_night_amount_per_page);?></strong></td>
		

        <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_ot_hour);?></strong></td>
        <td align="right" colspan="1"></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_ot_hour);?></strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_net_wages_with_ot);?></strong></td>
			
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