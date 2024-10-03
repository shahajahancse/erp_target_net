<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Monthly Cost Sheet</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);
$this->load->view('head_english');



//$count = 3;
?>
<span style="font-size:13px; font-weight:bold;">Cost Sheet For The Month of <?php echo $month_year; ?></span>

<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold; background:#EEE;">
<td >SL.</td>
<td >Section Name</td>
<td >Manpower of <?php echo date('M', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Manpower of <?php echo date('M', strtotime($values['year_month'])); ?></td>
<td  width="50">Advance Adj. of <?php echo date('M', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Total Salary of <?php echo date('M-Y', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Total Salary of <?php echo date('M-Y', strtotime($values['year_month'])); ?></td>
<td  width="50">Advance Adj. of <?php echo date('M', strtotime($values['year_month'])); ?></td>
<td  width="50">Net Pay  <?php echo date('M-Y', strtotime($values['year_month'])); ?></td>
<td  width="50">Difference From Previous Month</td>

</tr>

<?php
$total_fx_man_power_pm = 0;
$total_fx_man_power = 0;
$total_fx_adv_deduct_pm = 0;
$total_fx_net_pay_pm = 0;
$total_fx_adv_deduct = 0;
$total_fx_net_pay = 0;
$total_fx_net_pay_diff = 0;
 if($values['fx_section_null'] != 0 )  {
	 $count_fx_section_id = count($values['fx_section_id']);
for($i = 0; $i<$count_fx_section_id;$i++)
{
?>

	<tr style="font-size:13px; text-align:right; padding:3px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values["fx_section_name"][$i]; ?></td>
    <td>
	<?php 
	echo $fx_man_power_pm = $values["fx_man_power_pm"][$i]; 
	$total_fx_man_power_pm = $total_fx_man_power_pm + $fx_man_power_pm;
	?>
    </td>
    <td>
	<?php 
	echo $fx_man_power =$values["fx_man_power"][$i]; 
	$total_fx_man_power = $total_fx_man_power+ $fx_man_power;
	?>
    </td>
    <td>
	<?php
	echo $fx_adv_deduct_pm =$values["fx_adv_deduct_pm"][$i]; 
	$total_fx_adv_deduct_pm = $total_fx_adv_deduct_pm + $fx_adv_deduct_pm ;
	?>
    </td>
    <td>
	<?php
	echo $fx_net_pay_pm =$values["fx_net_pay_pm"][$i]; 
	$total_fx_net_pay_pm = $total_fx_net_pay_pm + $fx_net_pay_pm ;
	?>
    </td>
    <td>
	<?php 
	echo $fx_net_pay =$values["fx_net_pay"][$i]; 
	//$total_fx_net_pay = $total_fx_net_pay + $fx_net_pay ;
	?>
    </td>
   	<td>
	<?php
	echo $fx_adv_deduct =$values["fx_adv_deduct"][$i]; 
	$total_fx_adv_deduct = $total_fx_adv_deduct + $fx_adv_deduct ;
	?>
    </td>
    <td>
	<?php 
	echo $fx_net_pay =$values["fx_net_pay"][$i]; 
	$total_fx_net_pay = $total_fx_net_pay + $fx_net_pay ;
	?>
    </td>
    <td>
	<?php 
	echo $fx_net_pay_diff =$values["fx_net_pay"][$i] - $values["fx_net_pay_pm"][$i]; 
	$total_fx_net_pay_diff = $total_fx_net_pay_diff + $fx_net_pay_diff;
	?>
    </td>
    </tr>
<?php	
	}
}


else
{
	echo "Fixed Section Not Exist";
}

?>
<tr style="font-weight:bold; font-size:13px; text-align:right;background:#EEE;">
    <td style="text-align:center"><?php echo "A"; ?></td>
    <td style="text-align:center"><?php echo "Total"; ?></td>
    <td><?php echo number_format ($total_fx_man_power_pm); ?></td>
    <td><?php echo number_format ($total_fx_man_power); ?></td>
    <td><?php echo number_format ($total_fx_adv_deduct_pm ); ?></td>
    <td><?php echo number_format ($total_fx_net_pay_pm); ?></td>
    <td><?php echo number_format ($total_fx_net_pay); ?></td>
    <td><?php echo number_format ($total_fx_adv_deduct); ?></td>
    <td><?php echo number_format ($total_fx_net_pay); ?></td>
    <td><?php echo number_format ($total_fx_net_pay_diff); ?></td>

</tr> 

</table>



<br />
<br />

<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;background:#EEE;">
<td >SL.</td>
<td >Section Name</td>
<td >Manpower of <?php echo date('M', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Manpower of <?php echo date('M', strtotime($values['year_month'])); ?></td>
<td  width="50">Advance Adj. of <?php echo date('M', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Total Salary of <?php echo date('M-Y', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Total Salary of <?php echo date('M-Y', strtotime($values['year_month'])); ?></td>
<td  width="50">Advance Adj. of <?php echo date('M', strtotime($values['year_month'])); ?></td>
<td  width="50">Net Pay  <?php echo date('M-Y', strtotime($values['year_month'])); ?></td>
<td  width="50">Difference From Previous Month</td>

</tr>

<?php
$total_pd_man_power_pm = 0;
$total_pd_man_power = 0;
$total_pd_adv_deduct_pm = 0;
$total_pd_net_pay_pm = 0;
$total_pd_adv_deduct = 0;
$total_pd_net_pay = 0;
$total_pd_net_pay_diff = 0;
$total_pd_amount = 0;
$total_pd_amount_pm = 0;
if($values['pd_section_null'] != 0 )  {
$count_pd_section_id = count($values["pd_section_id"]);	

for($i = 0; $i<$count_pd_section_id;$i++)
{
?>

	<tr style="font-size:13px; text-align:right; padding:3px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values["pd_section_name"][$i]; ?></td>
    <td>
	<?php 
	echo $pd_man_power_pm = $values["pd_man_power_pm"][$i]; 
	$total_pd_man_power_pm = $total_pd_man_power_pm + $pd_man_power_pm;
	?>
    </td>
    <td>
	<?php 
	echo $pd_man_power =$values["pd_man_power"][$i]; 
	$total_pd_man_power = $total_pd_man_power+ $pd_man_power;
	?>
    </td>
    <td>
	<?php
	echo $pd_adv_deduct_pm =$values["pd_adv_deduct_pm"][$i]; 
	$total_pd_adv_deduct_pm = $total_pd_adv_deduct_pm + $pd_adv_deduct_pm ;
	?>
    </td>
    <td>
	<?php
	echo $pd_net_pay_pm =$values["pd_net_pay_pm"][$i]; 
	$total_pd_net_pay_pm = $total_pd_net_pay_pm + $pd_net_pay_pm ;
	?>
    </td>
    <td>
	<?php 
	echo $pd_net_pay =$values["pd_net_pay"][$i]; 
	$total_pd_net_pay = $total_pd_net_pay + $pd_net_pay ;
	?>
    </td>
   	<td>
	<?php
	echo $pd_adv_deduct =$values["pd_adv_deduct"][$i]; 
	$total_pd_adv_deduct = $total_pd_adv_deduct + $pd_adv_deduct ;
	?>
    </td>
    <td>
	<?php 
	echo $pd_net_pay =$values["pd_net_pay"][$i]; 
	//$total_pd_net_pay = $total_pd_net_pay + $pd_net_pay ;
	?>
    </td>
    <td>
	<?php 
	echo $pd_net_pay_diff =$values["pd_net_pay"][$i] - $values["pd_net_pay_pm"][$i]; 
	$total_pd_net_pay_diff = $total_pd_net_pay_diff + $pd_net_pay_diff;
	
	$total_pd_amount = $total_pd_amount + $values["pd_amount"][$i];
	$total_pd_amount_pm = $total_pd_amount_pm + $values["pd_amount_pm"][$i];
	?>
    </td>
    </tr>
<?php	
	}
}

else
{
	echo "Production Section Not Exist";
}

?>
<tr style="font-weight:bold; font-size:13px; text-align:right;background:#EEE;">
    <td style="text-align:center"><?php echo "B"; ?></td>
    <td style="text-align:center"><?php echo "Total"; ?></td>
    <td><?php echo number_format ($total_pd_man_power_pm); ?></td>
    <td><?php echo number_format ($total_pd_man_power); ?></td>
    <td><?php echo number_format ($total_pd_adv_deduct_pm ); ?></td>
    <td><?php echo number_format ($total_pd_net_pay_pm); ?></td>
    <td><?php echo number_format ($total_pd_net_pay); ?></td>
    <td><?php echo number_format ($total_pd_adv_deduct); ?></td>
    <td><?php echo number_format ($total_pd_net_pay); ?></td>
    <td><?php echo number_format ($total_pd_net_pay_diff); ?></td>

</tr>  

</table>

<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;background:#EEE;">
<td >SL.</td>
<td >Section Name</td>
<td >Manpower of <?php echo date('M', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Manpower of <?php echo date('M', strtotime($values['year_month'])); ?></td>
<td  width="50">Advance Adj. of <?php echo date('M', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Total Salary of <?php echo date('M-Y', strtotime($values['prev_year_month'])); ?></td>
<td  width="50">Total Salary of <?php echo date('M-Y', strtotime($values['year_month'])); ?></td>
<td  width="50">Advance Adj. of <?php echo date('M', strtotime($values['year_month'])); ?></td>
<td  width="50">Net Pay  <?php echo date('M-Y', strtotime($values['year_month'])); ?></td>
<td  width="50">Difference From Previous Month</td>

</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
<td style="text-align:center">A</td>
<td style="text-align:center">Fixed</td>
<td><?php echo number_format ($total_fx_man_power_pm); ?></td>
    <td><?php echo number_format ($total_fx_man_power); ?></td>
    <td><?php echo number_format ($total_fx_adv_deduct_pm ); ?></td>
    <td><?php echo number_format ($total_fx_net_pay_pm); ?></td>
    <td><?php echo number_format ($total_fx_net_pay); ?></td>
    <td><?php echo number_format ($total_fx_adv_deduct); ?></td>
    <td><?php echo number_format ($total_fx_net_pay); ?></td>
    <td><?php echo number_format ($total_fx_net_pay_diff); ?></td>
</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
<td style="text-align:center">B</td>
<td style="text-align:center">Production</td>
 <td><?php echo number_format ($total_pd_man_power_pm); ?></td>
    <td><?php echo number_format ($total_pd_man_power); ?></td>
    <td><?php echo number_format ($total_pd_adv_deduct_pm ); ?></td>
    <td><?php echo number_format ($total_pd_net_pay_pm); ?></td>
    <td><?php echo number_format ($total_pd_net_pay); ?></td>
    <td><?php echo number_format ($total_pd_adv_deduct); ?></td>
    <td><?php echo number_format ($total_pd_net_pay); ?></td>
    <td><?php echo number_format ($total_pd_net_pay_diff); ?></td>
</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;background:#EEE;">
    <td style="text-align:center">&nbsp;</td>
    <td style="text-align:center"><?php echo "Total"; ?></td>
    <td><?php echo number_format ($total_pd_man_power_pm + $total_fx_man_power_pm); ?></td>
    <td><?php echo number_format ($total_pd_man_power + $total_fx_man_power); ?></td>
    <td><?php echo number_format ($total_pd_adv_deduct_pm + $total_fx_adv_deduct_pm); ?></td>
    <td><?php echo number_format ($total_pd_net_pay_pm +$total_fx_net_pay_pm); ?></td>
    <td><?php echo number_format ($total_pd_net_pay + $total_fx_net_pay); ?></td>
    <td><?php echo number_format ($total_pd_adv_deduct + $total_fx_adv_deduct); ?></td>
    <td><?php echo number_format ($total_pd_net_pay + $total_fx_net_pay); ?></td>
    <td><?php echo number_format ($total_pd_net_pay_diff + $total_fx_net_pay_diff); ?></td>

</tr> 
</table>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px; font-size:14px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center;">
<td>Production Quantity</td><td><?php echo date('M-Y', strtotime($values['prev_year_month'])); ?></td> <td><?php echo number_format ($total_pd_amount_pm); ?></td></tr>
<tr>
<td>Production Quantity</td><td><?php echo date('M-Y', strtotime($values['year_month'])); ?></td><td><?php echo number_format ($total_pd_amount); ?></td>
</tr>
</table>
<table style="margin-top:70px; text-transform:uppercase;">
<tr>
<td  width="200">Prepared By</td><td width="300">Chief Accountant</td><td width="200">A.G.M</td><td width="200"> Production Director</td>
</tr>
</table>
</div>
</body>
</html>
