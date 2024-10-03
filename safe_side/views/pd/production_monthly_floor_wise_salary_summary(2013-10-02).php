<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php if($grid_status == 1)
	{ echo 'Reguler'; }
	elseif($grid_status == 2)
	{ echo 'New'; }
	elseif($grid_status == 3)
	{ echo 'Left'; }
	elseif($grid_status == 4)
	{ echo 'Resign'; }
	elseif($grid_status == 6)
	{ echo 'Promoted'; }
	?> Floor Wise Salary Summary </title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);
$this->load->view('head_english');
$count_floor_id = count($values["floor_id"]);
$sec_name = $this->db->where("sec_id",$grid_section)->get('pr_section')->row()->sec_name;
//$count = 3;

?>
<span style="font-size:13px; font-weight:bold;"><?php echo "Section : $sec_name,"; ?> <?php 
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
	?>  Floor Wise Salary Summary For The Month of <?php echo $month_year; ?></span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:4px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>

<td rowspan="2">Floor Name</td>
<?php
if($sec_name == "Knitting" || $sec_name == "Trimming" || $sec_name == "Mending")
{
 echo "<td  colspan='2'>Pr. Info</td>";	
}
else if($sec_name == "Linking" )
{
	echo "<td  colspan='3'>Pr. Info</td>";	
}
else
{
	echo "<td>Pr. Info</td>";
}
?>
<td rowspan="2">Production</td>
<td rowspan="2">Pr.B</td>
<td rowspan="2" width="50">M.P</td>

<td colspan="2">Night</td>
<td colspan="2">Friday</td>
<td colspan="2">Attn Bonus</td>
<td rowspan="2">Stamp</td>
<td rowspan="2">Total Ground</td>

</tr>

<tr style="text-align:center; font-size:14px; font-weight:bold;">
<?php
if($sec_name == "Knitting")
{
 echo "<td>Body</td><td>Neck</td>";	
}
else if($sec_name == "Knitting" || $sec_name == "Trimming" || $sec_name == "Mending")
{
	echo "<td>Complet</td><td>Others</td>";	
}
else if($sec_name == "Linking" )
{
	echo "<td>Complet</td><td>Neck</td><td>Body</td>";		
}
else if($sec_name == "Winding" )
{
	echo "<td>L.B.S</td>";		
}
else
{
	echo "<td>&nbsp;</td>";
}
?>
<td>PCS</td>
<td>TK</td>
<td>PCS</td>
<td>TK</td>
<td>PCS</td>
<td>TK</td>
</tr>
<?php
$total_BODY 		= 0;
$total_OTHERS_Neck 	= 0;
$total_OTHERS		= 0;
$total_COMPLET 		= 0;
$total_NECK			= 0;
$total_LBS 			= 0;

