<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Section Wise Total Salary </title>
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);
$this->load->view('head_english');

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
	?>  Factory Salary Summary For The Month of <?php echo " ".date ('M-y' ,strtotime ($salary_month) ); ?></span>
<br />
<br />

<?php


//$this->load->view('salary_summary_factory_fixed');
//$this->load->view('salary_summary_factory_production');
if(isset($values['fixed']['sec_name']))
{
	$count_section_id = count($values['fixed']['sec_name']);

}
else
{
	$count_section_id = 0;
}
//echo "====".$count_section_id ;

if(isset($values['production']['section_id']))
{
	$count_section_id_prod = count($values['production']['section_id']);


}
else
{
	$count_section_id_prod = 0;
}

?>
<table border="1" style="border-collapse:collapse; margin-bottom: 30px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td >SL.</td>
<td >Section Name</td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>

<td  width="80">Net Pay <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td width="80">Gross Payable <?php echo date ('M-y' ,strtotime ($salary_month) ); ?></td>
<td width="80">Advance Payment <?php echo date ('M-y' ,strtotime ($salary_month) ); ?></td>
<td  width="80">Net Pay <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>
<td  width="80">Difference From Previous Month</td>


</tr>


<?php
$total_man_power = 0;
$total_man_power_prev = 0;

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
	//echo "===".$values['fixed']["man_power"][$i];
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values['fixed']["sec_name"][$i]; ?></td>
    <?php
    
    $fixed_prev_employee = $values['fixed_prev']["emp_cash_bank"][$i];
    if(!isset($fixed_prev_employee))  
    {
		$fixed_prev_employee = 0;
	}  
	
	$fixed_prev_gross_sal_cash = $values['fixed_prev']["gross_sal_cash"][$i];
    if(!isset($fixed_prev_gross_sal_cash))  
    {
		$fixed_prev_gross_sal_cash = 0;
	}
	
	$fixed_prev_cash_net_pay = $values['fixed_prev']["cash_net_pay"][$i];
    if(!isset($fixed_prev_cash_net_pay))  
    {
		$fixed_prev_cash_net_pay = 0;
	}
    ?>
    <td><?php echo $fixed_prev_employee; ?></td>
    
    
    
    <td><?php echo $values['fixed']["emp_cash_bank"][$i]; ?></td>
    
    <td><?php echo $fixed_prev_cash_net_pay; ?></td>
   <?php $gross_payable = $values['fixed']["cash_net_pay"][$i]- $values['fixed']["adv_deduct_cash"][$i];?>
    <td><?php echo $gross_payable; ?></td>
    
    <td><?php echo $values['fixed']["adv_deduct_cash"][$i]; ?></td>
    <td><?php echo $values['fixed']["cash_net_pay"][$i]; ?></td>
    <?php $diff_from_prev_month = $fixed_prev_cash_net_pay- $values['fixed']["cash_net_pay"][$i];?>
    <td><?php echo $diff_from_prev_month; ?></td>
  </tr>
<?php

$total_man_power = $total_man_power + $values['fixed']["emp_cash_bank"][$i];
$total_man_power_prev = $total_man_power_prev  + $fixed_prev_employee;

$total_gross_sal = $total_gross_sal + $values['fixed']["gross_sal_cash"][$i];
$total_gross_sal_prev = $total_gross_sal_prev +  $fixed_prev_gross_sal_cash;

$total_net_pay = $total_net_pay + $values['fixed']["cash_net_pay"][$i];
$total_net_pay_prev = $total_net_pay_prev + $fixed_prev_cash_net_pay;

$total_gross_payable = $total_gross_payable  +  $gross_payable;

//$total_stamp = $total_stamp  +  $values['fixed']["stamp_deduct"][$i];

$total_adv_deduct = $total_adv_deduct +  $values['fixed']["adv_deduct_cash"][$i];

$total_diffence_from_prev = $total_diffence_from_prev + $diff_from_prev_month;	
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
    <td style="text-align:center;">A</td>
    <td width="120" style="text-align:center;">Total Fixed</td>
    <td><?php echo number_format ($total_man_power_prev); ?></td>
    <td><?php echo number_format ($total_man_power); ?></td>
    
    <td><?php echo number_format ($total_net_pay_prev); ?></td>
    <td><?php echo number_format ($total_gross_payable); ?></td>
    <td><?php echo number_format ($total_adv_deduct); ?></td>
    <td><?php echo number_format ($total_net_pay); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev); ?></td>
</tr>

</table>
<table border="1" style="border-collapse:collapse;margin-bottom: 30px; " cellpadding="2" cellspacing="2" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td >SL.</td>
<td >Section Name</td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>

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




