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
//print_r($values['production']);
$count_section_id = count($values['production']['section_id']);

//$count = 3;
?>

<table border="1" style="border-collapse:collapse; " cellpadding="2" cellspacing="0" >
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
$total_man_power_prod = 0 ;
$total_man_power_prev_prod = 0 ;

$total_gross_sal_prod = 0 ;
$total_gross_sal_prev_prod = 0 ;

$total_net_pay_prod = 0 ;
$total_net_pay_prev_prod = 0 ;

$total_gross_payable_prod = 0 ;

$total_stamp_prod = 0 ;

$total_adv_deduct_prod = 0 ;

$total_diffence_from_prev_prod = 0 ;




for($i = 0; $i<$count_section_id;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values['production']["section_name"][$i]; ?></td>
    <td><?php echo $values['production_prev']["man_power"][$i]; ?></td>
    <td><?php echo $values['production']["man_power"][$i]; ?></td>
    <td><?php echo $values['production_prev']["gross_sal"][$i]; ?></td>
    <td><?php echo $values['production']["gross_sal"][$i]; ?></td>
    <td><?php echo $values['production_prev']["net"][$i]; ?></td>
   <?php $gross_payable = $values['production']["net"][$i]- $values['production']["adv_deduct"][$i];?>
    <td><?php echo $gross_payable; ?></td>
    
    <td><?php echo $values['production']["adv_deduct"][$i]; ?></td>
    <td><?php echo $values['production']["net"][$i]; ?></td>
    <?php $diff_from_prev_month = $values['production_prev']["net"][$i]- $values['production']["net"][$i];?>
    <td><?php echo $diff_from_prev_month; ?></td>
  </tr>
<?php

$total_man_power_prod = $total_man_power_prod + $values['production']["man_power"][$i];
$total_man_power_prev_prod = $total_man_power_prev_prod  + $values['production_prev']["man_power"][$i];

$total_gross_sal_prod = $total_gross_sal_prod + $values['production']["gross_sal"][$i];
$total_gross_sal_prev_prod = $total_gross_sal_prev_prod +  $values['production_prev']["gross_sal"][$i];

$total_net_pay_prod = $total_net_pay_prod + $values['production']["net"][$i];
$total_net_pay_prev_prod = $total_net_pay_prev_prod + $values['production_prev']["net"][$i];

$total_gross_payable_prod = $total_gross_payable_prod  +  $gross_payable;

$total_stamp_prod = $total_stamp_prod  +  $values['production']["stamp_deduct"][$i];

$total_adv_deduct_prod = $total_adv_deduct_prod +  $values['production']["adv_deduct"][$i];

$total_diffence_from_prev_prod = $total_diffence_from_prev_prod + $diff_from_prev_month;	
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
	<td style="text-align:center;">B</td>
    <td width="120" style="text-align:center;">Total Production</td>
    <td><?php echo number_format ($total_man_power_prev_prod); ?></td>
    <td><?php echo number_format ($total_man_power_prod); ?></td>
    <td><?php echo number_format ($total_gross_sal_prev_prod); ?></td>
    <td><?php echo number_format ($total_gross_sal_prod); ?></td>
    <td><?php echo number_format ($total_net_pay_prev_prod); ?></td>
    <td><?php echo number_format ($total_gross_payable_prod); ?></td>
    <td><?php echo number_format ($total_adv_deduct_prod); ?></td>
    <td><?php echo number_format ($total_net_pay_prod); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev_prod); ?></td>
</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;background-color:#d8dcdc; ">
	<td colspan="2" style="text-align:center;">A + B</td>

    <td><?php echo number_format ($total_man_power_prev_prod); ?></td>
    <td><?php echo number_format ($total_man_power_prod); ?></td>
    <td><?php echo number_format ($total_gross_sal_prev_prod); ?></td>
    <td><?php echo number_format ($total_gross_sal_prod); ?></td>
    <td><?php echo number_format ($total_net_pay_prev_prod); ?></td>
    <td><?php echo number_format ($total_gross_payable_prod); ?></td>
    <td><?php echo number_format ($total_adv_deduct_prod); ?></td>
    <td><?php echo number_format ($total_net_pay_prod); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev_prod); ?></td>
</tr>

</table>

</div>
</body>
</html>