for($i = 0; $i<$count_floor_id;$i++)
{
	
?>
	<tr style="font-size:13px; text-align:right; padding:4px">
    <td style="text-align:left;"><?php echo $i+1; ?></td>
    <td style="text-align:left;"><?php echo $values["floor_name"][$i]; ?></td>
    
    <?php 
	$floor_id = $values["floor_id"][$i];
	$sal_month = date('m', strtotime($month_year));
	$sal_year = date('y', strtotime($month_year));
	$body_id 		= 1;
	$neck_id 		= 2;
	$complet_id 	= 3;
	$remending_id 	= 4;
	$lbs_id 		= 5;
	$moon_id 		= 6;
	$placket_id 	= 7;
	
	$BODY = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$body_id);
	$NECK = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$neck_id);
	
	$COMPLET = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$complet_id);
	$REMENDING = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$remending_id);
	
	$LBS = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$lbs_id);
	$Moon = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$moon_id);
	$PLACKET = $this->pd_salary_report_model->get_pd_floor_summary_info($grid_section,$floor_id,$sal_month,$sal_year,$placket_id);
	if($sec_name == "Knitting")
		{
			$OTHERS_Neck = $COMPLET+$NECK+$REMENDING+$LBS+$Moon+$PLACKET;
			echo "<td>$BODY</td>";
			echo "<td>$OTHERS_Neck</td>";
			
			$total_BODY 		= $total_BODY + $BODY;
			$total_OTHERS_Neck 	= $total_OTHERS_Neck + $OTHERS_Neck;
		
		}
		else if($sec_name == "Trimming" || $sec_name == "Mending")
		{
			$OTHERS = $BODY+$NECK+$REMENDING+$LBS+$Moon+$PLACKET;
			
			//$OTHERS = $BODY+$NECK+$REMENDING+$LBS+$Moon+$PLACKET;
			//echo "Complet: $COMPLET<br>Others: $OTHERS";
			
			
			echo "<td>$COMPLET</td>";
			echo "<td>$OTHERS</td>";
			
			$total_OTHERS		= $total_OTHERS + $OTHERS;
			$total_COMPLET 		= $total_COMPLET + $COMPLET;
		}
		else if($sec_name == "Linking")
		{
			echo "<td>$COMPLET</td>";
			echo "<td>$NECK</td>";
			echo "<td>$BODY</td>";
			
			
			$total_COMPLET 		= $total_COMPLET + $COMPLET;
			$total_NECK			= $total_NECK + $NECK;
			$total_BODY 		= $total_BODY + $BODY;
		
		}
		else if($sec_name == "Winding")
		{
			echo "<td>$LBS</td>";
			$total_LBS 		= $total_LBS + $LBS;
			
		}
		else
		{
			echo "<td>&nbsp;</td>";
		}

	?>
    <td><?php echo $values["pd_amount"][$i]; ?></td>    
    <td><?php echo $values["pd_bonus_amount"][$i]; ?></td>
   	<td><?php echo $values["man_power"][$i]; ?></td>
    <td><?php echo $values["night_allowance_no"][$i]; ?></td>
    <td><?php echo $values["night_allowance"][$i]; ?></td>
    <td><?php echo $values["holiday_allowance_no"][$i]; ?></td>
   	<td><?php echo $values["holiday_allowance"][$i]; ?></td>
    <td><?php echo $values["att_bonus_no"][$i]; ?></td>
    <td><?php echo $values["att_bonus"][$i]; ?></td>
    <td><?php echo $values["stamp_deduct"][$i]; ?></td>
   	<td><?php echo $values["net"][$i]; ?></td>
    
   
    </tr>
<?php	
}
?>
<tr style="font-weight:bold; font-size:13px; text-align:right;">
    <td colspan="2" style="text-align:center;">Total</td>
    <?php 
	 
	 if($sec_name == "Knitting")
		{
			echo "<td>$total_BODY</td>";
			echo "<td>$total_OTHERS_Neck</td>";
		}
		else if($sec_name == "Trimming" || $sec_name == "Mending")
		{
			echo "<td>$total_COMPLET</td>";
			echo "<td>$total_OTHERS</td>";
		}
		else if($sec_name == "Linking")
		{
			echo "<td>$total_COMPLET</td>";
			echo "<td>$total_NECK</td>";
			echo "<td>$total_BODY</td>";
		
		}
		else if($sec_name == "Winding")
		{
			echo "<td>$total_LBS</td>";
		}
		else
		{
			echo "<td>&nbsp;</td>";
		}
	 
	 
	 
	 
	  ?>
    <td><?php echo number_format ($values["total_pd_amount"]); ?></td>
    <td><?php echo number_format ($values["total_pd_bonus_amount"]); ?></td>
        <td><?php echo number_format ($values["total_man_power"]); ?></td>

    <td><?php echo number_format ($values["total_night_allowance_no"]); ?></td>
    <td><?php echo number_format ($values["total_night_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_holiday_allowance_no"]); ?></td>
    <td><?php echo number_format ($values["total_holiday_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_att_bonus_no"]); ?></td>
    <td><?php echo number_format ($values["total_att_bonus"]); ?></td>
    <td><?php echo number_format ($values["total_stamp_deduct"]); ?></td>
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
			<td  align="center" width="150">General Manager</td>
			<td  align="center" width="100">Director</td>
            <td  align="center" width="100">Director</td>
			</tr>
</table>
</div>
</body>
</html>
