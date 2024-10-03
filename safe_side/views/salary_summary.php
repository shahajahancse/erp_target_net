<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Section Wise Total Salary </title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);
$this->load->view('head_english');
$count_section_id = count($values["sec_name"]);

//$count = 3;
?>
<span style="font-size:13px; font-weight:bold;"><?php 
	if($grid_status == 1)
	{ echo 'Reguler'; }
	elseif($grid_status == 2)
	{ echo 'New'; }
	elseif($grid_status == 3)
	{ echo 'Left'; }
	elseif($grid_status == 4)
	{ echo 'Resign'; }
	elseif($grid_status == 6)
	{ echo 'Promoted'; }
	?>  Section Wise Total Salary For The Month of <?php echo $salary_month; ?></span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:4px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Section Name</td>
<td rowspan="2">Man Power</td>
<td rowspan="2">Gross</td>
<td rowspan="2" width="50">Attn. Bonus</td>


<td colspan="3">Deduction</td>
<td rowspan="2" width="50">Friday Bonus</td>
<td rowspan="2" width="50">Night Amount</td>



<td rowspan="2" width="50">Over Time</td>

<td rowspan="2">Net Salary</td>

</tr>

<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td>Abs.</td>
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
		$total_friday_allowance_cash = 0;
		$total_half_friday_allowance_cash = 0;
		$total_ariar =0;
		$total_cash_ot_amount =0;
		$total_cash_net_pay = 0;
		
		
		
		
for($i = 0; $i<$count_section_id;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values["sec_name"][$i]; ?></td>
    <td><?php echo $values["emp_cash"][$i]; ?></td>
    <td><?php echo $values["gross_sal_cash"][$i]; ?></td>
    <td><?php echo $values["cash_att_bonus"][$i]; ?></td>
    <td><?php echo $values["abs_deduction_cash"][$i]; ?></td>
    <td><?php echo $values["adv_deduct_cash"][$i]; ?></td>
    <td><?php echo $values["stamp_deduct_cash"][$i]; ?></td>
    <td><?php echo $values["friday_allowance_cash"][$i]; ?></td>
    <td><?php echo $values["night_allowance_cash"][$i]; ?></td>
    <td><?php echo $values["cash_ot_amount"][$i]; ?></td>
   	<td><?php echo $values["cash_net_pay"][$i]; ?></td>
    
   
    </tr>
<?php	
		$total_man_power = $total_man_power + $values["emp_cash"][$i];
		$total_gross_sal_cash = $total_gross_sal_cash + $values["gross_sal_cash"][$i];
		$total_cash_att_bonus = $total_cash_att_bonus + $values["cash_att_bonus"][$i];
		$total_abs_deduction_cash = $total_abs_deduction_cash + $values["abs_deduction_cash"][$i];
		$total_adv_deduct_cash = $total_adv_deduct_cash + $values["adv_deduct_cash"][$i];
		$total_stamp_deduct_cash = $total_stamp_deduct_cash + $values["stamp_deduct_cash"][$i];
		$total_night_allowance_cash = $total_night_allowance_cash + $values["night_allowance_cash"][$i];
		$total_friday_allowance_cash = $total_friday_allowance_cash + $values["friday_allowance_cash"][$i];
		//$total_half_friday_allowance_cash = $total_half_friday_allowance_cash + $values["half_friday_allowance_cash"][$i];
		$total_cash_ot_amount =$total_cash_ot_amount + $values["cash_ot_amount"][$i];
		$total_cash_net_pay = $total_cash_net_pay + $values["cash_net_pay"][$i];
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
  	<td colspan="2" style="text-align:center;">Total</td>
    <td><?php echo number_format ($total_man_power); ?></td>
    <td><?php echo number_format ($total_gross_sal_cash); ?></td>
    <td><?php echo number_format ($total_cash_att_bonus); ?></td>
    <td><?php echo number_format ($total_abs_deduction_cash); ?></td>
    <td><?php echo number_format ($total_adv_deduct_cash); ?></td>
    <td><?php echo number_format ($total_stamp_deduct_cash); ?></td>
    <td><?php echo number_format ($total_friday_allowance_cash); ?></td>
    <td><?php echo number_format ($total_night_allowance_cash); ?></td>
    <td><?php echo number_format ($total_cash_ot_amount); ?></td>
    <td><?php echo number_format ($total_cash_net_pay); ?></td>
    
   
   
</tr>

</table>
<table style="margin-top:70px; text-transform:uppercase; width:950px;">
<tr height="80%" >
			<td colspan="28"></td>
			</tr>
<tr height="20%">
			<td  align="center" width="100">Prepared By</td>
			<td align="center" width="100">Checked BY</td>
			<td  align="center" width="100">Chief Accounts</td>
			<td  align="center" width="150">General Manager</td>
			<td  align="center" width="100">Director</td>
            <td  align="center" width="100">Director</td>
			</tr>
</table>
</div>
</body>
</html>
