<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Continuous Production Summary Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);
$this->load->view('head_english');
$count_article_id = count($values["article_id"]);

//$count = 3;
?>
<span style="font-size:13px; font-weight:bold;">Continuous Production Summary Report </span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="3" cellspacing="0" >
<tr style=" font-weight:bold; font-size:14px;">
<td colspan="3">Section: <?php echo $values["section_name"]; ?></td>
<td colspan="2">Type: <?php echo $values["process_name"][1]; ?></td>
<td colspan="7" style="text-align:right">Date:  <?php echo $values["date1"]; ?> to  <?php echo $values["date2"]; ?></td>
</tr>
<tr><td colspan="12">&nbsp;</td>
</tr>
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Buyer</td>
<td rowspan="2">Article</td>
<td rowspan="2">Order Qty</td>
<td rowspan="2">Size Wise Qty</td>
<!--<td rowspan="2">Type</td>-->
<!--<td rowspan="2">Colour</td>-->
<td rowspan="2">Size</td>
<td>Total(Range)</td>
<td>Total</td>
<td>Balance</td>
<td rowspan="2">Remarks</td>
</tr>
<tr style="text-align:center; font-size:14px; font-weight:bold; background:#E9E9E9;">
<td >Qty/Pcs</td>
<td >Qty/Pcs</td>
<td >Qty/Pcs</td>
</tr>

<?php
$total_order_qty = 0;
$total_size_order_qty = 0;
$total_quantity = 0;
$total_qty_complete = 0;
$total_balance = 0;
for($i = 0; $i<$count_article_id;$i++)
{
?>

	<tr style="font-size:13px; text-align:center;">
    <td><?php echo $i+1; ?></td>
    <td><?php echo  $values["buyer_name"][$i]; ?></td>
    <td><?php echo  $values["style_id"][$i]; ?></td>
    <td><?php echo  $values["order_qty"][$i]; ?></td>
    <td><?php echo  $values["size_order_qty"][$i]; ?></td>
    <!--<td><?php echo  $values["process_name"][$i]; ?></td>-->
    <!--<td><?php echo  $values["color_name"][$i]; ?></td>-->
    <td><?php echo  $values["size_name"][$i]; ?></td>
    <td><?php echo  $values["quantity"][$i]; ?></td>
    <td><?php echo  $values["qty_complete"][$i]; ?></td>
    <td><?php echo  $values["balance"][$i]; ?></td>
    <td>&nbsp;</td>
    </tr>
<?php
$total_order_qty 	= $total_order_qty 		+ $values["order_qty"][$i];
$total_quantity 	= $total_quantity 		+ $values["quantity"][$i];
$total_size_order_qty 	= $total_size_order_qty 		+ $values["size_order_qty"][$i];
$total_qty_complete = $total_qty_complete 	+ $values["qty_complete"][$i];
$total_balance 		= $total_balance 		+ $values["balance"][$i];	
}
?>
<tr style="font-size:13px; text-align:center; font-weight:bold;">
    <td colspan="3">Total</td>
    <td><?php echo number_format ($total_order_qty); ?></td>
    <td><?php echo number_format ($total_size_order_qty); ?></td>
    <td colspan="1">&nbsp;</td>
    <td><?php echo number_format ($total_quantity); ?></td>
    <td><?php echo number_format ($total_qty_complete); ?></td>
    <td><?php echo number_format ($total_balance); ?></td>
</tr>
</table>
<br />
<br />
<br />
<table style="width:550px;text-align:center;">
<tr>
<td  width="20%">Distributor</td><td width="20%">Incharge</td><td width="20%">APM</td><td width="20%">AGM</td><td width="20%">G.M</td>
</tr>
</table>
</div>
</body>
</html>
