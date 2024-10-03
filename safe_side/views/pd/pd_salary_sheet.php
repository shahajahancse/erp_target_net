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
?>Salary Sheet For The Month of  
<?php 
$date = $salary_month;
$sal_year=trim(substr($date,0,4));
$sal_month=trim(substr($date,5,2));
$day=trim(substr($date,8,2));
$date_format = date("F-Y", mktime(0, 0, 0, $sal_month, $day, $sal_year));
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
			$pd_amount =0;
			$pd_bonus_percent =0;
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
			$grand_total_advance_salary = 0;
			$grand_total_lunch_deduction_hour = 0;
			$grand_total_lunch_deduction_amount = 0;
			$grand_total_absent_deduction = 0;
			$grand_total_stamp_deduction = 0;
			$grand_total_net_wages_without_ot = 0;
			$grand_total_pd_amount = 0;
			$grand_total_ot_amount = 0;
			$grand_total_pb_amount = 0;
			$grand_total_night_amount = 0;
			$grand_total_friday_amount = 0;
			$grand_total_nw_amount = 0;
			
			$grand_total_info_first 	= 0;
			$grand_total_info_second 	= 0;
			$grand_total_info_third 	= 0;
			$grand_total_info_forth 	= 0;
			$grand_total_info_fifth 	= 0;
			
			?>
			<table >
			
			<?php
