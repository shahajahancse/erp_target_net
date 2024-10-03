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
 echo "<td  colspan='3'>Pr. Info</td>";	
}
else if($sec_name == "Triming" || $sec_name == "Mending")
{
 echo "<td  colspan='2'>Pr. Info</td>";	
}
else if($sec_name == "Linking" )
{
	echo "<td  colspan='6'>Pr. Info</td>";	
}
else
{
	echo "<td>Pr. Info</td>";
}
?>
<td rowspan="2" width="50">M.P</td>
<td colspan="2">Deduction</td>
<td colspan="2">Production</td>
<td colspan="2">Night</td>
<td colspan="2">Friday</td>
<td colspan="2">No Work</td>
<td colspan="2">Attn Bonus</td>
<td rowspan="2">Total Ground</td>

</tr>

<tr style="text-align:center; font-size:14px; font-weight:bold;">
<?php
if($sec_name == "Knitting")
{
 echo "<td>Body</td><td>Neck</td><td>Piping</td>";	
}
else if($sec_name == "Triming" || $sec_name == "Mending")
{
	echo "<td>Body</td><td>Tack</td>";	
}
else if($sec_name == "Linking" )
{
	echo "<td>Body</td><td>Neck</td><td>Piping</td><td>Complet</td><td>Placket</td><td>V_neck</td>";	

}
else if($sec_name == "Winding" )
{
	echo "<td>V_neck</td>";		
}
else
{
	echo "<td>&nbsp;</td>";
}
?>

<td>Adv. Loan</td>
<td>Stamp</td>
<td>Pr. amt</td>
<td>Pr.B</td>
<td>PCS</td>
<td>TK</td>
<td>PCS</td>
<td>TK</td>
<td>PCS</td>
<td>TK</td>
<td>PCS</td>
<td>TK</td>
</tr>
<?php
$total_BODY 		= 0;
$total_COMPLET 		= 0;
$total_NECK			= 0;
$total_PIPING 			= 0;

$total_TACK 			= 0;
$total_PLACKET			= 0;
$total_V_NECK 			= 0;

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
	$piping_id 		= 4;
	$tack_id 		= 5;
	$placket_id 	= 6;
	$v_neck_id 		= 7;
	
	$BODY 		= $values["body"][$i];
	$NECK 		= $values["neck"][$i];
	
	$COMPLET 	= $values["complet"][$i];
	$PIPING 	= $values["piping"][$i];
	
	$TACK 		= $values["tack"][$i];
	$PLACKET 	= $values["placket"][$i];
	$V_NECK 	= $values["v_neck"][$i];

	if($sec_name == "Knitting")
		{
			echo "<td>$BODY</td>";
			echo "<td>$NECK</td>";
			echo "<td>$PIPING</td>";
			
			$total_BODY 		= $total_BODY + $BODY;
			$total_NECK 		= $total_NECK + $NECK;
			$total_PIPING 		= $total_PIPING + $PIPING;
		
		}
		else if($sec_name == "Triming" || $sec_name == "Mending")
		{
			echo "<td>$BODY</td>";
			echo "<td>$TACK</td>";
			
			$total_BODY 		= $total_BODY + $BODY;
			$total_TACK 		= $total_TACK + $TACK;
		}
		else if($sec_name == "Linking")
		{
			echo "<td>$BODY</td>";
			echo "<td>$NECK</td>";
			echo "<td>$PIPING</td>";
			
			echo "<td>$COMPLET</td>";
			echo "<td>$PLACKET</td>";
			echo "<td>$V_NECK</td>";
			
			$total_BODY 		= $total_BODY + $BODY;
			$total_NECK 		= $total_NECK + $NECK;
			$total_PIPING 		= $total_PIPING + $PIPING;
			
			$total_COMPLET 		= $total_COMPLET + $COMPLET;
			$total_PLACKET 		= $total_PLACKET + $PLACKET;
			$total_V_NECK 		= $total_V_NECK + $V_NECK;
			
			
			
		
		}
		else if($sec_name == "Winding")
		{
			echo "<td>$total_V_NECK</td>";
			$total_V_NECK 		= $total_V_NECK + $V_NECK;
			
		}
		else
		{
			echo "<td>&nbsp;</td>";
		}

	?>
   	<td><?php echo $values["man_power"][$i]; ?></td>
    <td><?php echo $values["adv_deduct"][$i]; ?></td>
    <td><?php echo $values["stamp_deduct"][$i]; ?></td>
    <td><?php echo $values["pd_amount"][$i]; ?></td>    
    <td><?php echo $values["pd_bonus_amount"][$i]; ?></td>
    <td><?php echo $values["night_allowance_no"][$i]; ?></td>
    <td><?php echo $values["night_allowance"][$i]; ?></td>
    <td><?php echo $values["holiday_allowance_no"][$i]; ?></td>
   	<td><?php echo $values["holiday_allowance"][$i]; ?></td>
    
    <td><?php echo $values["none_work_day"][$i]; ?></td>
   	<td><?php echo $values["none_work_allowance"][$i]; ?></td>
    
    <td><?php echo $values["att_bonus_no"][$i]; ?></td>
    <td><?php echo $values["att_bonus"][$i]; ?></td>
    
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
			echo "<td>$total_NECK</td>";
			echo "<td>$total_PIPING</td>";
		}
		else if($sec_name == "Triming" || $sec_name == "Mending")
		{
			echo "<td>$total_BODY</td>";
			echo "<td>$total_TACK</td>";
		}
		else if($sec_name == "Linking")
		{
			echo "<td>$total_BODY</td>";
			echo "<td>$total_NECK</td>";
			echo "<td>$total_PIPING</td>";
			
			echo "<td>$total_COMPLET</td>";
			echo "<td>$PLACKET</td>";
			echo "<td>$total_V_NECK</td>";
		
		}
		else if($sec_name == "Winding")
		{
			echo "<td>$total_V_NECK</td>";
		}
		else
		{
			echo "<td>&nbsp;</td>";
		}
	 
	 
	 
	 
	  ?>
    <td><?php echo number_format ($values["total_man_power"]); ?></td>
    <td><?php echo number_format ($values["total_adv_deduct"]); ?></td>
    <td><?php echo number_format ($values["total_stamp_deduct"]); ?></td>
    <td><?php echo number_format ($values["total_pd_amount"]); ?></td>
    <td><?php echo number_format ($values["total_pd_bonus_amount"]); ?></td>
    <td><?php echo number_format ($values["total_night_allowance_no"]); ?></td>
    <td><?php echo number_format ($values["total_night_allowance"]); ?></td>
    <td><?php echo number_format ($values["total_holiday_allowance_no"]); ?></td>
    <td><?php echo number_format ($values["total_holiday_allowance"]); ?></td>
    
    <td><?php echo number_format ($values["total_none_work_day"]); ?></td>
    <td><?php echo number_format ($values["total_none_work_allowance"]); ?></td>
    
    <td><?php echo number_format ($values["total_att_bonus_no"]); ?></td>
    <td><?php echo number_format ($values["total_att_bonus"]); ?></td>
    
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
			<td  align="center" width="100">Cheif Accounts</td>
			<td  align="center">Production Director</td>
            <td  align="center">Finance Director</td>
			</tr>
</table>
</div>
</body>
</html>
