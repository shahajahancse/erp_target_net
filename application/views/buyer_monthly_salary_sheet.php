<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
$newdate = strtotime ( '-1 month' , strtotime ( $start_date ) ) ;
$start_date = date ( 'Y-m-d' , $newdate );


		//$doj_remarks  = "05-2014";
		//echo "$start_date == $end_date";
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
			$grand_total_no_work = 0;
			$grand_total_no_work_amount = 0;
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
// dd($value);
$section_name = $value[0]->sec_name;
$dept_name = $value[0]->dept_name;
// ;
echo "Page No # $counter of $page";

?>
</table>
</div>

<div style="text-align:center; position:relative;padding-left:10px;width:50%; overflow:hidden; float:left; display:block;">

<div style="margin-left: 194px;"><?php $this->load->view("head_banglaa"); ?></div>

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

$date_format_remarks = date("m-Y", mktime(0, 0, 0, $sal_month, $day, $sal_year));
echo $date_format;

?>

</div>
 
</div>

</td>
</tr>


        <tr>
            <td style="text-align:center">মাস</td>
            <td style="text-align:center" colspan="4"><?php echo date('F 	 Y',strtotime($salary_month))?></td>
            <td style="text-align:center"></td>
            <td style="text-align:center"></td>
            <td style="text-align:center" colspan="10">ডিভিশন:<?php  echo " $dept_name"?></td>
            <td style="text-align:center" colspan="13">সেকশন:<?php  echo " $section_name"?></td>

        </tr>

        <tr>
            <td style="text-align:center">ক্রমিক নং</td>
            <td style="text-align:center">নাম <br> পদবী</td>
            <td style="text-align:center">কার্ড নং</td>
            <td style="text-align:center">যোগদানের তারিখ</td>
            <td style="text-align:center">গ্রেড</td>
            <td style="text-align:center">মোট দিবস</td>
            <td style="text-align:center">মোট উপস্থিতি দিন</td>
            <td style="text-align:center">সাপ্তাহিক ছুটি</td>
            <td style="text-align:center">নৈমিত্তিক ছুটি</td>
            <td style="text-align:center">পীড়া-ছুটি</td>
            <td style="text-align:center">বাৎসরিক ছুটি</td>
            <td style="text-align:center">অন্যান্য ছুটি</td>
            <td style="text-align:center">মোট অনুপস্থিত</td>
            <td style="text-align:center">চাকুরীহীন দিন</td>
            <td style="text-align:center">মোট প্রদেয় দিন</td>
           
            <td style="text-align:center">মূল বেতন</td>
            <td style="text-align:center">বাড়ি ভাড়া</td>
            <td style="text-align:center">চিকিৎসা ভাতা</td>
            <td style="text-align:center">যাতায়াত</td>
            <td style="text-align:center">খাদ্য ভাতা</td>
            <td style="text-align:center">মোট বেতন</td>
            <td style="text-align:center">অনুপস্থিত কর্তনকৃত টাকা</td>
            <td style="text-align:center">ওভার টাইম ঘণ্টা</td>
            <td style="text-align:center">হার</td>
            <td style="text-align:center">টাকা</td>
            <td style="text-align:center">হাজিরা বোনাস</td>
            <td style="text-align:center">প্রদত্ত টাকা</td>
            <td style="text-align:center">স্ট্যাম্প</td>
            <td style="text-align:center">মোট প্রদেয় টাকা</td>
            <td style="text-align: center;width: 100px;">স্বাক্ষর</td>
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
	$total_no_work_per_page = 0;
	$total_no_work_amount_per_page = 0;
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
		echo ($value[$k]->emp_full_name).'<br>';
		echo ($value[$k]->desig_name);
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
		echo "</td>";
				
		echo "<td>";
		echo "<span style='font-family:SUtonnyMJ'>".date('d/m/Y',strtotime($value[$k]->emp_join_date))."</span>";
		echo "</td>";

		echo "<td>";
		print_r($value[$k]->gr_name);
		echo "</td>";

		echo "<td>";
		print_r ($value[$k]->total_days);
		echo "</td>"; 


				
		echo "<td>";
		print_r ($value[$k]->att_days);
		echo "</td>"; 
				


		echo "<td>";
		print_r ($value[$k]->weekend);
		echo "</td>";


		echo "<td>";
		print_r ($value[$k]->c_l);
		echo "</td>";


		echo "<td>";
		print_r ($value[$k]->s_l);
		echo "</td>";


		echo "<td>";
		print_r ($value[$k]->e_l);
		echo "</td>";

		echo "<td>";
		print_r ($value[$k]->holiday);
		echo "</td>"; 

		
		echo "<td>";
		print_r ($value[$k]->absent_days);
		echo "</td>"; 

		

				
		echo "<td>";
		print_r (0);
		// $joinDate = new DateTime($value[$k]->emp_join_date);
		// $startOfMonth = new DateTime($joinDate->format('Y-m-01'));
		// $interval = $startOfMonth->diff($joinDate);
		// echo $interval->days;
		echo "</td>"; 	

			
		echo "<td>";
		print_r ($value[$k]->total_days);
		echo "</td>";

			
		echo "<td>";
		print_r ($value[$k]->basic_sal);
		$basic = $basic + $value[$k]->basic_sal;
		echo "</td>";
			
		echo "<td>";
		print_r ($value[$k]->house_r);
		$house_rent = $house_rent + $value[$k]->house_r;
		echo "</td>";
			
		echo "<td>";
		print_r (750);
		$medical_all = $medical_all + $value[$k]->medical_a;
		echo "</td>";

		echo "<td>";
		print_r (450);
		echo "</td>";		
		
		echo "<td>";
		print_r (1250);
		echo "</td>";

		
		echo "<td style='font-weight:bold;'>";
		print_r ($value[$k]->gross_sal);
		$gross_sal = $gross_sal + $value[$k]->gross_sal;
		$total_gross_sal_per_page = $total_gross_sal_per_page + $value[$k]->gross_sal;
		echo "</td>";

		

		echo "<td>";
		print_r ($value[$k]->abs_deduction);
		$total_absent_deduction_per_page= $total_absent_deduction_per_page + $value[$k]->abs_deduction;
		$grand_total_absent_deduction 	= $grand_total_absent_deduction + $value[$k]->abs_deduction;
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->ot_hour);
		echo "</td>";
		echo "<td>";
		print_r ($value[$k]->ot_rate);
		echo "</td>";

		echo "<td>";
		print_r ($value[$k]->ot_amount);
		echo "</td>";

		echo "<td>";
		print_r ($value[$k]->att_bonus);
		echo "</td>";

		echo "<td>";
		print_r ($value[$k]->adv_deduct);
		//echo "ad".$row->adv_deduct;
		$adv_deduct = $adv_deduct + $value[$k]->adv_deduct; 
		$total_advance_per_page = $total_advance_per_page + $value[$k]->adv_deduct;
		$grand_total_advance_salary = $grand_total_advance_salary + $value[$k]->adv_deduct;
		echo "</td>";
		
				
		// echo "<td>";
		// print_r ($value[$k]->holiday);
		// $holiday_allowance_no = $value[$k]->holiday_allowance_no;
		// echo "<br>($holiday_allowance_no)";
		// echo "</td>";
		
		
		// echo "<td style='font-weight:bold;'>";
		// print_r ($value[$k]->att_bonus);
		// echo "</td>";
		$total_att_bonus = $total_att_bonus + $value[$k]->att_bonus;
		$grand_total_att_bonus = $grand_total_att_bonus + $value[$k]->att_bonus;
		
		


		
		
		echo "<td>";
		$stam_value = $value[$k]->stamp;
		echo $stam_value;
		$total_stamp_deduction_per_page = $total_stamp_deduction_per_page + $stam_value;
		$grand_total_stamp_deduction 	= $grand_total_stamp_deduction + $stam_value;
		echo "</td>";
		
		
		
		// echo "<td>";
		// print_r ($value[$k]->friday_allowance_no);
		// echo "</td>";
		
		// echo "<td>";
		// print_r ($value[$k]->friday_allowance_rate);
		// echo "</td>";
		
		// echo "<td>";
		// print_r ($value[$k]->friday_allowance);
		// echo "</td>";
		// $total_friday_amount_per_page = $total_friday_amount_per_page + $value[$k]->friday_allowance;
		// $grand_total_friday_amount_per_page = $grand_total_friday_amount_per_page + $value[$k]->friday_allowance;
		
	
		// echo "<td>";
		// print_r ($value[$k]->night_allowance_no);
		// echo "</td>";
		
		// echo "<td>";
		// print_r ($value[$k]->night_allowance_rate);
		// echo "</td>";
		
		// echo "<td>";
		// print_r ($value[$k]->night_allowance);
		// echo "</td>";
		$total_night_amount_per_page = $total_night_amount_per_page + $value[$k]->night_allowance;
		$grand_total_night_amount_per_page = $grand_total_night_amount_per_page + $value[$k]->night_allowance;
		
		// echo "<td>";
		// print_r ($value[$k]->no_work);
		// $no_work = $value[$k]->no_work;// +  $value[$k]->eot_hour; 
		$no_work = 0; 
		// echo "</td>";
		
		$total_no_work_per_page = $total_no_work_per_page + $no_work; 
		$grand_total_no_work 	= $grand_total_no_work + $no_work; 
		
		/*echo "<td>";
		print_r ($value[$k]->no_work_rate);
		//echo "o_r".$row->ot_rate;
		//$ot_rate = $ot_rate + $value[$k]->no_work_rate; 
		echo "</td>";*/
		
		$no_work_amount = $value[$k]->no_work_amount;
				
		// echo "<td>";
		// echo $no_work_amount;
		// echo "</td>";
		
		$total_no_work_amount_per_page = $total_no_work_amount_per_page + $no_work_amount;
		$grand_total_no_work_amount = $grand_total_no_work_amount + $no_work_amount;
		
		$net_pay = $value[$k]->net_pay;
					
		echo "<td style='font-weight:bold;'>";
		echo $net_pay;
		echo "</td>";
		
		$total_net_wages_with_ot = $total_net_wages_with_ot + $net_pay;
		$grand_total_net_wages_with_ot = $grand_total_net_wages_with_ot + $net_pay;
		
	
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
		
		//echo "$doj_remarks >= $start_date && $doj_remarks <= $end_date";
		// if($doj_remarks >= $start_date && $doj_remarks <= $end_date)
		// {
		// 	//echo $doj_remarks;
		// 	$remarks = "New Join";
		// }
		// else{
		// 	$remarks = " ";
		// }
		
		// echo "<td style='font-weight:bold;'>";
		// echo $remarks;
		// echo "</td>";
			
		echo "</tr>"; 
		$k++;
	}
	?>
	<tr>
		<td align="center" colspan="20"><strong>Total Per Page</strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($total_gross_sal_per_page);?></strong></td>
        <td colspan="7"></td>
		<!-- <td align="right"><strong><?php echo $english_format_number = number_format($total_att_bonus);?></strong></td> -->
		<!-- <td align="right"><strong><?php echo $english_format_number = number_format($total_absent_deduction_per_page);?></strong></td> -->
	
        <!-- <td align="right" ><strong><?php echo $english_format_number = number_format($total_advance_per_page);?></strong></td> -->
        <!-- <td align="right"><strong><?php echo $english_format_number = number_format($total_stamp_deduction_per_page);?></strong></td> -->
       
		 <!-- <td colspan="2"></td>
		 <td align="right"><strong><?php echo $english_format_number = number_format($total_friday_amount_per_page);?></strong></td>
		  <td colspan="2"></td>
		 <td align="right"><strong><?php echo $english_format_number = number_format($total_night_amount_per_page);?></strong></td>
        <td align="center"><strong><?php echo $english_format_number = number_format($total_no_work_per_page);?></strong></td> -->
        <!-- <td align="right"><strong><?php echo $english_format_number = number_format($total_no_work_amount_per_page);?></strong></td> -->
        <td align="right"><strong><?php echo $english_format_number = number_format($total_net_wages_with_ot);?></strong></td>
		
	</tr>
	<?php
	if($counter == $page)
   		{?>
			<td align="center" colspan="20"><strong>Grand Total</strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($gross_sal);?></strong></td>
        <td colspan="7"></td>
		<!-- <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_att_bonus);?></strong></td> -->
		<!-- <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_absent_deduction);?></strong></td> -->
		<!-- <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_advance_salary);?></strong></td> -->
	
      
    



	
		

        <!-- <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_no_work);?></strong></td> -->
        <!-- <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_no_work_amount);?></strong></td> -->
        <td align="right"><strong><?php echo $english_format_number = number_format($grand_total_net_wages_with_ot);?></strong></td>
			
			</tr>
			<?php } ?>
			
			<table width="100%" height="80px" border="0" align="center" style="margin-bottom:80px; font-family:Arial, Helvetica, sans-serif;">
			<tr height="80%" >
			<td colspan="28"></td>
			</tr>
			<tr height="20%">
			<td  align="center">Prepared By</td>
			<td align="center">Checked BY</td>
			<td  align="center">Chief Accounts</td>
			<td  align="center">Production Director</td>
            <td  align="center">Finance Director</td>
			</tr>
			
			</table>
			</table>
			<div style="page-break-after: always;"></div>
			<?php

}

?>
</table>

</body>
</html>