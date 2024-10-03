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
	?>  Section Wise Total Salary For The Month of <?php echo $month_year; ?></span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:4px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Section Name</td>
<td rowspan="2">Man Power</td>
<td rowspan="2">Basic</td>

<td rowspan="2" width="50">Production Info.</td>
<td colspan="2">Deduction</td>
<td colspan="2">Production</td>
<td rowspan="2" width="50">Night Amount</td>
<td rowspan="2" width="50">Friday Bonus</td>
<td rowspan="2" width="50">No Work Amount</td>
<td rowspan="2" width="50">Attn. Bonus</td>


<td rowspan="2" width="50">Other Amount</td>
<td rowspan="2" width="80">Gorss Salary</td>

<td rowspan="2">Net Salary</td>

</tr>

<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td>Advance</td>
<td>Stamp</td>
<td>Pr. amt</td>
<td>Pr.B</td>
</tr>
<?php
for($i = 0; $i<$count_section_id;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values["section_name"][$i]; ?></td>
    <td><?php echo $values["man_power"][$i]; ?></td>
    <td><?php echo $values["basic_sal"][$i]; ?></td>
    
    <td style="width:150px; text-align:center;"><?php 
	$sec_name = $values["section_name"][$i];
	$sec_id = $values["section_id"][$i];
	$sal_month = date('m', strtotime($month_year));
	$sal_year = date('y', strtotime($month_year));
	
	$body_id 		= 1;
	$neck_id 		= 2;
	$complet_id 	= 3;
	$piping_id 		= 4;
	$tack_id 		= 5;
	$placket_id 	= 6;
	$v_neck_id 		= 7;
	$total_b_iron		= 8;
	$total_b_re_iron	= 9;
	
	$BODY 		= $values["body"][$i];
	$NECK 		= $values["neck"][$i];
	
	$COMPLET 	= $values["complet"][$i];
	$PIPING 	= $values["piping"][$i];
	
	$TACK 		= $values["tack"][$i];
	$PLACKET 	= $values["placket"][$i];
	$V_NECK 	= $values["v_neck"][$i];
	
	$PLACKET 	= $values["placket"][$i];
	$V_NECK 	= $values["v_neck"][$i];

	$B_Iron 	= $values["b_iron"][$i];
	$B_Re_Iron 	= $values["b_re_iron"][$i];
		//$BODY = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$body_id);
	//$NECK = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$neck_id);
	
	//$COMPLET = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$complet_id);
	//$PIPING = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$piping_id);
	
	//$TACK = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$tack_id);
	//$PLACKET = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$placket_id);
	//$V_NECK = $this->pd_salary_report_model->get_pd_summary_info($sec_id,$sal_month,$sal_year,$v_neck_id);

	if($sec_name == "Knitting")
		{
			//$OTHERS_Neck = $COMPLET+$NECK+$REMENDING+$LBS+$Moon+$PLACKET;
			echo "<div style='width:50px; float:left'>Body</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$BODY</div><br>";
			echo "<div style='width:50px; float:left'>Neck</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$NECK</div><br>";
			echo "<div style='width:50px; float:left'>Piping</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$PIPING</div>";
		
		}
		else if($sec_name == "Triming" || $sec_name == "Mending")
		{
			//$OTHERS = $BODY+$NECK+$REMENDING+$LBS+$Moon+$PLACKET;
			echo "<div style='width:50px; float:left'>Body</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$BODY</div><br>";
			echo "<div style='width:50px; float:left'>Tack</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$TACK</div>";
		}
		else if($sec_name == "Linking")
		{
			echo "<div style='width:50px; float:left'>Body</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$BODY</div><br>";
			echo "<div style='width:50px; float:left'>Neck</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$NECK</div><br>";
			echo "<div style='width:50px; float:left'>Piping</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$PIPING</div><br>";
			echo "<div style='width:50px; float:left'>Complet</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$COMPLET</div><br>";
			
			echo "<div style='width:50px; float:left'>Placket</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$PLACKET</div><br>";
			echo "<div style='width:50px; float:left'>V_neck</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$V_NECK</div>";
		
		}
		else if($sec_name == "Winding")
		{
			echo "<div style='width:50px; float:left'>V_neck</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$V_NECK</div>";
			
		}
		else if($sec_name == "Iron")
		{
			echo "<div style='width:50px; float:left'>B.Iron</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$B_Iron</div>";
			
			echo "<div style='width:50px; float:left'>B.Re.iron</div><div style='width:50px; float:left'>:</div><div style='width:50px; float:left'>$B_Re_Iron</div>";
			
		}		
		else
		{
			echo "&nbsp;";
		}

	?></td>
       <td><?php echo $values["adv_deduct"][$i]; ?></td>
    <td><?php echo $values["stamp_deduct"][$i]; ?></td>
    <td><?php echo $values["pd_amount"][$i]; ?></td>
   	<td><?php echo $values["pd_bonus_amount"][$i]; ?></td>
    <td><?php echo $values["night_allowance"][$i]; ?></td>
    <td><?php echo $values["holiday_allowance"][$i]; ?></td>
    <td><?php echo $values["none_work_allowance"][$i]; ?></td>
    <td><?php echo $values["att_bonus"][$i]; ?></td>
    
    
   	
    <td><?php echo $values["others_allaw"][$i]; ?></td>
    <td><?php echo $values["gross_sal"][$i]; ?></td>
 
   	<td><?php echo $values["net"][$i]; ?></td>
    
   
    </tr>
<?php	
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
    <td colspan="2" style="text-align:center;">Total</td>
     <td><?php echo number_format ($values["total_man_power"]); ?></td>
    <td><?php echo number_format ($values["total_basic_sal"]); ?></td>
    
    <td>&nbsp;</td>
    
    <td><?php echo number_format ($values["total_adv_deduct"]); ?></td>
    <td><?php echo number_format ($values["total_stamp_deduct"]); ?></td>
    <td><?php echo number_format ($values["total_pd_amount"]); ?></td>
    <td><?php echo number_format ($values["total_pd_bonus_amount"]); ?></td>
     <td><?php echo number_format ($values["total_night_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_holiday_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_none_work_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_att_bonus"]); ?></td>
   
    
    
    <td><?php echo number_format ($values["total_others_allaw"]); ?></td>
    <td><?php echo number_format ($values["total_gross_sal"]); ?></td>
    
    <td><?php echo number_format ($values["total_net_pay"]); ?></td>
   
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
			<td  align="center" width="100">Production Director</td>
            <td  align="center" width="100">Finance Director</td>
			</tr>
</table>
</div>
</body>
</html>
