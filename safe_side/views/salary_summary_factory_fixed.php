<?php
if(isset($values['fixed']['sec_name']))
{
	$count_section_id = count($values['fixed']['sec_name']);

}
else
{
	$count_section_id = 0;
}
?>

<!--<table border="1" style="border-collapse:collapse; padding-left:4px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Section Name</td>
<td rowspan="2">Man Power</td>
<td rowspan="2">Gross</td>
<td rowspan="2" width="50">Attn. Bonus</td>


<td colspan="5">Deduction</td>
<td rowspan="2" width="50">Night Amount</td>
<td rowspan="2" width="50">Friday Bonus</td>
<td rowspan="2" width="50">Half Friday Bonus</td>
<td rowspan="2" width="50">Ariar</td>


<td rowspan="2" width="50">Over Time</td>

<td rowspan="2">Net Salary</td>

</tr>

<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td>Abs.</td>
<td>Late</td>
<td>HD</td>
<td>Adv.</td>
<td>Stamp</td>
</tr>
<?php

		$total_man_power = 0;
		$total_gross_sal_cash = 0;
		$total_cash_att_bonus = 0;
		$total_abs_deduction_cash = 0;
		$total_late_deduct_cash = 0;
		$total_hd_ded_cash = 0;
		$total_adv_deduct_cash = 0;
		$total_stamp_deduct_cash = 0;
		$total_night_allowance_cash = 0;
		$total_holiday_allowance_cash = 0;
		$total_half_holiday_allowance_cash = 0;
		$total_ariar =0;
		$total_cash_ot_amount =0;
		$total_cash_net_pay = 0;
		
		
		
		