for ( $counter = 1; $counter <= $page; $counter ++)
{
?>

<table align="center" height="auto"  class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:12px; width:auto; border-collapse:collapse;">

<tr height="85px">

<?php if($deduct_status == "Yes"){?> 
<td colspan="35" align="center">
<?php }else{ ?>
<td colspan="35" align="center">
<?php } ?>

<div style="text-align:left; position:relative; top:20px; padding-left:10px; font-weight:bold; font-size:14px">
<?php 
$date = date('d-m-Y');
//echo "Payment Date : $date"; 

$section_name = $value[0]->sec_name;
echo "Section : $section_name";
if($floor != "Select")
{
	$floor_name = $this->db->where("posi_id",$floor)->get('pr_emp_position')->row()->posi_name;
	echo "&nbsp;&nbsp;&nbsp;Floor : $floor_name";
}
if($block != "Select")
{
	$block_name = $this->db->where("line_id",$block)->get('pr_line_num')->row()->line_name;
	echo "&nbsp;&nbsp;&nbsp;Block : $block_name";
}
?>
</div>
 
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
    <td colspan="4" width="30" height="20px"><div align="center"><strong>Present Status</strong></div></td>
	<td rowspan="2"><div align="center"><strong>Leave Status</strong></div></td>
    <td rowspan="2" width="25" height="20px"><div align="center"><strong>Pay Days</strong></div></td>
    <td rowspan="2"  width="15" height="20px" style="font-size:10px;"><div align="center"><strong>Attn. Bonus</strong></div></td>
    <td rowspan="2" width="100" height="20px"><div align="center"><strong>Info.</strong></div></td>
    <?php if($deduct_status == "Yes"){?> 
     <td colspan="2" height="20px"><div align="center"><strong>Deduction</strong></div></td>
	 <?php }else{ ?>
	  <td colspan="2" height="20px"><div align="center"><strong>Deduction</strong></div></td>
	  <?php } ?> 
    <!--<td rowspan="2" width="25" height="20px"><div align="center"><strong>Net Wages</strong></div></td>-->
    <td colspan="3" height="20px"><div align="center"><strong>Production</strong></div></td>
    <td colspan="2" height="20px"><div align="center"><strong>Night</strong></div></td>
    <td colspan="2" height="20px"><div align="center"><strong>Friday</strong></div></td>
    <td colspan="2" height="20px"><div align="center"><strong>No Work</strong></div></td>
    <td rowspan="2" width="22" height="20px"><div align="center"><strong>Net Pay Amount</strong></div></td>
	<td rowspan="2"  width="180"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Signature&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
    <td rowspan="2"  width="180"><div align="center"><strong>Remarks</strong></div></td>
  </tr>
  <tr height="10px">
  	<td width="15" style="font-size:8px;"><div align="center"><strong>Work Days</strong></div></td>
	<td width="15" style="font-size:8px;"><div align="center"><strong>Off Days</strong></div></td>
	<td width="15" style="font-size:8px;"><div align="center"><strong>Abs. Days</strong></div></td>
    <td width="15" style="font-size:8px;"><div align="center"><strong>B/A Abs. Days</strong></div></td>
	<td width="22" style="font-size:8px;"><div align="center"><strong>Adv.</strong></div></td>
	<!--<?php if($deduct_status == "Yes"){?>
	<td width="37" style="font-size:8px;"><div align="center"><strong>Hour</strong></div></td>
	<td width="22" style="font-size:8px;"><div align="center"><strong>Amt.</strong></div></td>
	<?php } ?>-->
    <td width="37" style="font-size:8px;"><div align="center"><strong>Stamp</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>P.Amount</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>P.B %</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>P.B</strong></div></td>
    
    <td width="37" style="font-size:8px;"><div align="center"><strong>Day/Rate</strong></div></td>
    <!--<td width="37" style="font-size:8px;"><div align="center"><strong>Rate</strong></div></td>-->
    <td width="37" style="font-size:8px;"><div align="center"><strong>Amount</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Day/Rate</strong></div></td>
   <!-- <td width="37" style="font-size:8px;"><div align="center"><strong>Rate</strong></div></td>-->
    <td width="37" style="font-size:8px;"><div align="center"><strong>Amount</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Day</strong></div></td>
    <td width="37" style="font-size:8px;"><div align="center"><strong>Amount</strong></div></td>
    
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
	$total_pd_amounts   	= 0;
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
	$total_pd_amount_per_page = 0;
	$total_pd_bonus_per_page = 0;
	$total_ot_amount_per_page = 0;
	$total_night_amount_per_page=0;
	$total_friday_amount_per_page = 0;
	$total_nw_amount_per_page = 0;
	
	
	$total_info_first 	= 0;
	$total_info_second 	= 0;
	$total_info_third 	= 0;
	$total_info_forth 	= 0;
	$total_info_fifth 	= 0;
	
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
		print_r ($value[$k]->weeked);
		//echo "ho_day" . $row->holiday_or_weeked;
		echo "</td>"; 
		
		echo "<td>";
		print_r ($value[$k]->absent_days);
		//echo "abs".$row->absent_days;
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->before_after_absent);
		//echo "abs".$row->absent_days;
		echo "</td>";
				
		$total_leave = $value[$k]->c_l;// + $value[$k]->s_l + $value[$k]->e_l + $value[$k]->m_l;
				
		echo "<td>";
		print_r ($value[$k]->c_l);
		//echo "cl".$row->c_l;
		echo "</td>";
			
		/*echo "<td>";
		print_r ($value[$k]->s_l);
		//echo "sl".$row->s_l;
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->holidy);
		//echo "ho_day" . $row->holiday_or_weeked;
		echo "</td>"; 
				
		echo "<td>";
		print_r ($value[$k]->e_l);
		//echo "el".$row->e_l;
		echo "</td>";
				
		echo "<td>";
		print_r ($value[$k]->m_l);
		echo "</td>";*/
		
		echo "<td>";
		print_r ($value[$k]->pay_days);
		echo "</td>";
		
		echo "<td style='font-weight:bold;'>";
		print_r ($value[$k]->att_bonus);
		echo "</td>";
		
		echo "<td style='font-size:10px;'>";
		$sec_name = $value[0]->sec_name;
		$sec_id = $value[$k]->sec_id;
		$emp_id = $value[$k]->emp_id;
		
		$body_id 		= 1;
		$neck_id 		= 2;
		$complet_id 	= 3;
		$remending_id 	= 4;
		$lbs_id 		= 5;
		$moon_id 		= 6;
		$placket_id 	= 7;
		$b_iron_id		=13;
		$b_re_iron_id	=14;
		
		$BODY = $value[$k]->body;
		$NECK = $value[$k]->neck;;
		
		$COMPLET = $value[$k]->complet;
		$PIPING = $value[$k]->piping;
		
		$TACK = $value[$k]->tack;
		$V_NECK = $value[$k]->v_neck;
		$PLACKET = $value[$k]->placket;
		
		$B_Iron = $value[$k]->b_iron;
		$B_Re_Iron = $value[$k]->b_re_iron;
