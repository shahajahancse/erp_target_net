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
$count_section_id = count($values["section_id"]);

//$count = 3;
?>
<span style="font-size:13px; font-weight:bold;">Section Wise Total Salary For The Month of <?php echo $month_year; ?></span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Section Name</td>
<td rowspan="2">Basic</td>
<td rowspan="2" width="50">Production Amount</td>
<td rowspan="2" width="50">Production Bonus</td>
<td rowspan="2" width="50">Holiday Bonus</td>
<td rowspan="2" width="50">Attn. Bonus</td>
<td rowspan="2" width="50">Night Amount</td>
<td rowspan="2" width="50">No Work Amount</td>
<td rowspan="2" width="50">Other Amount</td>
<td rowspan="2" width="80">Gorss Salary</td>
<td colspan="3">Deduction</td>
<td rowspan="2">Net Salary</td>
<td rowspan="2">Man Power</td>
</tr>

<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td>Advance</td>
<td>Absent</td>
<td>Other</td>
</tr>
<?php
for($i = 0; $i<$count_section_id;$i++)
{
?>

	<tr style="font-size:13px; text-align:right; padding:3px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values["section_name"][$i]; ?></td>
    <td><?php echo $values["basic_sal"][$i]; ?></td>
    <td><?php echo $values["pd_amount"][$i]; ?></td>
   	<td><?php echo $values["pd_bonus_amount"][$i]; ?></td>
    <td><?php echo $values["holiday_allowance"][$i]; ?></td>
    <td><?php echo $values["night_allowance"][$i]; ?></td>
    <td><?php echo $values["none_work_allowance"][$i]; ?></td>
   	<td><?php echo $values["att_bonus"][$i]; ?></td>
    <td><?php echo $values["others_allaw"][$i]; ?></td>
    <td><?php echo $values["gross_sal"][$i]; ?></td>
    <td><?php echo $values["adv_deduct"][$i]; ?></td>
    <td><?php echo $values["abs_deduction"][$i]; ?></td>
    <td><?php echo $values["others_deduct"][$i]; ?></td>
   	<td><?php echo $values["net_pay"][$i]; ?></td>
    <td><?php echo $values["man_power"][$i]; ?></td>
   
    </tr>
<?php	
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
    <td colspan="2" style="text-align:center;">Total</td>
    <td><?php echo number_format ($values["total_basic_sal"]); ?></td>
    <td><?php echo number_format ($values["total_pd_amount"]); ?></td>
    <td><?php echo number_format ($values["total_pd_bonus_amount"]); ?></td>
    <td><?php echo number_format ($values["total_holiday_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_night_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_none_work_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_att_bonus"]); ?></td>
    <td><?php echo number_format ($values["total_others_allaw"]); ?></td>
    <td><?php echo number_format ($values["total_gross_sal"]); ?></td>
    <td><?php echo number_format ($values["total_adv_deduct"]); ?></td>
    <td><?php echo number_format ($values["total_abs_deduction"]); ?></td>
    <td><?php echo number_format ($values["total_others_deduct"]); ?></td>
    <td><?php echo number_format ($values["total_net_pay"]); ?></td>
    <td><?php echo number_format ($values["total_man_power"]); ?></td>
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