for($i = 0; $i<$count_section_id;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values['fixed']["sec_name"][$i]; ?></td>
    <td><?php echo $values['fixed']["emp_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["gross_sal_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["cash_att_bonus"][$i]; ?></td>
    <td><?php echo $values['fixed']["abs_deduction_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["late_deduct_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["hd_ded_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["adv_deduct_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["stamp_deduct_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["night_allowance_cash"][$i]; ?></td>
   	<td><?php echo $values['fixed']["holiday_allowance_cash"][$i]; ?></td>
   	<td><?php echo $values['fixed']["half_holiday_allowance_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["ariar"][$i]; ?></td>
    <td><?php echo $values['fixed']["cash_ot_amount"][$i]; ?></td>
   	<td><?php echo $values['fixed']["cash_net_pay"][$i]; ?></td>
    
   
    </tr>
<?php	
		$total_man_power = $total_man_power + $values['fixed']["emp_cash"][$i];
		$total_gross_sal_cash = $total_gross_sal_cash + $values['fixed']["gross_sal_cash"][$i];
		$total_cash_att_bonus = $total_cash_att_bonus + $values['fixed']["cash_att_bonus"][$i];
		$total_abs_deduction_cash = $total_abs_deduction_cash + $values['fixed']["abs_deduction_cash"][$i];
		$total_late_deduct_cash = $total_late_deduct_cash + $values['fixed']["late_deduct_cash"][$i];
		$total_hd_ded_cash = $total_hd_ded_cash +$values['fixed']["hd_ded_cash"][$i];
		$total_adv_deduct_cash = $total_adv_deduct_cash + $values['fixed']["adv_deduct_cash"][$i];
		$total_stamp_deduct_cash = $total_stamp_deduct_cash + $values['fixed']["stamp_deduct_cash"][$i];
		$total_night_allowance_cash = $total_night_allowance_cash + $values['fixed']["night_allowance_cash"][$i];
		$total_holiday_allowance_cash = $total_holiday_allowance_cash + $values['fixed']["holiday_allowance_cash"][$i];
		$total_half_holiday_allowance_cash = $total_half_holiday_allowance_cash + $values['fixed']["half_holiday_allowance_cash"][$i];
		$total_ariar = $total_ariar + $values['fixed']["ariar"][$i];
		$total_cash_ot_amount =$total_cash_ot_amount + $values['fixed']["cash_ot_amount"][$i];
		$total_cash_net_pay = $total_cash_net_pay + $values['fixed']["cash_net_pay"][$i];
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
  	<td colspan="2" style="text-align:center;">Total</td>
    <td><?php echo number_format ($total_man_power); ?></td>
    <td><?php echo number_format ($total_gross_sal_cash); ?></td>
    <td><?php echo number_format ($total_cash_att_bonus); ?></td>
    <td><?php echo number_format ($total_abs_deduction_cash); ?></td>
    <td><?php echo number_format ($total_late_deduct_cash); ?></td>
    <td><?php echo number_format ($total_hd_ded_cash); ?></td>
    <td><?php echo number_format ($total_adv_deduct_cash); ?></td>
    <td><?php echo number_format ($total_stamp_deduct_cash); ?></td>
    <td><?php echo number_format ($total_night_allowance_cash); ?></td>
    <td><?php echo number_format ($total_holiday_allowance_cash); ?></td>
    <td><?php echo number_format ($total_half_holiday_allowance_cash); ?></td>
    <td><?php echo number_format ($total_ariar); ?></td>
    <td><?php echo number_format ($total_cash_ot_amount); ?></td>
    <td><?php echo number_format ($total_cash_net_pay); ?></td>
    
   
   
</tr>

</table> -->
<table border="1" style="border-collapse:collapse; padding-left:4px;padding-right:2px; margin-bottom: 20px" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td >SL.</td>
<td >Section Name</td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>
<td  width="80">Gross Salary of <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td  width="80">Gross Salary of <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>
<td  width="80">Net Pay <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td width="80">Gross Payable <?php echo date ('M-y' ,strtotime ($salary_month) ); ?></td>
<td width="80">Advance Payment <?php echo date ('M-y' ,strtotime ($salary_month) ); ?></td>
<td  width="80">Net Pay <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>
<td  width="80">Difference From Previous Month</td>


</tr>


<?php
$total_man_power = 0 ;
$total_man_power_prev = 0 ;

$total_gross_sal = 0 ;
$total_gross_sal_prev = 0 ;

$total_net_pay = 0 ;
$total_net_pay_prev = 0 ;

$total_gross_payable = 0 ;

$total_stamp = 0 ;

$total_adv_deduct = 0 ;

$total_diffence_from_prev = 0 ;

for($i = 0; $i<$count_section_id;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values['fixed']["section_name"][$i]; ?></td>
    <td><?php echo $values['fixed_prev']["man_power"][$i]; ?></td>
    <td><?php echo $values['fixed']["man_power"][$i]; ?></td>
    <td><?php echo $values['fixed_prev']["gross_sal"][$i]; ?></td>
    <td><?php echo $values['fixed']["gross_sal"][$i]; ?></td>
    <td><?php echo $values['fixed_prev']["net"][$i]; ?></td>
   <?php $gross_payable = $values['fixed']["net"][$i]- $values['fixed']["adv_deduct"][$i];?>
    <td><?php echo $gross_payable; ?></td>
    
    <td><?php echo $values['fixed']["adv_deduct"][$i]; ?></td>
    <td><?php echo $values['fixed']["net"][$i]; ?></td>
    <?php $diff_from_prev_month = $values['fixed_prev']["net"][$i]- $values['fixed']["net"][$i];?>
    <td><?php echo $diff_from_prev_month; ?></td>
  </tr>
<?php

$total_man_power = $total_man_power + $values['fixed']["man_power"][$i];
$total_man_power_prev = $total_man_power_prev  + $values['fixed_prev']["man_power"][$i];

$total_gross_sal = $total_gross_sal + $values['fixed']["gross_sal"][$i];
$total_gross_sal_prev = $total_gross_sal_prev +  $values['fixed_prev']["gross_sal"][$i];

$total_net_pay = $total_net_pay + $values['fixed']["net"][$i];
$total_net_pay_prev = $total_net_pay_prev + $values['fixed_prev']["net"][$i];

$total_gross_payable = $total_gross_payable  +  $gross_payable;

$total_stamp = $total_stamp  +  $values['fixed']["stamp_deduct"][$i];

$total_adv_deduct = $total_adv_deduct +  $values['fixed']["adv_deduct"][$i];

$total_diffence_from_prev = $total_diffence_from_prev + $diff_from_prev_month;	
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
    <td style="text-align:center;">A</td>
    <td width="120" style="text-align:center;">Total Fixed</td>
         <td><?php echo number_format ($total_man_power); ?></td>

     <td><?php echo number_format ($total_man_power); ?></td>
    <td><?php echo number_format ($total_gross_sal_prev); ?></td>
    
    
    <td><?php echo number_format ($total_gross_sal); ?></td>
    <td><?php echo number_format ($total_net_pay_prev); ?></td>
    <td><?php echo number_format ($total_gross_payable); ?></td>
    <td><?php echo number_format ($total_adv_deduct); ?></td>
    <td><?php echo number_format ($total_net_pay); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev); ?></td>

   
   
</tr>

</table>