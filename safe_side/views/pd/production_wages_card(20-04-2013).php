<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wages Card</title>

</head>
<body>
<?php
$count_emp_id = count($values["emp_id"]);
for($i = 0; $i<$count_emp_id;$i++)
{
?>	
<div style="width:1000px;margin-bottom:8px; height:360px; border:1px  dashed; padding-top:4px;">

  <div style="width:48%; float:left; border:2px solid; padding-right:3px ">
      <div style="text-align:center; font-weight:bold; font-size:12px; text-transform:uppercase;"><?php echo $company_name_english = $this->common_model->company_information("company_name_english"); ?><br /><?php echo $company_name_english = $this->common_model->company_information("company_name_bangla"); ?><br /></div>
      <div>
      <?php $emp_id = $values["emp_id"][$i];?> 
      <table  border="1" align="left" cellpadding="2" cellspacing="0" style=" width:100%;border-collapse:collapse; font-weight:bold;  font-size:10px;">
      <tr><td colspan="3" style="text-align:center; font-size:14px; font-weight:bold;">Wages Card</td></tr>
      <tr><td colspan="3">NAME: <?php echo $values["emp_full_name"][$i];?></td></tr>
      <tr><td colspan="3">SECTION: <?php echo $values["section_name"][$i];?></td></tr>
      <tr><td colspan="3">FLOOR: <?php echo $values["posi_name"][$i];?></td></tr>
      <tr><td>ID NO: <?php echo $values["emp_id"][$i];?></td><td>MONTH: <?php echo $values["month"];?></td><td>YEAR: <?php echo $values["year"];?></td></tr>
      </table>
      
   </div>
   
    <div> 
       <table  border="1" align="left" cellpadding="2" cellspacing="0" style=" width:70%;border-collapse:collapse; font-size:10px;text-align:center">
      <tr style=" font-weight:bold; ">
        <td>Article </td><td>Type</td><td>T.Pcs</td><td>Rate</td><td>Amount</td></tr>
      <?php //$count_artical_id = count($values[$emp_id]["article_id"]); 
	  
	  $count_artical_id = $values[$emp_id]['count_style_summary'];
	  
	  for($j = 0; $j<$count_artical_id;$j++)
	  {
	  ?>
      <tr><td><?php echo $values[$emp_id]["article_id"][$j];?></td><td><?php echo $values[$emp_id]["process_id"][$j];?></td><td><?php echo $values[$emp_id]["total_quantity"][$j];?></td><td style="text-align:right"><?php echo $values[$emp_id]["unit_price"][$j];?></td><td style="text-align:right"><?php echo $values[$emp_id]["amount"][$j];?></td></tr>
      <?php } ?>
      </table>
     </div> 
     <div>
      
      <table  border="1"  cellpadding="2" cellspacing="0" style=" width:26%;border-collapse:collapse; font-size:10px; float:right; ">
      <tr><td colspan="2">Pay Calculation</td></tr>
      <tr><td>Production Wages</td><td style="text-align:right"><?php echo $values["pd_amount"][$i];?></td></tr>
      <tr><td>Production Bonus</td><td style="text-align:right"><?php echo $values["pd_bonus_amount"][$i];?></td></tr>
      <tr><td>Attn. Bonus</td><td style="text-align:right"><?php echo $values["att_bonus"][$i];?></td></tr>
      <tr><td>No. Work</td><td style="text-align:right"><?php echo $values["none_work_allowance"][$i];?></td></tr>
      <tr><td>Night </td><td style="text-align:right"><?php echo $values["night_allowance"][$i];?></td></tr>
      <tr><td>Holy Day</td><td style="text-align:right"><?php echo $values["holiday_allowance"][$i];?></td></tr>
      <tr><td>Others</td><td style="text-align:right"><?php echo $values["others_allaw"][$i];?></td></tr>
      <tr><td>Gross Payment</td><td style="text-align:right"><?php echo $values["net_pay"][$i];?></td></tr>
      
      </table>
    </div> <br />
    <div>
    <table align="left" border="0"  cellpadding="2" cellspacing="0" style=" width:100%;border-collapse:collapse; font-weight:bold;  font-size:10px; text-align:center; margin-bottom:3px;">
      <tr height="30"><td></td></tr>
      <tr><td>Distributor</td><td>Incharge</td><td>APM/PM</td><td>AGM/GM</td></tr>
      </table>
    </div>
   </div>
  <div style="width:50%;float:right;">
  	<table  border="1" cellpadding="2" cellspacing="0" style=" width:98%;border-collapse:collapse; font-size:10px; text-align:center;">
    <tr style=" font-weight:bold; "><td>Date</td><td>BUYER</td>
    <td>ARTICLE </td><td>COLOUR</td><td>TYPE</td><td>QTY.PCS</td><td>RATE</td><td>AMOUNT</td><td>SIGNATURE</td></tr>
   <?php  
   //$count_r_color = count($values[$emp_id]['r_color_name']); 
   $count_r_color = $values[$emp_id]['count_r_color'];
   for($k = 0; $k<$count_r_color;$k++)
	{
   ?>
      <tr><td><?php echo $values[$emp_id]["date"][$k];?></td><td><?php echo $values[$emp_id]["r_buyer_name"][$k];?></td><td><?php echo $values[$emp_id]["r_article_id"][$k];?></td><td><?php echo $values[$emp_id]["r_color_name"][$k];?></td><td><?php echo $values[$emp_id]["r_process_name"][$k];?></td><td><?php echo $values[$emp_id]["r_quantity"][$k];?></td><td style="text-align:right"><?php echo $values[$emp_id]["r_unit_price"][$k];?></td><td style="text-align:right"><?php echo $values[$emp_id]["r_unit_price"][$k] *$values[$emp_id]["r_quantity"][$k];?></td><td>&nbsp;</td></tr>
    <?php } ?>
      </table>
       <table align="left" border="0"  cellpadding="2" cellspacing="0" style=" width:100%;border-collapse:collapse; font-weight:bold;  font-size:10px; text-align:center; margin-bottom:3px;">
      <tr height="30"><td></td></tr>
      <tr><td>Distributor</td><td>APM/PM</td><td>AGM/GM</td></tr>
      </table>
  </div>


</div>
<?php
}
?>
</body>
</html>