/*		$total_info_first 	= 0;
		$total_info_second 	= 0;
		$total_info_third 	= 0;
		$total_info_forth 	= 0;
		$total_info_fifth 	= 0;
*/		
		if($sec_name == "Knitting")
		{
			//$OTHERS_Neck = $COMPLET+$NECK+$REMENDING+$LBS+$Moon+$PLACKET;
			echo "Body: $BODY<br>Neck:$NECK<br>Pipe.:$PIPING";
			
			$total_info_first 	= $total_info_first + $BODY;
			$total_info_second 	= $total_info_second + $NECK;
			$total_info_third 	= $total_info_third + $PIPING;
			
			$grand_total_info_first 	= $grand_total_info_first + $BODY;
			$grand_total_info_second 	= $grand_total_info_second + $NECK;
			$grand_total_info_third 	= $grand_total_info_third + $PIPING;
		}
		else if($sec_name == "Triming" || $sec_name == "Mending")
		{
			echo "Body: $BODY<br>Tack:$TACK";
			
			$total_info_first 	= $total_info_first + $BODY;
			$total_info_second 	= $total_info_second + $TACK;
			
			$grand_total_info_first 	= $grand_total_info_first + $BODY;
			$grand_total_info_second 	= $grand_total_info_second + $TACK;
			
			
		}
		else if($sec_name == "Linking")
		{
			echo "Body: $BODY<br>Neck:$NECK<br>Comp.:$COMPLET";
			
			$total_info_first 	= $total_info_first + $BODY;
			$total_info_second 	= $total_info_second + $NECK;
			$total_info_third 	= $total_info_third + $COMPLET;
			
			$grand_total_info_first 	= $grand_total_info_first + $BODY;
			$grand_total_info_second 	= $grand_total_info_second + $NECK;
			$grand_total_info_third 	= $grand_total_info_third + $COMPLET;
		}
		else if($sec_name == "Winding")
		{
			echo "V_Neck: $V_NECK";
			$total_info_first 	= $total_info_first + $V_NECK;
			$grand_total_info_first 	= $grand_total_info_first + $V_NECK;
		}
		else if($sec_name == "Iron")
		{
			echo "B.Iron: $B_Iron<br>B.Re Iron: $B_Re_Iron";
			$total_info_first 	= $total_info_first + $B_Iron;
			$total_info_second 	= $total_info_second + $B_Re_Iron;
			
			$grand_total_info_first 	= $grand_total_info_first + $B_Iron;
			$grand_total_info_second 	= $grand_total_info_second + $B_Re_Iron;
		}
		else
		{
			echo "&nbsp;";
		}
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->adv_deduct);
		//echo "ad".$row->adv_deduct;
		$adv_deduct = $adv_deduct + $value[$k]->adv_deduct; 
		$total_advance_per_page = $total_advance_per_page + $value[$k]->adv_deduct;
		$grand_total_advance_salary = $grand_total_advance_salary + $value[$k]->adv_deduct;
		echo "</td>";
		
		$gross_salary = $value[$k]->net_pay;
				
		/*if($deduct_status == "Yes")
		{
			echo "<td>";
			print_r ($value[$k]->deduct_hour);
			$lunch_deduction_hour_per_page 		= $lunch_deduction_hour_per_page + $value[$k]->deduct_hour;
			$grand_total_lunch_deduction_hour 	= $grand_total_lunch_deduction_hour + $value[$k]->deduct_hour;
			echo "</td>";
			
			echo "<td>";
			$deduct_amount = $value[$k]->deduct_amount;
			$deduct_amount = round($deduct_amount,2);
			echo $deduct_amount;
			$lunch_deduction_amount_per_page 	= $lunch_deduction_amount_per_page + $deduct_amount;
			$grand_total_lunch_deduction_amount = $grand_total_lunch_deduction_amount + $deduct_amount;
			echo "</td>";
			$gross_salary = $gross_salary -$deduct_amount;
		}*/
		
		$total_absent_deduction_per_page= 0;//$total_absent_deduction_per_page + $value[$k]->abs_deduction;
		$grand_total_absent_deduction 	= 0;//$grand_total_absent_deduction + $value[$k]->abs_deduction;
			
		$pay_wages 		= $value[$k]->pay_wages; 
		$adv_deduct 	= $value[$k]->adv_deduct;
		$att_bonus 		= $value[$k]->att_bonus;
		$deduct_amount 	= $value[$k]->deduct_amount;
		
		$total_att_bonus = $total_att_bonus + $att_bonus;
		$grand_total_att_bonus = $grand_total_att_bonus + $att_bonus;
		
		
		
		$net_wages_after_deduction = $pay_wages - $adv_deduct - $deduct_amount + $att_bonus;
		
		echo "<td>";
			$stam_value = $value[$k]->stamp;
			echo $stam_value;
			$net_wages_after_deduction = $net_wages_after_deduction - $stam_value; 
			$total_stam_value = $total_stam_value + $stam_value;
		
		$total_net_wages_without_ot_per_page= $total_net_wages_without_ot_per_page +  $net_wages_after_deduction;
		$grand_total_net_wages_without_ot 	= $grand_total_net_wages_without_ot +  $net_wages_after_deduction;
		
		$total_stamp_deduction_per_page = $total_stamp_deduction_per_page + $stam_value;
		$grand_total_stamp_deduction 	= $grand_total_stamp_deduction + $stam_value;

		
		$others_deduct = $others_deduct + $value[$k]->others_deduct; 
		echo "</td>";
			
		/*echo "<td style='font-weight:bold;'>";
		echo $net_wages_after_deduction;
		echo "</td>";*/
		
		$total_net_wages_after_deduction = $total_net_wages_after_deduction + $net_wages_after_deduction;
		$grand_total_net_wages_after_deduction = $grand_total_net_wages_after_deduction + $net_wages_after_deduction;
				
		echo "<td>";
		print_r ($value[$k]->pd_amount);
		//echo '<br>+';
		//echo '<br>';
		//echo $value[$k]->eot_hour;
		//echo '<br>=';
		//echo '<br>';
		$pd_amount = $value[$k]->pd_amount;// +  $value[$k]->epd_amount; 
		echo "</td>";
		
		$total_pd_amount_per_page = $total_pd_amount_per_page + $pd_amount; 
		$grand_total_pd_amount = $grand_total_pd_amount + $pd_amount; 
		
		echo "<td>";
		echo $value[$k]->pd_bonus_percent.'%';
		//echo "o_r".$row->pd_bonus_percent;
		$pd_bonus_percent = $pd_bonus_percent + $value[$k]->pd_bonus_percent; 
		echo "</td>";
		
		$ot_amount = round($pd_amount * $value[$k]->pd_bonus_percent);
				
		echo "<td>";
		print_r ($value[$k]->pd_bonus_amount);
		echo "</td>";
		
		echo "<td>";
		$nigt_rate = $value[$k]->night_allowance_rate;
		print_r ($value[$k]->night_allowance_no);
		echo "<br>($nigt_rate)";
		echo "</td>";
	
		
		echo "<td>";
		print_r ($value[$k]->night_allowance);
		echo "</td>";
		$total_night_amount_per_page = $total_night_amount_per_page + $value[$k]->night_allowance;
		
		$holy_rate = $value[$k]->holiday_allowance_rate;
		echo "<td>";
		print_r ($value[$k]->holiday_allowance_no);
		echo "<br>($holy_rate)";
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->holiday_allowance);
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->none_work_day);
		echo "</td>";
		
		echo "<td>";
		print_r ($value[$k]->none_work_allowance);
		echo "</td>";
		$total_friday_amount_per_page = $total_friday_amount_per_page + $value[$k]->holiday_allowance;
		$total_nw_amount_per_page = $total_nw_amount_per_page+$value[$k]->none_work_allowance;
		$total_ot_amount_per_page = $total_ot_amount_per_page + $ot_amount;
		$total_pd_bonus_per_page = $total_pd_bonus_per_page  + $value[$k]->pd_bonus_amount;
		$grand_total_ot_amount = $grand_total_ot_amount + $ot_amount;
		$grand_total_pb_amount = $grand_total_pb_amount + $value[$k]->pd_bonus_amount;
		$grand_total_night_amount = $grand_total_night_amount + $value[$k]->night_allowance;
		$grand_total_friday_amount = $grand_total_friday_amount + $value[$k]->holiday_allowance;
		$grand_total_nw_amount = $grand_total_nw_amount + $value[$k]->none_work_allowance;
		$ot_amount_only = $ot_amount;
		$net_wages_with_ot = $net_wages_after_deduction + $ot_amount_only;
				
					
		echo "<td style='font-weight:bold;'>";
		//echo $net_wages_with_ot;
		
		echo $value[$k]->net;
		echo "</td>";
		
		$total_net_wages_with_ot = $total_net_wages_with_ot + $value[$k]->net;
		$grand_total_net_wages_with_ot = $grand_total_net_wages_with_ot + $value[$k]->net;
		echo "<td>";
		echo "&nbsp;";
		echo "</td>";
	
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
        <td align="right" style="text-align:center; font-size:10px;">
             
        <?php
		if($sec_name == "Knitting")
		{
			echo "Body: $total_info_first<br>Neck:$total_info_second<br>Pipe.:$total_info_third";
		}
		else if($sec_name == "Triming" || $sec_name == "Mending")
		{
			echo "Body: $total_info_first<br>Tack: $total_info_second";
		}
		else if($sec_name == "Linking")
		{
			echo "Body: $total_info_first<br>Neck:$total_info_second<br>Comp..:$total_info_third";
		}
		else if($sec_name == "Winding")
		{
			echo "V_neck: $total_info_first";
		}
		else if($sec_name == "Iron")
		{
			echo "B.Iron: $total_info_first<br>B.Re Iron:$total_info_second";
		}
		else
		{
			echo "&nbsp;";
		}
		
		?>
        
        </td>
        <td align="center" ><strong><?php echo $english_format_number = number_format($total_advance_per_page);?></strong></td>
		<!--<?php if($deduct_status == "Yes"){?>
		<td align="center"><strong><?php echo $english_format_number = number_format($lunch_deduction_hour_per_page);?></strong></td>
        <td align="right"><strong><?php echo $english_format_number = number_format($lunch_deduction_amount_per_page);?></strong></td>
        <?php }?>-->
        <td align="center"><strong><?php echo $english_format_number = number_format($total_stamp_deduction_per_page);?></strong></td>
		<!-- <td align="right"><strong><?php echo $english_format_number = number_format($total_net_wages_after_deduction);?></strong></td>-->
        <td align="center"><strong><?php echo $english_format_number = number_format($total_pd_amount_per_page);?></strong></td>
        <td align="center" colspan="1"></td>
        <td align="center"><strong><?php echo $english_format_number = number_format($total_pd_bonus_per_page);?></strong></td>
        <td align="center" colspan="1"></td>
        <td align="center"><strong><?php echo $english_format_number = number_format($total_night_amount_per_page);?></strong></td>
        
        <td align="center" colspan="1"></td>
        <td align="center"><strong><?php echo $english_format_number = number_format($total_friday_amount_per_page);?></strong></td>
        
         <td align="center" colspan="1"></td>
        <td align="center"><strong><?php echo $english_format_number = number_format($total_nw_amount_per_page);?></strong></td>

        <td align="center"><strong><?php echo $english_format_number = number_format($total_net_wages_with_ot);?></strong></td>
		<td align="center" colspan="1"></td>
        <td align="center" colspan="1"></td>
	</tr>
	<?php
	if($counter == $page)
   		{?>
			<tr height="10">
			<td colspan="10" align="center"><strong>Grand Total Amount Tk</strong></td>
            <td align="center"><strong><?php echo $english_format_number = number_format($gross_sal);?></strong></td>
            <td colspan="7"></td>
            <td align="center" ><strong><?php echo $english_format_number = number_format($grand_total_att_bonus);?></strong></td>
            <td align="center" style="text-align:center;font-size:10px;">
            
            <?php
			
			if($sec_name == "Knitting")
			{
				echo "Body: $grand_total_info_first<br>Neck:$grand_total_info_second<br>Pipe:$grand_total_info_third";
			}
			else if($sec_name == "Triming" || $sec_name == "Mending")
			{
				echo "Body: $grand_total_info_first<br>Tack: $grand_total_info_second";
			}
			else if($sec_name == "Linking")
			{
				echo "Body: $grand_total_info_first<br>Neck: $grand_total_info_second<br>Comp.: $grand_total_info_third";
			}
			else if($sec_name == "Winding")
			{
				echo "V_neck: $grand_total_info_first";
			}
			else if($sec_name == "Iron")
			{
				echo "B.Iron: $grand_total_info_first<br>B.Re Iron: $grand_total_info_second";
			}			else
			{
				echo "&nbsp;";
			}

			?>
            
            </td>
            <td align="right" ><strong><?php echo $english_format_number = number_format($grand_total_advance_salary);?></strong></td>
            <!--<?php if($deduct_status == "Yes"){?>
			<td align="center" ><strong><?php echo $english_format_number = number_format($grand_total_lunch_deduction_hour);?></strong></td>
            <td align="right" ><strong><?php echo $english_format_number = number_format($grand_total_lunch_deduction_amount);?></strong></td>
			 <?php }?>-->
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_stamp_deduction);?></strong></td>
            <!--<td align="right"><strong><?php echo $english_format_number = number_format($grand_total_net_wages_after_deduction);?></strong></td>-->
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_pd_amount);?></strong></td>
            <td colspan="1"></td>
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_pb_amount);?></strong></td>
            <td align="center" colspan="1"></strong></td>
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_night_amount);?></strong></td>
        	<td align="center" colspan="1"></td>
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_friday_amount);?></strong></td>
            <td align="center" colspan="1"></td>
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_nw_amount);?></strong></td>
            <td align="center"><strong><?php echo $english_format_number = number_format($grand_total_net_wages_with_ot);?></strong></td>
            <td align="center" colspan="1"></td>
        	<td align="center" colspan="1"></td>
			
			</tr>
			<?php } ?>
			
			<table width="100%" height="80px" border="0" align="center" style="margin-bottom:85px; font-family:Arial, Helvetica, sans-serif;">
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
			  
			<?php

		}

?>
</table>

</body>
</html>