for($i = 0; $i<$count_section_id_prod;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values['production']["section_name"][$i]; ?></td>
    <td><?php echo $values['production_prev']["man_power"][$i]; ?></td>
    <td><?php echo $values['production']["man_power"][$i]; ?></td>

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

    <td><?php echo number_format ($total_net_pay_prev_prod); ?></td>
    <td><?php echo number_format ($total_gross_payable_prod); ?></td>
    <td><?php echo number_format ($total_adv_deduct_prod); ?></td>
    <td><?php echo number_format ($total_net_pay_prod); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev_prod); ?></td>
</tr>
<!--<tr style="font-weight:bold; font-size:13px; text-align:right;background-color:#d8dcdc; ">
	<td colspan="2" style="text-align:center;">A + B</td>

    <td><?php echo number_format ($total_man_power_prev_prod + $total_man_power_prev ); ?></td>
    <td><?php echo number_format ($total_man_power_prod + $total_man_power); ?></td>
    <td><?php echo number_format ($total_gross_sal_prev_prod + $total_gross_sal_prev); ?></td>
    <td><?php echo number_format ($total_gross_sal_prod + $total_gross_sal); ?></td>
    <td><?php echo number_format ($total_net_pay_prev_prod + $total_net_pay_prev); ?></td>
    <td><?php echo number_format ($total_gross_payable_prod + $total_gross_payable); ?></td>
    <td><?php echo number_format ($total_adv_deduct_prod + $total_adv_deduct); ?></td>
    <td><?php echo number_format ($total_net_pay_prod + $total_net_pay); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev_prod + $total_diffence_from_prev); ?></td>
</tr>-->

</table>



<table border="1" style="border-collapse:collapse; margin-bottom: 20px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td >SL.</td>
<td >Section Name</td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td  width="80">Man Power of <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>

<td  width="80">Net Pay <?php echo date ('M-y' ,strtotime ($prev_salary_month) ); ?> </td>
<td width="80">Gross Payable <?php echo date ('M-y' ,strtotime ($salary_month) ); ?></td>
<td width="80">Advance Payment <?php echo date ('M-y' ,strtotime ($salary_month) ); ?></td>
<td  width="80">Net Pay <?php echo date ('M-y' ,strtotime ($salary_month) ); ?> </td>
<td  width="80">Difference From Previous Month</td>
</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
    <td style="text-align:center;">A</td>
    <td width="120" style="text-align:center;">Total Fixed</td>
    <td><?php echo number_format ($total_man_power_prev); ?></td>
    <td><?php echo number_format ($total_man_power); ?></td>

    <td><?php echo number_format ($total_net_pay_prev); ?></td>
    <td><?php echo number_format ($total_gross_payable); ?></td>
    <td><?php echo number_format ($total_adv_deduct); ?></td>
    <td><?php echo number_format ($total_net_pay); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev); ?></td>
</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
	<td style="text-align:center;">B</td>
    <td width="120" style="text-align:center;">Total Production</td>
    <td><?php echo number_format ($total_man_power_prev_prod); ?></td>
    <td><?php echo number_format ($total_man_power_prod); ?></td>

    <td><?php echo number_format ($total_net_pay_prev_prod); ?></td>
    <td><?php echo number_format ($total_gross_payable_prod); ?></td>
    <td><?php echo number_format ($total_adv_deduct_prod); ?></td>
    <td><?php echo number_format ($total_net_pay_prod); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev_prod); ?></td>
</tr>
<tr style="font-weight:bold; font-size:13px; text-align:right;background-color:#d8dcdc; ">
	<td colspan="2" style="text-align:center;">A + B</td>

    <td><?php echo number_format ($total_man_power_prev_prod + $total_man_power_prev ); ?></td>
    <td><?php echo number_format ($total_man_power_prod + $total_man_power); ?></td>

    <td><?php echo number_format ($total_net_pay_prev_prod + $total_net_pay_prev); ?></td>
    <td><?php echo number_format ($total_gross_payable_prod + $total_gross_payable); ?></td>
    <td><?php echo number_format ($total_adv_deduct_prod + $total_adv_deduct); ?></td>
    <td><?php echo number_format ($total_net_pay_prod + $total_net_pay); ?></td>
    <td><?php echo number_format ($total_diffence_from_prev_prod + $total_diffence_from_prev); ?></td>
</tr>
</table>




<table style="margin-top:200px; text-transform:uppercase; width:700px; font-size:11px; ">
<tr height="80%" >
			<td colspan="28"></td>
			</tr>
<tr height="20%">
			<td  align="center">Sr./Accounts Officer</td>
			<td align="center">Manager (Cash & Logistic)</td>
			<td  align="center">Manager(Accounts)</td>
			<td  align="center">Chief Accountant</td>
            <td  align="center">Director</td>
			</tr>
</table>
</div>
</body>
</html>
